<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\EditProduct;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.products')->with('products', Product::orderBy('id', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $file = $request->file('image');
        $image_new_name = time().$file->getClientOriginalName();
        $image = Image::make($file)->resize(400, 300)->stream()->detach();
        Storage::disk('s3')->put('images/'.$image_new_name, $image, 'public');

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $image_new_name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        toastr()->success('Product successfully created!', null, ['timeOut' => 4000]);

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProduct $request, $id)
    {
        $product = Product::where('id', $id)->first();

        if ($request->hasFile('image')){
    
            $file = $request->file('image');
            $image_new_name = time().$file->getClientOriginalName();
            $image = Image::make($file)->resize(400, 300)->stream()->detach();
            Storage::disk('s3')->put('images/'.$image_new_name, $image, 'public');
            Storage::disk('s3')->delete('images/'.$product->image);
            $product->image = $image_new_name;
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        toastr()->success('Product successfully updated!', null, ['timeOut' => 4000]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        Storage::disk('s3')->delete('images/'.$product->image);
        $product->delete();

        toastr()->success('Product successfully deleted!', null, ['timeOut' => 4000]);

        return redirect()->back();
    }
}
