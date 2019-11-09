<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id')->paginate(10);
        return view('admin.Categories.index')->with(compact('categories'));
    }

    public function create(){
        return view('admin.Categories.create');
    }

    public function store(Request $request){

        $this->validate($request, Category::$rules, Category::$messages);

        Category::create($request->all());

        return redirect('/admin/categories');

    }

    public function edit($id){

        $category = Category::find($id);
        return view('admin.Categories.edit')->with(compact('category'));
    }

    public function update(Request $request, $id){

        $this->validate($request, Category::$rules, Category::$messages);


        $category = Category::find($id);
        $category->update($request->all());

        return redirect('/admin/categories');

    }

}
