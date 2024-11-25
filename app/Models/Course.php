<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'name',
        'max_students',
        'description',
        'start',
        'end',
        'image',
        'type',
        'user_id',

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'Course_Users');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'Course_Users')->withTimestamps();
    }

    public function isFull()
    {
        return $this->max_students <= 0;
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function finalProject()
    {
        return $this->hasOne(ProjetFinal::class);
    }
    public function getScoreAttribute()
{
    $totalLessons = $this->lessons()->count();
    $completedLessons = $this->lessons()->whereHas('completions', function ($query) {
        $query->where('user_id', auth()->id());
    })->count();

    return $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0;
}
}
