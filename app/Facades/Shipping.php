<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class Shipping extends Facade{
    protected static function getFacadeAccessor() { return 'shipping'; }
}