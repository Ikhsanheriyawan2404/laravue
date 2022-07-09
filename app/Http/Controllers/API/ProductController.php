<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);
    }

    public function store()
    {
        Product::create([
            'name' => request('name'),
            'sku' => request('sku'),
            'price' => request('price'),
            'stock' => request('stock'),
            'description' => request('description')
        ]);

        return response()->json('Product created!');
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Product $product)
    {
        $product->update(request()->all());
        return response()->json('Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json('Product deleted!');
    }
}
