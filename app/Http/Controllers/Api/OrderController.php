<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    //

    public function processPayment(Request $request){
       


        $validatedData = $request->validate([
            'order_id' => ['required'],
        ]);

        $order=Order::find($request->order_id);
        if($order){
            $order->status="paid";
            $order->save();

            //dalam satu order bisa beli banyak produk atau order item
            foreach ($order->orderItems as $item) {
                //kurangin stock barang dengan quantity order 
                //pastiin juga quantity order nya ga ngelebihin stock barang, jadi stock nya ga minus
                $product= $item->product;
                if($product->stock >= $item->quantity){
                    $product->stock -= $item->quantity;
                    $product->save();
                }
            }
            


            return response()->json(['message','order found']);
        }else {
            return response()->json(['message','order not found']);
        }
    }
}
