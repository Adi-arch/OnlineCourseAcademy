<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizInfo;
use App\Models\Courses;
use Illuminate\Support\Facades\DB;



class QuizCreationController extends Controller
{
    public function create(Request $request)
    {
        $instructorId = $request->user()->id;
        // $courses = DB::table('quiz_infos')->join('courses','quiz_infos.course_id','courses.id',)->select('courses.id as cid,courses.cname as course_name')->get();
        $courses = DB::table('courses')
                    ->select('id','cname')
                    ->where('instructor_id',$instructorId)
                    ->get();

       
        return view('dashboard.instructor.createQuiz',compact('courses'));
    }

    public function uploadQuiz(Request $request)
    {
      
        $quizInfo= new QuizInfo;

        
        
        $quizInfo = QuizInfo::create([
                'instructor_id' => $request->user()->id,
                'course_id' => $request->course_id,
                'question_length' => $request->input('question_length'),
                'uniqueid' => $request->input('uniqueid'),
                'time' => $request->input('time')
            ]);
            
        return view('dashboard.instructor.createQuestion', ['quizInfo' => $quizInfo]);
    }
}