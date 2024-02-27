<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    //

    public function index(){
        $products=Product::All();
        return view('product.index',compact('products'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
            'description' => 'required'
        ]);

        $slug=Str::slug($request->name);

        $product=Product::create([
            'name'=>$request->name,
            'slug'=>$slug,
            'price'=>$request->price,
            'description'=>$request->description
        ]);

        return redirect()->route('product.index');
    }

    public function show(Request $request,$slug){
        $product=Product::where('slug',$slug)->first();

        //kondisi kalo misalkan product nya ga ketemu , harus di validate
        // if($product== null){
        //     //kasih alert
        //     return redirect()->route('product.index');
        // }

        return view('product.show',compact('product'));
    }
}
