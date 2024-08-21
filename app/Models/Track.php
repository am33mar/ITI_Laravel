<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $table="tracks_data";
    protected $fillable = [
        'name',
        'branch',
        'number_courses',
        'icon',
    ];
    public function students()
    {
        return $this->hasMany(Student::class, 'track_id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_track', 'track_id', 'course_id');
    }
}
