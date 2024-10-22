<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $title = 'quang anh 1524';
        //return view('products.productsIndex', compact('title'));
        //return view('products.productsIndex')->with('title', $title);
        //send a assocciative array
        $myphone = [
            'name' => 'iphone14',
            'year' => '2022',
            'isFavorite' => true
        ];
        print_r(route('products'));
        return view('products.productsIndex', compact('myphone'));

    }

    public function details()
    {
//        //return "products'id = ".$id;
//        $phones = [
//            'iphone' => 'iphone14',
//            'samsung' => 'samsung'];
//        return view('products.productsIndex',[
//        'product' => $phones[$productName]?? 'unknown product']);
//    }
        //return 'product ' . $productName . ' is ' . $id;

        return view('products.productsIndex');
    }
}
