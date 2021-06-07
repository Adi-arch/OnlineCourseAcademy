<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;


class InstructorController extends Controller
{
    function create(Request $request){
        //Validate inputs
        $request->validate([
           'name'=>'required',
           'email'=>'required|email|unique:instructors,email',
           'qualification'=>'required',
           'password'=>'required|min:5|max:30',
           'cpassword'=>'required|min:5|max:30|same:password'
        ]);
    

        $instructor = new Instructor();
        $instructor->name = $request->name;
        $instructor->email = $request->email;
        $instructor->qualification = $request->qualification;
        $instructor->password = \Hash::make($request->password);
        $save = $instructor->save();

        if( $save ){
            return redirect()->back()->with('success','You are now registered successfully as Instructor');
        }else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
    }
    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:instructors,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in instructors table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('instructor')->attempt($creds) ){
            return redirect()->route('instructor.home');
        }else{
            return redirect()->route('instructor.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('instructor')->logout();
        return redirect('/');
    }

}
