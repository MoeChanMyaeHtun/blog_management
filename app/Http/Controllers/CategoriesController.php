<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;


class CategoriesController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return View categories list
     */

    public function index(Request $request)
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(5);

        return view('categories.index', compact('categories'));
    }

    /**
     * To show create category view
     *
     * @return View categories create
     */
    public function create(){
        info("hello");
        return view('categories.create');
    }

    /**
     * @param CategoryStoreRequest $request
     * @return View Category store
     */
    public function store(CategoryStoreRequest $request){


        $category = new Category;

        $category->name = $request['name'];
        $category->save();

        return redirect('/categories');
    }
     /**
     * To show edit category view
     * @param $id category id
     * @return View edit category view
     */

    public function edit($id){
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }


    /**
     *To submit edit category view
     * @param array $validated validated values from categoryupdate request
     * @param $id category id
     * @return View category list
     */
    public function update(CategoryUpdateRequest $request,$id){

        $category = Category::find($id);
        $category ->name = $request['name'];
        $category -> save();

        return redirect('/categories')->with('success','Category update successfully .');
    }

    /**
     * To delete category by id
     * @param $id category id
     * @return View category list
     */
    public function delete($id){
        $category = Category::find($id);
        $category -> delete();

        return back()->with('success','Category delete successfully .');
    }

}
