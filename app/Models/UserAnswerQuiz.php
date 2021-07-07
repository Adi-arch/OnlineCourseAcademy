<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswerQuiz extends Model
{
    use HasFactory;
    protected $fillable = ['question','given_answer','true_answer','user_id'];
}