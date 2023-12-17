<?php

namespace App\Http\Controllers;

use App\Models\Sold_Item;
use Illuminate\Http\Request;

class SoldItemController extends Controller
{
    public function index() {
        $soldItems = Sold_Item::orderBy('id')->get();
        return response()->json([
            'sold_items' => $soldItems
        ], 200);
    }

    public function show($sold_item) {
        $soldItem = Sold_Item::find($sold_item);
        if (!$soldItem) {
            return response()->json([
                'message' => 'Sold item not found'
            ], 404);
        }
        return response()->json([
            'sold_item' => $soldItem
        ], 200);
    }

    public function store(Request $request) {
        $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'sale_id' => 'required|exists:sales,id',
            'qty' => 'required|integer',
            'selling_price' => 'required|numeric',
        ]);

        $soldItem = Sold_Item::create($request->all());
        return response()->json([
            'sold_item' => $soldItem,
            'status' => 'OK',
            'message' => 'Sold Item with ID#' . $soldItem->id . ' has been create successfully.'
        ], 201);
    }

    public function update(Request $request, $sold_item) {
        $soldItem = Sold_Item::find($sold_item);
        if (!$soldItem) {
            return response()->json([
                'message' => 'Sold item not found'
            ], 404);
        }

        $request->validate([
            'merchandise_id' => 'exists:merchandises,id',
            'sale_id' => 'exists:sales,id',
            'qty' => 'integer',
            'selling_price' => 'numeric',
        ]);

        $soldItem->update($request->all());
        return response()->json([
            'sold_item' => $soldItem,
            'status' => 'OK',
            'message' => 'Sold Item with ID#' . $soldItem->id . ' has been updated successfully.'
        ], 200);
    }

    public function destroy($sold_item) {
        $soldItem = Sold_Item::find($sold_item);
        if (!$soldItem) {
            return response()->json([
                'message' => 'Sold item not found'
            ], 404);
        }

        $soldItem->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Sold with ID#' . $soldItem->id . ' has been deleted successfully.'
        ], 200);
    }
}
