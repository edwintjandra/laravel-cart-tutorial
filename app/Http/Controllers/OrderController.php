<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;

class OrderController extends Controller
{
    //
    public function index(){
        $orders=Order::where('user_id',Auth::user()->id)->get();
        //cari orders yang where order user_id = Auth::user()->id
        //di dalem file order blade php, bikin show order detail.
        //$order->orderItem , buat nampilin semua daftar orderItem di order  
        return view('order.index',compact('orders'));
    }

    public function show($id){
        $order=Order::find($id);

        return view('order.show',compact('order'));
    }

    public function create(){
        return view('order.create');
    }

    public function store(Request $request){
        //bikin Order dulu
        //cart nya user , pindah ke order items,

        $order=Order::create([
            'user_id'=>Auth::user()->id,
            'address'=>$request->address,
            'status'=>'pending'
        ]);

        $carts=Cart::where('user_id',Auth::user()->id)->get();
        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'quantity'=>$cart->quantity
            ]);

            $cart->delete();
        }

        return redirect()->route('order.index');

    }
}
