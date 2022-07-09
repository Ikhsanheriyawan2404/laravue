<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all()->toArray();
        return array_reverse($customers);
    }

    public function store(CustomerRequest $request)
    {
        Customer::insert($request->validated());

        return response()->json('Customer created!');
    }

    public function edit(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Customer $customer, CustomerRequest $request)
    {
        $customer->update($request->validated());
        return response()->json('Customer updated!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json('Customer deleted!');
    }
}
