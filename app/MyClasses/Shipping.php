<?php

namespace App\MyClasses;
use Cart;

class Shipping
{
    /**
     * Custom shipping calculation
    */

    public function total()
    {
        $shipping = null;
        $rate = 10;
        
        for($i = 0; $i <= Cart::count(); $i+=10){
            $shipping += $rate;
        }
        
        return $shipping;
    }
}