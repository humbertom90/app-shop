<?php
/**
 * Created by PhpStorm.
 * User: humberto
 * Date: 31/10/19
 * Time: 22:45
 */

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;


class TestController extends Controller {

    public function welcome(){
        $categories = Category::has('products')->get();
        return view('welcome')->with(compact('categories'));
    }

} 