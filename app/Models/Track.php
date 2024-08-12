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
}
