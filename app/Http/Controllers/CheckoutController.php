<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Checkout;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Shipping;
use Mail;
use App\Order;
use App\OrderItem;
use App\Mail\Purchase;

class CheckoutController extends Controller
{
    public function index() {

        if (Cart::content()->count() == 0) {
           toastr()->info('Your cart is empty!', null, ['timeOut' => 4000]);
           return redirect()->back(); 
        }

        return view('checkout');
    }

    public function pay(Checkout $request) {
        
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => (Cart::total() + Shipping::total()) * 100,
                'currency' => 'eur',
                'description' => 'Example charge',
                'source' => $request->stripeToken,
            ]);

            $order = Order::create([
                'name' => $request->name,
                'user_id' => $request->user_id,
                'surname' => $request->surname,
                'email' => $request->email,
                'address' => $request->address,
                'country' => $request->country,
                'county' => $request->county,
                'city' => $request->city,
                'total' => Cart::total() + Shipping::total()
            ]);

            foreach (Cart::content() as $row) {
                $item = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $row->model->id,
                    'name' => $row->model->name,
                    'qty' => $row->qty,
                    'price' => $row->model->price
                ]);
            }

            toastr()->success('Purchase successfull', null, ['timeOut' => 4000]);

            Cart::destroy();

            //Mail::to(request()->email)->send(new Purchase);

            return redirect('/');

        } catch (\Stripe\Error\Base | \Exception $e) {

            return redirect()->back()->withError($e->getMessage());
        }
    }
}
