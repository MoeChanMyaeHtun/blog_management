<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;


class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->paginate(5);
        $i = ($request->input('page', 1) - 1) * 5;
        return view('categories.index', compact('categories','i'));

    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $category = new category;

        $category->name = $request['name'];
        $category->save();
        return redirect('/categories');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request,$id){
        $request -> validate([
            'name' => 'required',
        ]);
        $category = Category::find($id);
        $category ->name = $request['name'];
        $category -> save();
        return redirect('/categories')->with('success','Category update successfully .');
    }
    public function delete($id){
        $category = Category::find($id);
        $category -> delete();
        return back()->with('success','Category delete successfully .');
    }

}
