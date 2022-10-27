<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {

        if($request['title']!= null){
            $products = Products::where('title','LIKE','%'.$request->title.'%')->paginate(5);
        }else{
            $products = Products::orderBy('id', 'desc')->paginate(6);

        }

        return view('home', compact('products'));
    }




}
