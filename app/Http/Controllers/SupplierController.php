<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        $suppliers = Supplier::orderBy('company_name')->get();
        return response()->json([
            'supplier' => $suppliers
        ]);
    }

    public function show(Supplier $supplier) {
        $suppliers = Supplier::find($supplier);
        if (!$suppliers) {
            return response()->json([
                'message' => 'Supplier not found'
            ]);
        }
        return response()->json([
            'supplier' => $supplier
        ]);
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'company_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'contact_person' => 'required|string'
        ]);

        $supplier = Supplier::create($request->all());
        return response()->json([
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, Supplier $supplier) {
        $suppliers = Supplier::find($supplier);
        if (!$suppliers) {
            return response()->json([
                'message' => 'Supplier not found'
            ]);
        }

        $request->validate([
            'company_name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'contact_person' => 'string',
        ]);

        $supplier->update($request->all());
        return response()->json([
            'status' => 'OK',
            'message' => 'Supplier with ID#' . $supplier->id . ' has been updated successfully'
        ]);
    }

    public function destroy($id) {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json([
                'message' => 'Supplier not found'
            ]);
        }

        $supplier->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Supplie with ID#' . $supplier->id . ' has been deleted successfully'
        ]);
    }
}
