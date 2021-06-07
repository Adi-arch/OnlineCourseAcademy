<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseCreationController extends Controller
{
    public function index()
    {
        return view('instructor.courses.courseCreation');
    }
}
