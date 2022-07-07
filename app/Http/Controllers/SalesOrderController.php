<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;

class SalesOrderController extends Controller
{
    public function index()
    {
        $sales_orders = SalesOrder::with(['product', 'customer'])->get()->toArray();
        return array_reverse($sales_orders);
    }

    public function store()
    {
        SalesOrder::create([
            'product_id' => request('product_id'),
            'customer_id' => request('customer_id'),
            'qty' => request('qty'),
            'date' => request('date'),
        ]);

        return response()->json('Sales Order created!');
    }

    public function show(SalesOrder $sales_order)
    {
        return response()->json($sales_order);
    }

    public function update(SalesOrder $sales_order)
    {
        $sales_order->update(request()->all());
        return response()->json('Sales Order updated!');
    }

    public function destroy(SalesOrder $sales_order)
    {
        $sales_order->delete();
        return response()->json('Sales Order deleted!');
    }
}
