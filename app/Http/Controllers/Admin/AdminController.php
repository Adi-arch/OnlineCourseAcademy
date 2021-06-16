<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:admins,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in admins table'
        ]);

        $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.home');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }
    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function viewInstructor()
    {
        $instructors = Instructor::all();
        return view('dashboard.admin.instructor',compact('instructors'));
    }
    public function viewUser()
    {
        $users = User::all();
        return view('dashboard.admin.users',compact('users'));
    }
}
