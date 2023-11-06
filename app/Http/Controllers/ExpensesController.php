<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('expenses.index');
    }

    public function create()
    {
        $categories=ExpenseCategory::all();
        $properties =Property::all();
        return view('expenses.create', compact('categories','properties));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'date' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'amount' => 'required|numeric|min:0',
            'property_id' => 'required|exists:properties,id', // Ensure the property_id exists in the properties table
            'category_id' => 'nullable|exists:expense_categories,id', // Ensure the category_id exists in the expense_categories table
        ]);

       
        // Create a new expense
        $expense = new Expense();
        $expense->date = $validatedData['date'];
        $expense->description = $validatedData['description'];
        $expense->amount = $validatedData['amount'];
        $expense->user_id = auth()->id(); // Set user_id to the ID of the currently authenticated user
        $expense->property_id = $validatedData['property_id'];
        $expense->category_id = $validatedData['category_id'];
        $expense->save();

        return redirect()
            ->route('expenses.index')
            ->with('success', 'Expense created successfully');
    }
}
