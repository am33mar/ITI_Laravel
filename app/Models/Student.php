<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students_data";
    protected $primarykey = "id";
    protected $fillable = [
        'name',
        'email',
        'grade',
        'gender',
        'image',
        'track_id',
    ];
    //one to many between track and students
    public function tracks()
    {
        return $this->belongsTo(Track::class, 'track_id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }
}
