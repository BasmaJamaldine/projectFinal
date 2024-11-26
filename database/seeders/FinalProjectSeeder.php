<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\ProjetFinal;
use App\Models\QuesProjetF;
use Illuminate\Database\Seeder;

class FinalProjectSeeder extends Seeder
{
    public function run(): void
    {
        $finalProject = ProjetFinal::create([
            'title' => 'Projet Final d\'Formation',
            'description' => 'Ce projet final permet d\'évaluer vos compétences acquises durant la formation.',
        ]);

        // Ajouter des questions pour ce projet final
        $this->createQuestionsForProject($finalProject);

        $this->command->info('Le projet final a été ajouté avec succès.');

        // Ajoutez des questions au projet final
    }
    private function createQuestionsForProject(ProjetFinal $finalProject)
    {
        $questions = [
            [
                'question' => 'The role of a software craftsman is to produce clean, maintainable, and quality code.',
                'correct_answer' => 'True',
                'incorrect_answer' => 'False',
            ],
            [
                'question' => 'Agile methodologies enable better project management.',
                'correct_answer' => 'True',
                'incorrect_answer' => 'False',
            ],
            [
                'question' => 'An object is a class',
                'correct_answer' => 'False',
                'incorrect_answer' => 'True',
            ],
            [
                'question' => 'Test-Driven Development (TDD) slows down the development process.',
                'correct_answer' => 'False',
                'incorrect_answer' => 'True',
            ],

        ];

   
        foreach ($questions as $questionData) {
            QuesProjetF::create([
                'projet_final_id' => $finalProject->id, 
                'question' => $questionData['question'],
                'correct_answer' => $questionData['correct_answer'],
                'incorrect_answer' => $questionData['incorrect_answer'],
            ]);
        }
    }
     
}
