<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = ['cname','cprice','description','video_path','image_path','instructor_id'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class,'instructor_id','id');
    }


}
