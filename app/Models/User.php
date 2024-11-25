<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'password',
        'profile_image',
        'role',
        'requested_role',
        'role_request_status',
        'role_request_sent',
    ];



    public function courses()
    {
        return $this->belongsToMany(Course::class, 'Course_Users')->withTimestamps();;
    }
    
    
    public function lessons()
{
    return $this->belongsToMany(Lesson::class, 'Lesson_Users')->withPivot('completed')->withTimestamps();
}




/**
 * Vérifie si l'utilisateur a terminé toutes les leçons d'un cours
 */
public function hasCompletedAllLessons(Course $course): bool
{
    $totalLessons = $course->lessons->count();
    $completedLessons = $course->lessons()
        ->whereHas('completions', function ($query) {
            $query->where('user_id', $this->id);
        })
        ->count();

    return $totalLessons > 0 && $totalLessons === $completedLessons;
}
 


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}


