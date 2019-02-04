<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Order;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard')->with('orders', Order::where('user_id', Auth::user()->id)->get());
    }

    public function order($id)
    {
        return view('user.order')->with('order', Order::find($id));
    }

    public function settings()
    {
        toastr()->info('Functionality not created yet!', null, ['timeOut' => 4000]);
        return redirect()->back();
    }
}
