<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;



class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->paginate(5);
        $i = ($request->input('page', 1) - 1) * 5;
        return view('products.index', compact('products','i'));

    }
    public function create(){
        $categories  = Category::all();
        return view('products.create',compact('categories'));
    }
    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        $product = new Products;
        $product->user_id = auth()->user()->id;
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];

        $product->save();
        foreach($request['category'] as $cid ){
            $category = Category::find('$cid');
        $product->categories()->attach($category);
        }
        // foreach($request['category-names'] as $cid){
        //     $category = Category::find($cid);
        //     $product->categories()->attach($category);
        // }


        return redirect('/products');
    }


}
