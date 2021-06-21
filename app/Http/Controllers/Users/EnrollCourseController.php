<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Courses;
use App\Models\Enroll;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class EnrollCourseController extends Controller
{
    public function enroll()
    {
        $courses = Courses::all();
        return view('dashboard.user.courses',compact('courses'));
    }
     
    public function cart(Request $request)
    {   
        $userId = $request->user()->id; 
        $carts = DB::table('carts')->join('users','carts.user_id','users.id')->join('courses','carts.course_id','courses.id')->select('courses.cname as course_name','courses.cprice as course_price','courses.image_path as course_image')->where('user_id',$userId)->get();
         //dd($carts);
         return view('dashboard.user.cart',compact('carts'));
    }
    

    public function addToCart(Request $request,$id)
    {


        // $rowId = 456;
        $userId = $request->user()->id; 
        
       $courses = Courses::find($id);
     

    
    $cart = new Cart();
    $cart->user_id = $userId;
    $cart->course_id = $request->id;

    $cart->save();

        return redirect()->back()->with('success', 'Course added to cart successfully!');
    }



    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Course removed successfully');
        }
    }

    public function checkOut(Request $request)
    {
        $userId = $request->user()->id;         
        $carts = DB::table('carts')->join('users','carts.user_id','users.id')->join('courses','carts.course_id','courses.id')->select('carts.course_id as course_id')->where('user_id',$userId)->get();    
        return view('dashboard.user.checkOut',compact('carts'));        
    }

    public function pay(Request $req)
    {
        $cardNumber =  $req->cardNumber;
        $cardMonth = $req->cardMonth;
        $cardYear = $req->cardYear;
        $cardccv = $req->cardccv;
        $cardName = $req->cardName;
        $courseId= $req->input('courseId');
        $id = $req->user()->id;

        $enroll = new Enroll;

        $enroll->card_number = $cardNumber;
        $enroll->card_month = $cardMonth;
        $enroll->card_year= $cardYear;
        $enroll->ccv = $cardccv;
        $enroll->card_name = $cardName;
        $enroll->course_id = $courseId;
        $enroll->user_id = $id;

        $enroll->save();
        return back()->with('success','Payment successfull!');

    }


}