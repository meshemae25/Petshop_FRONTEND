<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        // Retrieve all inventory items (or use pagination if necessary)
        $inventoryItems = Inventory::all();
        
        // Pass the items to the view
        return view('inventory.index', compact('inventoryItems'));
    }

    // Other methods like show, store, update, destroy can go here
}
