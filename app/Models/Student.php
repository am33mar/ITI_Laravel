<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="students_data";
    protected $primarykey="id";
    protected $fillable = [
        'name',
        'email',
        'grade',
        'gender',
        'image',
    ];
}
