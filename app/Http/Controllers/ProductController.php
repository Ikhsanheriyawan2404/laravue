<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);
    }

    public function store()
    {
        $product = new Product([
            'name' => request('name'),
            'detail' => request('detail')
        ]);

        $product->save();
        return response()->json('Product created!');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
    public function update($id)
    {
        $product = Product::find($id);
        $product->update(request()->all());
        return response()->json('Product updated!');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product deleted!');
    }
}