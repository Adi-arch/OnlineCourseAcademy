<?php

namespace App\Http\Controllers;

use App\Models\Courses;

use Illuminate\Http\Request;

class CourseCartController extends Controller
{
    public function shop()
    {
        $course = Courses::all();
        //dd($course);
        return view('pages.shop')->withTitle('SKILLS UNIVERSITY | SHOP')->with(['course' => $course]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('pages.cart')->withTitle('SKILLS UNIVERSITY | CART')->with(['cartCollection' => $cartCollection]);;
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
