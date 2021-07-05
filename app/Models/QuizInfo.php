<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizInfo extends Model
{
    use HasFactory;

    protected $fillable = [
         'instructor_id','course_id', 'question_length','uniqueid','time',
    ];
}