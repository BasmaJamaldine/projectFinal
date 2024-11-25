<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index($id)
    {
        $course = Course::findOrFail($id);
        $lessons = $course->lessons()->orderBy('order')->get()->map(function ($lesson) {
            
                $lesson->accessible = $lesson->isAccessible();
                $lesson->completed = $lesson->isCompletedByUser();
                return $lesson;
            });

        return view('course', compact('course', 'lessons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameLesson' => 'required|string',
            'file' => 'required|file|mimes:mp4,mov,avi|max:102400',
            'course_id' => 'required|exists:courses,id'
        ]);

        $lastOrder = Lesson::where('course_id', $request->course_id)
            ->max('order') ?? 0;

        $path = $request->file('file')->store('lessons', 'public');

        Lesson::create([
            'nameLesson' => $request->nameLesson,
            'file' => $path,
            'course_id' => $request->course_id,
            'order' => $lastOrder + 1
        ]);

        return back();
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        
        if (!$lesson->isAccessible()) {
            return back();
        }

        $lesson->users()->syncWithoutDetaching([
            Auth::id() => ['completed' => true]
        ]);
        
        return view('lessonShow', compact('lesson'));
    }
}