<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Enroll;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $courses = Courses::all();      
        return view('dashboard.instructor.dashboard',compact('courses'));
    }
    public function studentEnroll()
    {
        $studentEnrolls= DB::table('enrolls')
                        ->join('users','enrolls.user_id','users.id')
                        ->join('courses','enrolls.course_id','courses.id')
                        ->select('users.name as sname','users.email as semail','courses.cname as cname')
                        ->get();

        return view('dashboard.instructor.studentsEnrolled',compact('studentEnrolls'));
    }

    public function deleteCourse($id) 
    {
        DB::delete('delete from courses where id = ?',[$id]);
        echo "Deleted successfull";
    }
}
