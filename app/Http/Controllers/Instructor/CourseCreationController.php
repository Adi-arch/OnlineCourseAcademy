<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

class CourseCreationController extends Controller
{
    public function createCourse()
    {
        return view('course-upload');
    }

    public function courseUpload(Request $req)    
    {
        // $req->validate([
        //     'file'=>'required|mimes:csv,txt,xlx,pdf,mp4,jpg,png|max:1999'
        // ]);
        
        $cname = $req->cname;
        $cprice = $req->cprice;
        $cdescription = $req->description;
        $video = $req->file('vfile');
        $image = $req->file('ifile');
        
        $videoName = $video->getClientOriginalName();
        $imageName = $image->getClientOriginalName();

        $video->move(public_path('videos'),$videoName);
        $image->move(public_path('imgs'),$imageName);


        $course = new Courses;
        $course->cname = $cname;
        $course->cprice = $cprice;
        $course->description = $cdescription;
        $course->video_path=$videoName;
        $course->image_path=$imageName;
        $course->save();

                return back()->with('success','Course has been uploaded.');
    
    }
}
