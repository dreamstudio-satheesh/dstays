<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'date' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'amount' => 'required|numeric|min:0',
        ]);

        // Create a new expense
        $expense = new Expense();
        $expense->date = $validatedData['date'];
        $expense->description = $validatedData['description'];
        $expense->amount = $validatedData['amount'];
        $expense->save();

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully');
    }
}
