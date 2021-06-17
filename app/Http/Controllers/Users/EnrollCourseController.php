<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Courses;
use App\Models\Enroll;
use App\Models\Cart;

class EnrollCourseController extends Controller
{
    public function enroll()
    {
        $courses = Courses::all();
        return view('dashboard.user.courses',compact('courses'));
    }
     
    public function cart()
    {   
        $cartCollection = \Cart::getContent();
        return view('dashboard.user.cart',compact('cartCollection'));
    }
    

    public function addToCart(Request $request,$id)
    {
    
       $courses = Courses::find($id);
       $userId=$request->user()->id;
    //   dd($userId);

        if(!$courses) {
            abort(404);
        }

        $cart = session()->get('cart');
        $request->session()->regenerate();
        // if cart is empty then this the first course
        if(!$cart) {
            $cart = [
                    $id => [
                        "cname" => $courses->cname,
                        "cprice" => $courses->cprice,
                        "image_path" => $courses->image_path
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Course added to cart successfully!');
        }
        
        //if cart is not empty add another course
        $cart[$id] = [
            "cname" => $courses->cname,
            "cprice" => $courses->cprice,
            "image_path" => $courses->image_path
        ];
        session()->put('cart', $cart);
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

    public function checkOut()
    {
        return view('dashboard.user.checkOut');
    }

    public function pay(Request $req)
    {
        $cardNumber =  $req->cardNumber;
        $cardMonth = $req->cardMonth;
        $cardYear = $req->cardYear;
        $cardccv = $req->cardccv;
        $cardName = $req->cardName;
        $id = $req->user()->id;

        $enroll = new Enroll;

        $enroll->card_number = $cardNumber;
        $enroll->card_month = $cardMonth;
        $enroll->card_year= $cardYear;
        $enroll->ccv = $cardccv;
        $enroll->card_name = $cardName;
        $enroll->user_id = $id;

        $enroll->save();
        return back()->with('success','Payment successfull!');

    }


}
