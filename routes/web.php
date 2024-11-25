<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CallendrierController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetFinalController;
use App\Http\Controllers\RoleRequestController;
use App\Http\Controllers\StripeController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = User::all();
    $user = User::where('id', Auth::id())->first();
    $courses = Course::all();
    $totaluser=User::where("role","student")->count();
    $totalcoach=User::where("role","coach")->count();
    $totalcourses = Course::all()->count();

    return view('dashboard', compact('users', 'user', 'courses','totaluser','totalcourses','totalcoach'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Register
    Route::get('/user', [AuthenticatedSessionController::class, 'index'])->name('allUsers')->middleware('role');
    Route::get('/admin/role', [AuthenticatedSessionController::class, 'index1'])->name('admin.role');



   
    // Route Stripe Coach and Course
    Route::get('/payment-success', [StripeController::class, 'paymentSuccess'])->name('coach.success');
    Route::get('/payment-cancel', [StripeController::class, 'paymentCancel'])->name('coach.cancel');
    Route::post('/submit-coach-request', [StripeController::class, 'submitCoachRequest'])->name('coach.request');


    //  Route Lessons
    Route::get('/lesson/{id}', [LessonController::class, 'index'])->name('lesson');
    Route::post('/lessons', [LessonController::class, 'store'])->name('lesson.store');
    Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lesson.show');
    Route::delete('/lessons/{id}', [LessonController::class, 'destroy'])->name('lesson.destroy');
    Route::post('/lessons/order', [LessonController::class, 'updateOrder'])->name('lesson.updateOrder');

  
    // Route Courses
    Route::get('/course/{id}', [CourseController::class, 'index'])->name('courses');
    Route::post('/course/store', [CourseController::class, 'store'])->name('courses.store');
    Route::put('/courses/{course}/update', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}/delete', [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::post('/courses/join/{id}', [CourseController::class, 'joinCourse'])->name('courses.join');  
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/calendar/create', [CourseController::class,'callendrier'])->name('calender.create');
    Route::post('/stripe/course/{id}', [CourseController::class,'redirectToStripe'])->name('courses.pay');
    Route::get('/courses/payment/success', [CourseController::class, 'paymentSuccess'])->name('courses.payment.success');
    Route::get('/courses/payment/cancel', [CourseController::class, 'paymentCancel'])->name('courses.payment.cancel');
    Route::post("/course/filter/", [CourseController::class, "filterCourses"])->name("course.filter");
    Route::get("/calendrier", [CourseController::class, "create"])->name("calendriershow");
    Route::get('courses/{course}/start-final-project', [ProjetFinalController::class, 'start'])->name('final-project.start');

    Route::post('/projetfinal/{finalProject}/submit', [ProjetFinalController::class, 'submit'])->name('projetfinal.submit');

   
});
Route::middleware(['admin' ,'auth'])->group(function () {
    Route::get('/admin/dashboard', [RoleMiddleware::class, 'dashboard'])->name('admin.dashboard');
      // Route Admin Role
      Route::post('/requestrole', [RoleRequestController::class, 'requestRole'])->name('role.request');
      Route::get('/admin', [RoleRequestController::class, 'index'])->name('admin.requests');
      Route::post('/admin/role-request/{userId}/{status}', [RoleRequestController::class, 'updateRoleRequest'])
          ->name('admin.role.request');
    
});


require __DIR__ . '/auth.php';
