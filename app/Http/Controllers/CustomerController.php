<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index() {
        $customers = Customer::orderBy('name')->get();
        return response()->json($customers);
    }


    public function show(Customer $customer)
    {
        // Eager load the 'sales' relationship
        $customerWithSales = Customer::with('sales')->find($customer->id);

        if (!$customerWithSales) {
            return response()->json([
                'message' => 'Customer not found'
            ]);
        }

        return response()->json([
            'customer' => $customerWithSales,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'balance' => 'required|numeric',
        ]);

        $customer = Customer::create($request->all());
        return response()->json([
            'customer' => $customer
        ]);
    }

    public function update(Request $request, Customer $customer) {
        $customers = Customer::find($customer);
        if (!$customers) {
            return response()->json([
                'message' => 'Customer not found'
            ]);
        }

        $request->validate([
            'name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'balance' => 'numeric',
        ]);

        $customer->update($request->all());
        return response()->json([
            'status' => 'OK',
            'message' => 'Customer with ID#' . $customer->id . ' has been updated successfully'
        ]);
    }

    public function destroy(Customer $customer) {
        $customers = Customer::find($customer);
        if (!$customers) {
            return response()->json([
                'message' => 'Customer not found'
            ]);
        }

        $customer->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Customer with ID# ' . $customer->id . ' has been deleted successfully',
        ]);
    }
}
