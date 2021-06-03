<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use App\Models\Courses;

use Illuminate\Http\Request;

class CourseCartController extends Controller
{
    public function index()
    {
        $course = Courses::all();
        //dd($course);
        return view('user.shop.index', ['course' => $course]);

    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('user.shop.cart', ['cartCollection'=> $cartCollection]);
    }
    public function add(Request$request){
        \Cart::add(array(
            'cid' => $request->cid,
            'cname' => $request->cname,
            'cprice' => $request->cprice,
            
            'attributes' => array(
                'image' => $request->img 
                
            )
        ));
        return redirect()->route('index')->with('success_msg', 'Item is Added to Cart!');
    }

}
