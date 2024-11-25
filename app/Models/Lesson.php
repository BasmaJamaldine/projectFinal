<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    //
    protected $fillable = ['nameLesson', 'file', 'course_id', 'order'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

   
    public function coach()
    {
        return $this->hasOneThrough(User::class, Course::class,  'course_id', 'user_id');
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class,'Lesson_Users')->withPivot('completed')->withTimestamps();
    }

    public function isAccessible(): bool
    {
        $user = Auth::user();
        if ($this->order === 1) {
            return true;
        }
        $previousLesson = Lesson::where('course_id', $this->course_id)
            ->where('order', $this->order - 1)
            ->first();

        if (!$previousLesson) {
            return false;
        }

        return $previousLesson->users()->wherePivot('user_id', $user->id)->wherePivot('completed', true)->exists();
    }

    public function isCompletedByUser($userId = null): bool
    {
        $userId = $userId ?? Auth::id();
        
        return $this->users()->wherePivot('user_id', $userId)->wherePivot('completed', true)->exists();
    }
    public function completions()
    {
        return $this->users()->wherePivot('completed', true);
    }
}
