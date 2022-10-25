<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Image;
use App\Mail\NotiMail;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\File;
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
        // $products = Products::all();

        $products = Products::orderBy('id', 'desc')->paginate(6);

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
        $product->user_id = auth()->user()->id;
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];


        $product->save();
        foreach ($request['category'] as $cat_id) {
            $category = Category::find($cat_id);
            $product->categories()->attach($category);
        }
        $image = new Image();
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            // dd($file);
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
    public function show($id)
    {
        $categories  = Category::all();
        $product = Products::find($id);
        $user = User::all();

        return view('product_detail', compact('product', 'categories'));
    }

    /**
     * To show product edit page
     *
     * @return View index edit
     */
    public function edit($id)

    {
        $categories  = Category::all();
        $product = Products::find($id);
        if ( Gate::allows('edit', $product)) {
              return view('product_edit', compact('product', 'categories'));
        }else{
            abort(403);
        }
    }

    /**
     * To update product information
     *
     * @return View index product
     */
    public function update(ProductUpdateRequest $request, $id)
    {

        $product = Products::find($id);
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->save();
        $product->categories()->detach();
        foreach ($request['category'] as $cat_id) {
            $category = Category::find($cat_id);
            $product->categories()->attach($category);
        }

        $image = Image::where('imageable_id', $id)->first();
        if (request()->hasFile('image')) {
            unlink(public_path('img/' . $image->name));
            $file = request()->file('image');
            // dd($file);
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = ('img');
            $file->move($save_path, $save_path . "/$file_name");
            $image->name =  $file_name;
            $image->path = "$save_path/$file_name";
            $product->image()->save($image);
        }


        return redirect('product')->with('success', 'product update successfully .');
    }
    /**
     * To delete product information
     *
     * @return View index product
     */
    public function delete($id)
    {
        $product = Products::find($id);
        $email = $product->users->email;
        // dd($email);
        if ($product) {
            $product->categories()->detach();
            $product->delete();
        }


        Mail::to($email)->send(new NotiMail());

        return redirect()->route('product')->with('success', 'product delete successfully .');
    }
}
