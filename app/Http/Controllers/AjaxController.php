<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ProductPage(){
        return view('ProductPage');
    }
    public function StoreProduct(Request $request){
        $request->validate(
            [
                'name'=>'required|unique:products',
                'price'=>'required'
            ],
            [
                'name.required'=>'name is required',
                'name.unique'=>'product already existed',
                'price.required'=>'price is required',

            ]
        );
        $product = new Product;
        $product->name= $request->name;
        $product->price= $request->price;
        $product->save();
        return response()->json([
        'status'=>'success'
        ]);
    }
}
