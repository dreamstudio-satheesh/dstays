<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:expense_categories',
        ]);

        $category = ExpenseCategory::create(['name' => $request->name]);

        return response()->json(['message' => 'Category added successfully', 'category' => $category]);
    }
}
