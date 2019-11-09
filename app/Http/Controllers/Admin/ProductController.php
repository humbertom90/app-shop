<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('admin.Products.index')->with(compact('products'));
    }

    public function create(){
        $categories = Category::orderBy('name')->get();
        return view('admin.Products.create')->with(compact('categories'));
    }

    public function store(Request $request){

        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe superar los 3 caracteres',
            'description.required' => 'La descripcion corta es un campo requerido',
            'description.max' => 'La descripcion corta solo admite hasta 100 caracteres',
            'price.required' => 'Es obligatorio definir un precio para el producto',
            'price.numeric' => 'Es obligatorio definir un precio para el producto',
            'price.min' => 'No se admiten valores negativos'
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:100',
            'price' => 'required|numeric|min:0'

        ];

        $this->validate($request, $rules, $messages);

        $product = New Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save();

        return redirect('/admin/products');

    }

    public function edit($id){

        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.Products.edit')->with(compact('product', 'categories'));
    }

    public function update(Request $request, $id){

        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe superar los 3 caracteres',
            'description.required' => 'La descripcion corta es un campo requerido',
            'description.max' => 'La descripcion corta solo admite hasta 100 caracteres',
            'price.required' => 'Es obligatorio definir un precio para el producto',
            'price.numeric' => 'Es obligatorio definir un precio para el producto',
            'price.min' => 'No se admiten valores negativos'
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:100',
            'price' => 'required|numeric|min:0'

        ];

        $this->validate($request, $rules, $messages);


        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save();

        return redirect('/admin/products');

    }

    public function destroy($id){

        ProductImage::where('product_id', $id)->delete();
        $product = Product::find($id);
        $product->delete();

        return back();


    }

}
