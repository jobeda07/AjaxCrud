<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ProductPage(){
        $products=Product::latest()->paginate(5);
        return view('ProductPage',compact('products'));
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
    //update product
    public function UpdateProduct(Request $request){
        $request->validate(
            [
                'up_name'=>'required|unique:products,name,'.$request->up_id,
                'up_price'=>'required'
            ],
            [
                'up_name.required'=>'name is required',
                'up_name.unique'=>'product already existed',
                'up_price.required'=>'price is required',

            ]
        );
        Product::where('id',$request->up_id)->update([
          'name'=>$request->up_name,
          'price'=>$request->up_price,
        ]);
        return response()->json([
        'status'=>'success'
        ]);
    }
    public function DeleteProduct(Request $request){
        Product::find($request->product_id)->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function pagination(Request $request){
        $products=Product::latest()->paginate(5);
        return view('Pagination_ProductPage',compact('products'))->render();
    }
    public function SearchProduct(Request $request){
        $products=Product::where('name','like','%'.$request->search_string.'%')
        ->orwhere('price','like','%'.$request->search_string.'%')
        ->orderby('id','desc')
        ->paginate(5);

        if($products->count() >= 1){
            return view('Pagination_ProductPage',compact('products'))->render();
        }else{
            return response()->json([
                'status'=>'nothing_found',
            ]);
        }
    }
}