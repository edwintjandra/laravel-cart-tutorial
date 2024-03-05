<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class CartController extends Controller
{
    //
    public function index(){
        $carts=Cart::where('user_id',Auth::user()->id)->get();
        return view('cart.index', compact('carts'));
    }

    public function addToCart(Request $request){
        //kalo misalkan quantity yang user tambah itu lebih besar dari stock, kita return 
        //redirect terus kasih error message , kalo gaada stock;
        $product=Product::find($request->product_id);
        if($request->quantity > $product->stock){
            return redirect()->route('product.show',$product->slug)->with('failed', 'stock is not enough');   
        }


        //kalo user uda pernah add cart product sebelumnya, tinggal tambah quantity aja.
        $carts=Cart::where('user_id',Auth::user()->id)->get();

        foreach ($carts as $cart) {
            if($cart->product_id == $request->product_id){
                $cart->quantity+=$request->quantity;
                $cart->save();

                return redirect()->route('cart.index');
            }
         }
       
        $cart=Cart::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity
        ]);

        return redirect()->route('cart.index');
    }
}
