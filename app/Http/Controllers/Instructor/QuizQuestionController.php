<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\QuizInfo;


class QuizQuestionController extends Controller
{

public function index()
{
    return view('dashboard.instructor.createQuestion');
}
    public function store(Request $request)
    {

        $question= new Questions;

        $question = Questions::create([
                'quiz_id' => $request->input('quizid'),
                'question' => $request->input('question'),
                'choice1' => $request->input('option1'),
                'choice2' => $request->input('option2'),
                'choice3' => $request->input('option3'),
                'choice4' => $request->input('option4'),
                'answer' => $request->input('answer')

            ]);

        $id = $request->input('quizid');

        $qustionCount=Questions::where('quiz_id','=', $id)->count();

        $selectLenth=QuizInfo::where('id','=',$id)->value('question_length');
        //return $selectLenth;

        if ($qustionCount < $selectLenth ) {
            $examInfo = QuizInfo::find($id);
            return view('dashboard.instructor.createQuestion', ['examInfo' => $examInfo]);
        }else{
            $uniqueId=QuizInfo::where('id','=',$id)->value('uniqueid');
            return view('dashboard.instructor.index',['uniqueid' =>$uniqueId]);

        }


    }


}
