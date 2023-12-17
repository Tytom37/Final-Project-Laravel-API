<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index() {
        $purchases = Purchase::orderBy('id')->get();
        return response()->json([
            'purchases' => $purchases
        ]);
    }

    public function show($purchase) {
        $purchases = Purchase::find($purchase);
        if (!$purchases) {
            return response()->json([
                'message' => 'Purchase not found'
            ], 404);
        }
        return response()->json([
            'purchase' => $purchases
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'date' => 'required|date',
            'total' => 'required|integer',
            'invoice_no' => 'required|string',
            'supplier_id' => 'required|exists:suppliers,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $purchase = Purchase::create($request->all());
        return response()->json([
            'purchase' => $purchase,
            'status' => 'OK',
            'message' => 'Purchase with ID#' . $purchase->id . ' has been created successfully.'
        ]);
    }

    public function update(Request $request, $purchase) {
        $purchases = Purchase::find($purchase);
        if (!$purchases) {
            return response()->json([
                'message' => 'Purchase not found'
            ], 404);
        }

        $request->validate([
            'date' => 'date',
            'total' => 'integer',
            'invoice_no' => 'string',
            'supplier_id' => 'exists:suppliers,id',
            'user_id' => 'exists:users,id',
        ]);

        $purchases->update($request->all());
        return response()->json([
            'purchase' => $purchases,
            'status' => 'OK',
            'message' => 'Purchase with ID#' . $purchases->id . ' has been update successfully.'
        ], 200);
    }

    public function destroy($purchase) {
        $purchases = Purchase::find($purchase);
        if (!$purchases) {
            return response()->json([
                'message' => 'Purchase not found'
            ], 404);
        }

        $purchases->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Purchase with ID#' . $purchases->id . ' has been deleted successfully.'
        ], 200);
    }
}
