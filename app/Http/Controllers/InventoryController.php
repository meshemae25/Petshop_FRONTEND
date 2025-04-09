<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InventoryController extends Controller
{
    // Sample product data (in a real app, this would come from a database)
    private function getDummyProducts()
    {
        return [
            [
                'id' => 1,
                'image' => 'dog-food.jpg',
                'name' => 'Premium Dog Food',
                'category' => 'Food',
                'sku' => 'PF-001',
                'stock' => 1000,
                'price' => 2500,
                'discount' => 15,
                'status' => 'Active',
                'description' => 'High-quality premium dog food with balanced nutrition.'
            ],
            [
                'id' => 2,
                'image' => 'cat-bed.jpg',
                'name' => 'Luxury Cat Bed',
                'category' => 'Accessories',
                'sku' => 'CB-002',
                'stock' => 0,
                'price' => 1350,
                'discount' => 0,
                'status' => 'Out of Stock',
                'description' => 'Comfortable and stylish bed for cats.'
            ],
            [
                'id' => 3,
                'image' => 'dog-toy.jpg',
                'name' => 'Interactive Dog Toy',
                'category' => 'Toys',
                'sku' => 'DT-003',
                'stock' => 43,
                'price' => 850,
                'discount' => 10,
                'status' => 'Active',
                'description' => 'Engaging toy for dogs that keeps them entertained.'
            ],
            [
                'id' => 4,
                'image' => 'cat-food.jpg',
                'name' => 'Organic Cat Food',
                'category' => 'Food',
                'sku' => 'CF-004',
                'stock' => 12,
                'price' => 1900,
                'discount' => 0,
                'status' => 'Low Stock',
                'description' => 'Organic and nutritious food for cats.'
            ],
            [
                'id' => 5,
                'image' => 'pet-shampoo.jpg',
                'name' => 'Gentle Pet Shampoo',
                'category' => 'Grooming',
                'sku' => 'GP-005',
                'stock' => 87,
                'price' => 750,
                'discount' => 5,
                'status' => 'Active',
                'description' => 'Mild and gentle shampoo suitable for all pets.'
            ]
        ];
    }

    /**
     * Display a listing of products
     */
    public function index()
    {
        $products = $this->getDummyProducts();
        
        // In a real app, you might paginate results
        return view('inventory', compact('products'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'sku' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'status' => 'required|string|in:Active,Inactive,Discontinued',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        // In a real app, you would save the product to the database
        // For demonstration purposes, we'll just flash a success message
        
        // Handle file upload if present
        if ($request->hasFile('image')) {
            // Process image upload
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
        }
        
        return redirect()->route('inventory.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit($id)
    {
        $products = $this->getDummyProducts();
        $product = collect($products)->firstWhere('id', $id);
        
        if (!$product) {
            return redirect()->route('inventory.index')
                ->with('error', 'Product not found.');
        }
        
        return view('inventory.edit', compact('product'));
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'sku' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'status' => 'required|string|in:Active,Inactive,Discontinued',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        // In a real app, you would update the product in the database
        
        return redirect()->route('inventory.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product
     */
    public function destroy($id)
    {
        // In a real app, you would delete the product from the database
        
        return redirect()->route('inventory.index')
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Apply discount to a product
     */
    public function applyDiscount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'discount_type' => 'required|string|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        // In a real app, you would apply the discount to the product in the database
        
        return response()->json(['success' => 'Discount applied successfully']);
    }

    /**
     * Remove discount from a product
     */
    public function removeDiscount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        // In a real app, you would remove the discount from the product in the database
        
        return response()->json(['success' => 'Discount removed successfully']);
    }

    /**
     * Update stock for a product
     */
    public function updateStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'action' => 'required|string|in:add,remove,set',
            'quantity' => 'required|integer|min:0',
            'note' => 'nullable|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        // In a real app, you would update the stock and create a stock movement record
        
        return response()->json(['success' => 'Stock updated successfully']);
    }

    /**
     * Apply bulk discount to multiple products
     */
    public function bulkDiscount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_ids' => 'required|array',
            'product_ids.*' => 'integer',
            'discount_type' => 'required|string|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        // In a real app, you would apply the discount to the selected products
        
        return response()->json(['success' => 'Bulk discount applied successfully']);
    }

    /**
     * Update stock for multiple products
     */
    public function bulkStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_ids' => 'required|array',
            'product_ids.*' => 'integer',
            'action' => 'required|string|in:add,remove,percentage',
            'quantity' => 'required|numeric|min:0',
            'note' => 'nullable|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        // In a real app, you would update the stock for the selected products
        
        return response()->json(['success' => 'Bulk stock update applied successfully']);
    }

    /**
     * Delete multiple products
     */
    public function bulkDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_ids' => 'required|array',
            'product_ids.*' => 'integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        // In a real app, you would delete the selected products
        
        return response()->json(['success' => 'Selected products deleted successfully']);
    }
}