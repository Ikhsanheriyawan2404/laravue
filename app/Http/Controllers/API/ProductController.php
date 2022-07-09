<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);
    }

    public function store(ProductRequest $request)
    {
        try {
            Product::create($request->validated());
            $success = true;
            $message = 'Successfully add product';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];

        return response()->json($response);
    }

    public function edit(Product $product)
    {
        return response()->json($product);
    }

    public function update(Product $product, ProductRequest $request)
    {
        $product->update($request->validated());
        return response()->json('Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json('Product deleted!');
    }
}
