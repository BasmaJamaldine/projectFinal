<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProjetF extends Model
{
    //
    protected $fillable = ['user_id', 'final_project_id', 'passed', 'score'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function finalProject()
    {
        return $this->belongsTo(ProjetFinal::class, 'projet_final_id');
    }
}
