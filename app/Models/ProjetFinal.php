<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetFinal extends Model
{
    //
    protected $fillable = [ 'title', 'description'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function questions()
    {
        return $this->hasMany(QuesProjetF::class, 'projet_final_id');
    }

    public function studentResults()
    {
        return $this->hasMany(StudentProjetF::class, 'projet_final_id');
    }
    // public function attempts()
    // {
    //     return $this->hasMany(StudentProjetF::class);
    // }
}
