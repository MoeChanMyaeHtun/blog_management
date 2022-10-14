<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;



class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::orderBy('updated_at', 'DESC');
        $products = Products::search('title')->paginate(5);
        return view('products.index', compact('products'));

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
        foreach($request['category'] as $cat_id ){
            $category = Category::find($cat_id);
        $product->categories()->attach($category);
        }
        return redirect('/products');
    }


    public function show($id)
    {
        $categories  = Category::all();
        $product = Products::find($id);

        return view('products.show',compact('product','categories'));
    }

    public function edit($id){
        $categories  = Category::all();
        $product = Products::find($id);
        return view('products.edit', compact('product','categories'));
    }


    public function update(Request $request,$id){
        $request -> validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product =Products::find($id);
        $product ->title = $request['title'];
        $product ->description = $request['description'];
        $product ->price = $request['price'];
        $product -> save();
        $product->categories()->detach();
        foreach($request['category'] as $cat_id ){
            $category = Category::find($cat_id);
        $product->categories()->attach($category);
        }
        return redirect('/products')->with('success','product update successfully .');
    }

    public function delete($id){
        $product = Products::find($id);
        $product->categories()->detach();
        $product -> delete();
        return back()->with('success','product delete successfully .');
    }

}
