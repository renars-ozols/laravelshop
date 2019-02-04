<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartQty;
use Cart;
use App\Product;

class ShoppingController extends Controller
{
    public function add_to_cart(CartQty $request) {
        
        $pdt = Product::find($request->pdt_id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => array_get($request->validated(), 'qty'),
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        toastr()->success('Product successfully added to cart.', null, ['timeOut' => 4000]);

        return redirect()->route('cart');
    }

    public function add_to_cart_rapid($id) {

        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        toastr()->success('Product successfully added to cart.', null, ['timeOut' => 4000]);

        return redirect()->route('cart');
    }

    public function cart() {

        return view('cart');
    }

    public function cart_delete($id) {

        Cart::remove($id);
        toastr()->success('Product successfully removed from cart.', null, ['timeOut' => 4000]);
        return redirect()->back();
    }

    public function cart_update(CartQty $request, $id) {
        //validate
        $qty = $request->validated();

        Cart::update($id, $qty);

        toastr()->info('Quantity successfully updated!', null, ['timeOut' => 4000]);

        return redirect()->back();
    }
}
