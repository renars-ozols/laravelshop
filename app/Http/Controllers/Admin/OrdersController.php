<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    public function index()
    {
        return view('admin.orders.orders')->with('orders', Order::orderBy('id', 'desc')->get());
    }

    public function show($id)
    {
        return view('admin.orders.show')->with('order', Order::find($id));
    }

    public function status($id)
    {
        $order = Order::find($id);
        $order->shipped = 1;
        $order->save();

        toastr()->success('Status successfully updated!', null, ['timeOut' => 4000]);

        return redirect()->route('orders.index');

    }
}
