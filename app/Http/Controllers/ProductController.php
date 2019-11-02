<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('admin.Products.index')->with(compact('products'));
    }

    public function create(){
        return view('admin.Products.create');
    }

    public function store(Request $request){

        $product = New Product();
        $product->name = $request->input('name');
        $product->description = $request->input('Description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');

    }

    public function edit($id){

        $product = Product::find($id);
        return view('admin.Products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('Description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');

    }

    public function destroy($id){

        $product = Product::find($id);
        $product->delete();

        return back();


    }

}
