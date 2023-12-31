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
        $expenses=Expense::all();
        return view('expenses.index',compact('expenses'));
    }

    public function create()
    {
        $categories = ExpenseCategory::all();
        $properties = Property::all();
        return view('expenses.create', compact('categories', 'properties'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'expense_date' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'amount' => 'required|numeric|min:0',
            'property_id' => 'required|exists:properties,id', // Ensure the property_id exists in the properties table
            'category_id' => 'nullable|exists:expense_categories,id', // Ensure the category_id exists in the expense_categories table
            'bill_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the uploaded image
        ]);

        // Create a new expense
        $expense = new Expense();
        $expense->expense_date = $validatedData['expense_date'];
        $expense->description = $validatedData['description'];
        $expense->amount = $validatedData['amount'];
        $expense->user_id = auth()->id(); // Set user_id to the ID of the currently authenticated user
        $expense->property_id = $validatedData['property_id'];
        $expense->category_id = $validatedData['category_id'];
        $expense->save();

        // Associate the uploaded bill image with the expense
        if ($request->hasFile('bill_image')) {
            $expense->addMediaFromRequest('bill_image')->toMediaCollection('bills');
        }

        return redirect()
            ->route('expenses.index')
            ->with('success', 'Expense created successfully');
    }
}
