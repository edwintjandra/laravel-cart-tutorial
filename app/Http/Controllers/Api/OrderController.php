<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

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
            return response()->json(['message','order found']);
        }else {
            return response()->json(['message','order not found']);
        }
    }
}
