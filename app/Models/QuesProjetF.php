<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuesProjetF extends Model
{
    //
    protected $fillable = ['final_project_id', 'question', 'correct_answer','incorrect_answer'];

    public function finalProject()
    {
        return $this->belongsTo(ProjetFinal::class, 'final_project_id');
    }
}
