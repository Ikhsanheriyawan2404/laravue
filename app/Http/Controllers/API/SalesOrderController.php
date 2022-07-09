<?php

namespace App\Http\Controllers\API;

use App\Models\SalesOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests\SalesOrderRequest;

class SalesOrderController extends Controller
{
    public function index()
    {
        $sales_orders = SalesOrder::with(['product', 'customer'])->get()->toArray();
        return array_reverse($sales_orders);
    }

    public function store(SalesOrderRequest $request)
    {
        SalesOrder::create($request->validated());
        return response()->json('Sales Order created!');
    }

    public function edit(SalesOrder $sales_order)
    {
        return response()->json($sales_order);
    }

    public function update(SalesOrder $sales_order, SalesOrderRequest $request)
    {
        $sales_order->update($request->validated());
        return response()->json('Sales Order updated!');
    }

    public function destroy(SalesOrder $sales_order)
    {
        $sales_order->delete();
        return response()->json('Sales Order deleted!');
    }
}
