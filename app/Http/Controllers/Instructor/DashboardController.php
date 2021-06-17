<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;


class DashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $courses = Courses::all();      
        return view('dashboard.instructor.dashboard',compact('courses'));
    }
}
