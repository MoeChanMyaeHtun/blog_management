<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
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

        // if ($request['title']) {
        //     $products=Products::where('title','LIKE','%'.$request->title.'%');
        // }
        // else{
        //     $products = Products::orderBy('id', 'DESC')->paginate(3);
        // }

        if($request['title']!= null){
            $products = Products::where('title','LIKE','%'.$request->title.'%')->paginate(5);
        }else{
            $products = Products::orderBy('id','desc')->paginate(5);
        }

        return view('products.index', compact('products'));

    }

     /**
     * To show create product view
     *
     * @return View create product
     */
    public function create(){
        $categories  = Category::all();

        return view('products.create',compact('categories'));
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
        return redirect('/products');
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

        return view('products.show',compact('product','categories'));
    }

     /**
     * To show product edit page
     *
     * @return View index edit
     */
    public function edit($id){
        $categories  = Category::all();
        $product = Products::find($id);
        return view('products.edit', compact('product','categories'));
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
        return redirect('/products')->with('success','product update successfully .');
    }


    /**
     * To delete product information
     *
     * @return View index product
     */
    public function delete($id){
        $product = Products::find($id);
        $product->categories()->detach();
        $product -> delete();
        return back()->with('success','product delete successfully .');
    }

}
