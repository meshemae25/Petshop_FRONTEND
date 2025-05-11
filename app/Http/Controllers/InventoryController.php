<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    /**
     * Display a listing of inventory items
     */
    public function index()
    {
        $inventories = Inventory::with('category')->get();
        $categories = Category::all();
        return view('inventory', compact('inventories', 'categories'));
    }

    /**
     * Store a newly created inventory item
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:50|unique:inventories,sku',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'cost' => 'required|numeric|min:0',
            'status' => 'required|in:active,low_stock,out_of_stock',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('inventories', $imageName, 'public');
        }

        // Create inventory item
        $inventory = Inventory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'sku' => $request->sku,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'cost' => $request->cost,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        // Load category for response
        $inventory->load('category');

        return response()->json([
            'success' => true,
            'message' => 'Inventory item created successfully.',
            'inventory' => $inventory,
        ], 201);
    }
}