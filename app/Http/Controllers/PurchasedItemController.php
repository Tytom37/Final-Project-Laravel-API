<?php

namespace App\Http\Controllers;

use App\Models\Purchased_Item;
use Illuminate\Http\Request;

class PurchasedItemController extends Controller
{
    public function index() {
        $purchasedItems = Purchased_Item::orderBy('id')->get();
        return response()->json([
            'purchased_items' => $purchasedItems
        ]);
    }

    public function show($purchased_item) {
        $purchasedItem = Purchased_Item::find($purchased_item);
        if (!$purchasedItem) {
            return response()->json([
                'message' => 'Purchased item not found'
            ], 404);
        }
        return response()->json([
            'purchased_item' => $purchasedItem
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'purchase_id' => 'required|exists:purchases,id',
            'whole_sale_qty' => 'required|integer',
            'purchase_price' => 'required|numeric',
        ]);

        $purchasedItem = Purchased_Item::create($request->all());
        return response()->json([
            'purchased_item' => $purchasedItem,
            'status' => 'OK',
            'message' => 'Pruchased Item with ID#' . $purchasedItem->id . ' has been created successfully.'
        ]);
    }

    public function update(Request $request, $purchased_item) {
        $purchasedItem = Purchased_Item::find($purchased_item);
        if (!$purchasedItem) {
            return response()->json(['message' => 'Purchased item not found'], 404);
        }

        $request->validate([
            'merchandise_id' => 'exists:merchandises,id',
            'purchase_id' => 'exists:purchases,id',
            'whole_sale_qty' => 'integer',
            'purchase_price' => 'numeric',
        ]);

        $purchasedItem->update($request->all());
        return response()->json([
            'purchased_item' => $purchasedItem,
            'status' => 'OK',
            'message' => 'Purchased Item with ID#' . $purchasedItem->id . ' hass been updated successfully.'
        ], 200);
    }

    public function destroy($purchased_item) {
        $purchasedItem = Purchased_Item::find($purchased_item);
        if (!$purchasedItem) {
            return response()->json([
                'message' => 'Purchased item not found'
            ], 404);
        }

        $purchasedItem->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Purchased Item with ID#' . $purchasedItem->id . ' has been deleted successfully.'
        ], 200);
    }
}
