<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{

    public function index()
    {
        $merchandises = Merchandise::orderBy('brand')->get();
        return response()->json([
            'merchandises' => $merchandises
        ]);
    }

    public function show(Merchandise $merchandise) {
        $merchandises = Merchandise::find($merchandise);
        if (!$merchandise) {
            return response()->json([
                'message' => 'Merchandise not found'
            ]);
        }
        return response()->json([
            'merchandise' => $merchandise
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'brand' => 'required|string',
            'description' => 'required|string',
            'retail_price' => 'required|numeric',
            'whole_sale_price' => 'required|numeric',
            'whole_sale_qty' => 'required|integer',
            'qty_stock' => 'required|integer',
        ]);

        $merchandise = Merchandise::create($request->all());
        return response()->json([
            'merchandise' => $merchandise,
            'status' => 'OK',
            'message' => 'Merchandise with ID#' . $merchandise->id . ' has been created successfully.'
        ]);
    }

    public function update(Request $request, Merchandise $merchandise) {
        $merchandises = Merchandise::find($merchandise);
        if (!$merchandises) {
            return response()->json([
                'message' => 'Merchandise not found'
            ]);
        }

        $request->validate([
            'brand' => 'string',
            'description' => 'string',
            'retail_price' => 'numeric',
            'whole_sale_price' => 'numeric',
            'whole_sale_qty' => 'integer',
            'qty_stock' => 'integer',
        ]);

        $merchandise->update($request->all());
        return response()->json([
            'merchandise' => $merchandise,
            'status' => 'OK',
            'message' => 'Merchandise with ID#' . $merchandise->id . ' has been updated successfully.'
        ]);
    }

    public function destroy(Merchandise $merchandise) {
        $merchandises = Merchandise::find($merchandise);
        if (!$merchandises) {
            return response()->json([
                'message' => 'Merchandise not found'
            ]);
        }

        $merchandise->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Merchandise with ID#' . $merchandise->id . ' has been deleted successfully.'
        ]);
    }
}
 