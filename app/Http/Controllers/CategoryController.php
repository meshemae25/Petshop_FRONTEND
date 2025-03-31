<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        // Just an example; you can fetch categories from your database.
        $categories = [
            1 => 'Electronics',
            2 => 'Books',
            3 => 'Clothing'
        ];

        $category = $categories[$id] ?? 'Category Not Found';

        return view('category', compact('category'));
    }
}
