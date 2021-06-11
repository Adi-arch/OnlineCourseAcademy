<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Courses;

class EnrollCourseController extends Controller
{
    public function enroll()
    {
        $courses = Courses::all();
        return view('courses',compact('courses'));
    }
    
    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $courses = Courses::find($id);

        if(!$courses) {
            abort(404);
        }

        $cart = session()->get('cart');
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
        if($request->cid) {
            $cart = session()->get('cart');
            if(isset($cart[$request->cid])) {
                unset($cart[$request->cid]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Course removed successfully');
        }
    }


}
