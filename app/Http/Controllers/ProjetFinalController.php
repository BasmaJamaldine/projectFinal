<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ProjetFinal;
use App\Models\QuesProjetF;
use App\Models\QuestionProjetFinal;
use App\Models\StudentProjetF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetFinalController extends Controller
{



    public function start(ProjetFinal $course)
    {
       
        
        $finalProject = ProjetFinal::firstOrFail();

        $questions = QuesProjetF::where('projet_final_id', $finalProject->id)->get();

        return view('show', compact('finalProject','questions'));
    }

    public function submit(Request $request, ProjetFinal $finalProject)
    {    
        $questions = QuesProjetF::where('projet_final_id', $finalProject->id)->get();
       
        $correctAnswers = 0;
        
        $totalQuestions = $questions->count();
 
        foreach ($questions as $question) {

            $userAnswer = $request->input('question_' . $question->id);
  
            if ($userAnswer && strtolower($userAnswer) === strtolower($question->correct_answer)) {
                $correctAnswers++;
            } 
        }
    
        $score = ($correctAnswers / $totalQuestions) * 100;
     

        $passed = $score >= 70;
        
    
        StudentProjetF::create([
            'user_id' => Auth::id(), 
            'final_project_id' => $finalProject->id, 
            'passed' => $passed, 
            'score' => $score,   
        ]);
        // $course = $finalProject->course;
      
 
        return view('results', [
            'finalProject' => $finalProject,
            'passed' => $passed,
            'score' => $score,
            'correctAnswers' => $correctAnswers, 
            'totalQuestions' => $totalQuestions, 
            // 'course' => $course,
        ]);
    }
    
    
}
