<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;



class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::all();

        return view('product', compact('products'));

    }

     /**
     * To show create product view
     *
     * @return View create product
     */
    public function create(){
        $categories  = Category::all();

        return view('product_create',compact('categories'));
    }

    /**
     * To store product information
     *
     * @return View index product
     */

    public function store(ProductStoreRequest $request){
        $validated = $request->validated();
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
        return redirect('product');
    }


       /**
     * To show product detail information
     *
     * @return View detail page
     */
    public function show($id)
    {
        $categories  = Category::all();
        $product = Products::find($id);
        $user = User::all();

        return view('product_detail',compact('product','categories'));
    }

       /**
     * To show product edit page
     *
     * @return View index edit
     */
    public function edit($id){
        $categories  = Category::all();
        $product = Products::find($id);
        return view('product_edit', compact('product','categories'));
    }

    /**
     * To update product information
     *
     * @return View index product
     */
    public function update(ProductUpdateRequest $request, $id){

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
        return redirect('product')->with('success','product update successfully .');
    }


}
