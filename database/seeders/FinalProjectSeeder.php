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
                'question' => 'Le rôle de l\'artisan est de produire un code propre, maintenable et de qualité.',
                'correct_answer' => 'True',
                'incorrect_answer' => 'False',
            ],
            [
                'question' => 'Les méthodologies agiles permettent une meilleure gestion des projets.',
                'correct_answer' => 'True',
                'incorrect_answer' => 'False',
            ],
            [
                'question' => 'Un objet est une classe.',
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
