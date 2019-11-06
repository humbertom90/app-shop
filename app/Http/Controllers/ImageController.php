<?php

namespace App\Http\Controllers;



use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use File;

class ImageController extends Controller
{
    public function index($id){

        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'DESC')->get();
        return view('admin.products.images.index')->with(compact('product', 'images'));

    }

    public function store(Request $request, $id){

        $file = $request->file('photo');
        $path = public_path(). '\img\products';
        $fileName = uniqid(). $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);

        if($moved){

            $productImage = new ProductImage();
            $productImage->image = $fileName;
            $productImage->product_id = $id;
            $productImage->save();

        }

        return back();

    }

    public function destroy($id){

        $productImage = ProductImage::find($id);
        if(substr($productImage->image, 0, 4) === 'http'){
            $deleted = true;
        }else{
            $fullpath = public_path().'/img/products/'. $productImage->image;
            $deleted = File::delete($fullpath);
        }

        if($deleted){
            $productImage->delete();
        }

        return back();

    }

    public function select($id, $image){

        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back();


    }
}
