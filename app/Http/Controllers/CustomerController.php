<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|integer|digits:10|unique:customers',
            'address' => 'required|string|min:6',
        ]);
        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer=Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $customer = Customer::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|integer|digits:10|unique:customers',
            'address' => 'required|string|min:6',
        ]);

        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
