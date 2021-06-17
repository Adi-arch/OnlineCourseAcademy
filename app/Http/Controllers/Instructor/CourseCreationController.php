<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Instructor;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;

class CourseCreationController extends Controller
{
    public function createCourse()
    {
        return view('dashboard.instructor.course-upload');
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



        $instructor = Instructor::find(1);
        $course = new Courses;

        $course->cname = $cname;
        $course->cprice = $cprice;
        $course->description = $cdescription;
        $course->video_path=$videoName;
        $course->image_path=$imageName;
        $course->instructor()->associate($instructor);
        $id = $req->user()->id;
        $course->instructor_id=$id;
                //$course=Instructor::find(1)->courses; 
        //one to many
        // foreach($course as $course){
        //     $course->save();
        // }  
        
        //$course->instructor_id= $req->instructor()->id; //one to one
  
        $course->save();

        return back()->with('success','Course has been uploaded.');    
    }

    public function courseUpdate()
    {
        
    }
}
