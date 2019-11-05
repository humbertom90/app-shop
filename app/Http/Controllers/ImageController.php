<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($id){

        $product = Product::find($id);
        $images = $product->images;
        return view('admin.products.images.index')->with(compact('product', 'images'));

    }

    public function store(Request $request, $id){

        $file = $request->file('photo');
        $path = public_path(). '\img\products';
        $fileName = uniqid(). $file->getClientOriginalName();
        $file->move($path, $fileName);

        $productImage = new ProductImage();
        $productImage->image = $fileName;
        $productImage->product_id = $id;
        $productImage->save();

        return back();

    }

    public function destroy(){

    }
}
