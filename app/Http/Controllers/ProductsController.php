<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Mail\NotiMail;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Exports\ProductsExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;



class ProductsController extends Controller
{
    /**
     * To show product information
     *
     * @return View index product
     */

    public function index(Request $request)
    {

        if($request->isMethod('get')){
        if ($request->has('search'))
            {
                $products = Products::where('title', 'LIKE', '%' . $request->title . '%')->paginate(5);
            }
            elseif($request->has('export')){

                $p= Products::where('title', 'LIKE', '%' . $request->title . '%')->get();
                // return $p;
                return Excel::download(new ProductsExport($p), 'products.csv');
            }
            else {
            $products = Products::orderBy('id', 'desc')->paginate(5);
            }
        $i = ($request->input('page', 1) - 1) * 5;

        return view('admin.products.index', compact('products', 'i'));

        }
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

        return view('admin.products.edit', compact('product', 'categories'));
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

        return view('admin.products.show', compact('product', 'categories'));
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
        return redirect('admin/products')->with('success', 'product update successfully .');
    }

    public function import(Request $request)
    {
        Excel::import(new ProductImport, $request->file);

        return redirect()->route('products.index');
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

        return redirect()->route('products.index')->with('success', 'product delete successfully .');
    }
}
