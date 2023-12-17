<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index() {
        $sales = Sale::orderBy('id')->get();
        return response()->json([
            'sales' => $sales
        ], 200);
    }

    public function show($sale) {
        $sales = Sale::find($sale);
        if (!$sales) {
            return response()->json([
                'message' => 'Sale not found'
            ], 404);
        }
        return response()->json([
            'sale' => $sales
        ], 200);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'exists:users,id',
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'is_credit' => 'required|boolean',
        ]);

        $sale = Sale::create($request->all());
        return response()->json([
            'sale' => $sale,
            'status' => 'OK',
            'message' => 'Sale with ID#' . $sale->id . ' has been created successfully.'
        ], 201);
    }

    public function update(Request $request, $sale) {
        $sales = Sale::find($sale);
        if (!$sales) {
            return response()->json([
                'message' => 'Sale not found'
            ], 404);
        }

        $request->validate([
            'user_id' => 'exists:users,id',
            'customer_id' => 'exists:customers,id',
            'date' => 'date',
            'is_credit' => 'boolean',
        ]);

        $sales->update($request->all());
        return response()->json([
            'sale' => $sales,
            'status' => 'OK',
            'message' => 'Sale with ID#' . $sales->id . ' has been updated successfully.'
        ], 200); 
    }

    public function destroy($sale) {
        $sales = Sale::find($sale);
        if (!$sales) {
            return response()->json([
                'message' => 'Sale not found'
            ], 404);
        }

        $sales->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Sale with ID#' . $sales->id . ' has been deleted successfully.'
        ], 200);
    }
}
