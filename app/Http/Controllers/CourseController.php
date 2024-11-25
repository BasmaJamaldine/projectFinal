<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        // $coach = User::where('role', 'coach')->first();
        $user = User::where('id', Auth::id())->first();
        $totaluser=User::where("role","student")->count();
        $course = Course::with('user')->findOrFail($id);
        $lessons = $course->lessons;

        return view('course', compact('course', 'user','totaluser','lessons'));
    }
    public function allcourses(){
        $courses=Course::all();
        $users = User::all();
        $user = User::where('id', Auth::id())->first();
        return view('allcourses',compact('courses','users','user'));
    }
    public function joindCourses()
    {
        // Get the authenticated user's enrolled courses with their progress
        $enrolledCourses = Auth::user()->courses()->with('user')->get();
        $usersPassedFinal = User::where('has_passed_final', true)->orderBy('passed_at', 'desc')->take(6)->get();

        return view('joindCourses', compact('enrolledCourses'));
    }
    public function mentor()
    {
        // Get the authenticated user's enrolled courses with their progress
       $users=User::all();

        return view('layouts.navigation', compact('users'));
    }
    public function score()
    {
        $user = auth()->user();
        $courses = Course::with(['user', 'lessons.users' => function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }])->get();

        return view('dashboard', compact('courses'));
    }


    public function create()
    {
        //
        $user = User::where('id', Auth::id())->first();
        // $course = Course::with('user')->findOrFail($id);
         return view('calendriershow',compact( 'user'));
    }

    public function joinCourse($courseId)
    {
        $course = Course::findOrFail($courseId);
 
        if ($course->max_students <= 0) {
            return back()->with('error', 'Ce cours est plein.');
        }
   
        if (DB::table('course_users')->where('course_id', $courseId)->where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'Vous êtes déjà inscrit à ce cours.');
        }
 
        $course->users()->attach(Auth::id());
        $course->decrement('max_students');
    
        $lesson = $course->lessons()->first(); 
    
        if ($lesson) {
            return redirect()->route('dashboard', ['id' => $lesson->id]);
        } else {
            
            return back();
        }
        
    }


    public function callendrier()
    {
        //

        $events = Course::all();

        $events = $events->map(function ($e) {
            return [
                "start" => $e->start,
                "end" => $e->end,
                "color" => "#fcc102",
                "passed" => false,
                "title" => $e->name,
                "description" =>$e->description,
                "places" =>$e->max_students,
                "start_time" => $e->start,
                "end_time" => $e->end,
                "id" => $e->id,
            
            ];
        });

        return response()->json([
            "events" => $events
        ]);
    }
    

    public function redirectToStripe($id)
    {
        $course = Course::findOrFail($id);

        if (Auth::user()->courses->contains($course->id)) {
            return redirect()->back()->with('error', 'Vous êtes déjà inscrit à ce cours.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $course->name,
                    ],
                    'unit_amount' => 20000, 
                ],
                'quantity' => 1,
              
            ]],
            'mode' => 'payment',
            'success_url' => route('courses.payment.success', ['course_id' => $id]),
            'cancel_url' => route('courses.payment.cancel'),
        ]);

        return redirect($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        $course = Course::findOrFail($request->course_id);

        if (!Auth::user()->courses->contains($course->id)) {
            Auth::user()->courses()->attach($course->id);
        }

        return redirect()->route('dashboard', $course->id)->with('success', 'Vous êtes maintenant inscrit à ce cours.');
    }

    public function paymentCancel()
    {
        return redirect()->route('dashboard')->with('error', 'Le paiement a été annulé.');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      
        request()->validate([
            'name' => 'required|string|max:255',
            'max_students' => 'required|integer|min:1',
            'description' => 'required|string|max:500',
            'start' => 'required|date',
            'end' => 'required|date',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
          'type' => 'required|in:free,premium',
            'user_id' => 'required',
        ]);

        $imagePath = $request->file('image')->store('courses_images', 'public');

        Course::create([
            'name' => $request->name,
            'max_students' => $request->max_students,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'image' => $imagePath,
            "type" => $request->type,
            'user_id' => $request->user_id,
        ]);
        // dd('ok');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course = Course::with(['lessons'])->findOrFail($course);
        $lessons = $course->lessons()->orderBy('created_at')->get();
        $hasCompletedAllLessons = auth()->user()->hasCompletedAllLessons($course);
        
        return view('course', compact('course', 'lessons', 'hasCompletedAllLessons','course'));
    }
  

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Course $course)
    {
        //
    }
    public function filterCourses(Request $request)
{
    $type = $request->input('type', 'all'); 

    if ($type == 'free') {
        $courses = Course::where('type', 'free')->get();
    } elseif ($type == 'premium') {
        $courses = Course::where('type', 'premium')->get();
    } else {
        $courses = Course::all(); 
    }
    return view('dashboard', compact('courses'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $course = Course::findOrFail($id);

        $course->update([
            'name' => $request->input('name'),
        ]);
        $course->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();
        return back();
    }
}
