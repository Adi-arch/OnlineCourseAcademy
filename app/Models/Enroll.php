<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

     protected $fillable = ['card_number','card_month','card_year','ccv','card_name','user_id'];
}
