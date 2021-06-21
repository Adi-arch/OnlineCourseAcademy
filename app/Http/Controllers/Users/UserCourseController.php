<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Enroll;
use Illuminate\Support\Facades\DB;

class UserCourseController extends Controller
{
    public function viewCourse(Request $request)
    {
        $userId =  $request->user()->id;
        $enrolledCourses = DB::table('enrolls')->join('users','enrolls.user_id','users.id')->join('courses','enrolls.course_id','courses.id')->select('courses.cname as course_name','courses.image_path as course_image','courses.video_path as course_video')->where('user_id',$userId)->get();
        return view('dashboard.user.userCourses',compact('enrolledCourses'));
    }

    public function viewVideo(Request $request)
    {
         $userId =  $request->user()->id;
        $courseVideos = DB::table('enrolls')->join('users','enrolls.user_id','users.id')->join('courses','enrolls.course_id','courses.id')->select('courses.video_path as course_video')->where('user_id',$userId)->get();
        return view('dashboard.user.courseVideos',compact('courseVideos'));
    }


}