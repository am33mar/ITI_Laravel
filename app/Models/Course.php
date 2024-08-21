<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'total_grade',
        'description',
    ];
    public function tracks()
    {
        return $this->belongsToMany(Track::class, 'course_track', 'course_id', 'track_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }
}
