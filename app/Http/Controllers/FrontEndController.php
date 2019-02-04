<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class FrontEndController extends Controller
{
    public function index()
    {
        if (Product::count() == 0)
        {
            Artisan::call('db:seed', ['--class' => 'ProductsTableSeeder']);
        }
        return view('index')->with('products', Product::orderBy('created_at', 'desc')->paginate(9));
    }

    public function singleCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $products = $category->products()->orderBy('created_at', 'desc')->paginate(9);

        return view('category')->with('category', $category)
                               ->with('products', $products);
    }

    public function singleProduct($cat_slug, $prod_slug)
    {
        $product = Product::where('slug', $prod_slug)->first();
        $cat_slug = $product->category->slug;

        return view('product')->with('product', $product);
    }
    
}
