<?php
/**
 * Created by PhpStorm.
 * User: humberto
 * Date: 31/10/19
 * Time: 22:45
 */

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class TestController extends Controller {

    public function welcome(){
        $products = Product::all();
        return view('welcome')->with(compact('products'));
    }

} 