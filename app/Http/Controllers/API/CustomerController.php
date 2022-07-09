<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all()->toArray();
        return array_reverse($customers);
    }

    public function store()
    {
        Customer::insert([
            'name' => request('name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'address' => request('address'),
        ]);

        return response()->json('Customer created!');
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Customer $customer)
    {
        $customer->update(request()->all());
        return response()->json('Customer updated!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json('Customer deleted!');
    }
}
