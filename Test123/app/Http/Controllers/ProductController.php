<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        $prod = new \App\Product;
        $products = $prod->getAll(); 
        return view('product', array('products' => $products));
    }
    
    public function store(\App\Http\Requests\SaveProductRequest $request){
        
        $prod =  new \App\Product;
        $prod->name = $request->prodname;
        $prod->quantity = $request->quantity;
        $prod->price = $request->price;        
        $prod->store($request);
        
        return redirect('formview')->with('msg', 'Success saving product!');
        
    }
}
