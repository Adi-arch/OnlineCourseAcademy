<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $primaryKey = "cid";
    protected $fillable = ['cname','cprice','description','video_path','image_path','instructor_id'];

    public function instructor()
    {
        return $this->belongsTo('App\Models\Instructor','instructor_id','id');
    }


}
