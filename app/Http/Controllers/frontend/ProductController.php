<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Image;
use App\Mail\NotiMail;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;



class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Products::where('user_id', auth()->id())->paginate(6);

        return view('product', compact('products'));
    }

    /**
     * To show create product view
     *
     * @return View create product
     */
    public function create()
    {
        $categories  = Category::all();

        return view('product_create', compact('categories'));
    }

    /**
     * To store product information
     *
     * @return View index product
     */

    public function store(ProductStoreRequest $request)
    {

        $product = new Products;
        $product->user_id = auth()->id();
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];


        $product->save();
        foreach ($request['category'] as $cat_id) {
            $category = Category::find($cat_id);
            $product->categories()->attach($category);
        }

        $image = new Image();
        if(request()->file('image')!=null){

            $file = request()->file('image');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = ('img');
            $file->move($save_path, $save_path . "/$file_name");
            $image->name =  $file_name;
            $image->path = "$save_path/$file_name";
            $product->image()->save($image);
        }


        return redirect('product');
    }



    /**
     * To show product detail information
     *
     * @return View detail page
     */
    public function show(Products $product)
    {
        $categories  = Category::all();

        $user = User::all();

        return view('product_detail', compact('product', 'categories'));
    }

    /**
     * To show product edit page
     *
     * @return View index edit
     */
    public function edit(Products $product)

    {
        $categories  = Category::all();

        if (Gate::allows('edit', $product)) {

            return view('product_edit', compact('product', 'categories'));
        } else {
            return redirect('product');
        }
    }

    /**
     * To update product information
     *
     * @return View index product
     */
    public function update(ProductUpdateRequest $request, Products $product)
    {


        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->save();
        $product->categories()->detach();
        foreach ($request['category'] as $cat_id) {
            $category = Category::find($cat_id);
            $product->categories()->attach($category);
        }

        $image = Image::where('imageable_id',  $product)->first();
        if(request()->file('image')!=null){
            $file = request()->file('image');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            if($image = Image::where('imageable_type','App\Models\Products')->where('imageable_id',$product->id)->first()){
                unlink(public_path('img/'.$image->name));
                $image->name = $file_name;
                $save_path = ('img');
                $image->path = $save_path."/$file_name";
            }else{
                $image = new Image();
                $save_path = ('img');
                $image->name = $file_name;
                $image->path = $save_path."/$file_name";
            }
            $file->move(public_path($save_path), $save_path. "/$file_name");
            $product->image()->save($image);
        }

        return redirect()->route('product.detail', $product);
    }
    /**
     * To delete product information
     *
     * @return View index product
     */
    public function delete(Products $product)
    {

        $email = $product->users->email;
        $image = Image::where('imageable_id',  $product);

        if ($product) {
            $product->categories()->detach();

            $product->delete();

        }
        if($image = Image::where('imageable_id',$product->id)->first()){
            unlink(public_path('img/' . $image->name));
            $product->image()->delete();
           }

        Mail::to($email)->send(new NotiMail());

        return redirect()->route('product')->with('success', 'product delete successfully .');
    }
}
