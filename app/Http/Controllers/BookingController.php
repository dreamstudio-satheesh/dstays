<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Rules\EitherAdvancePaymentOrBillAmountRequired;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function getBookings($id)
    {
        $bookings = Booking::where('property_id', $id)->get(); // Fetch bookings from database
        $bookingArray = [];

        foreach ($bookings as $booking) {
            $bookingArray[] = [
                'title' => $booking->customer->name, // Assuming the customer relation
                'start' => $booking->check_in,
                'end' => $booking->check_out,
            ];
        }

        return response()->json($bookingArray);
    }

    public function storeBooking(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'customer_id' => 'required|integer|exists:customers,id',
            'property_id' => 'required|integer|exists:properties,id',
            'number_of_people' => 'required|integer|min:1',
            'advance_type' => ['required','string'],
            'advance_payment' => 'nullable|numeric|min:0',
            'bill_amount' => 'nullable|numeric|min:0',
            'either_payment' => [new EitherAdvancePaymentOrBillAmountRequired],
        ]);

        // Create a new booking
        $booking = Booking::create([
            'check_in' => $validatedData['start_date'],
            'check_out' => $validatedData['end_date'],
            'customer_id' => $validatedData['customer_id'],
            'property_id' => $validatedData['property_id'],
            'number_of_people' => $validatedData['number_of_people'],
            'advance_type' => $validatedData['advance_type'],
            'advance_payment' => $validatedData['advance_payment'],
            'bill_amount' => $validatedData['bill_amount'],
            'status' => 'active',
        ]);

        return response()->json(['message' => 'Booking created successfully']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|integer',
            'property_id' => 'required|integer',
            'number_of_people' => 'nullable',
            'advance_payment' => 'nullable',
        ]);

        $dates = explode('to', $request->book_date);
        $data['check_in_date'] = trim($dates[0]);
        if (trim($dates[1])) {
            $data['check_out_date'] = trim($dates[1]);
        }

        Booking::create($data);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Boooked  successfully!');
    }

    public function show(Booking $booking)
    {
        //
    }

    public function edit(Booking $booking)
    {
        // return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        //
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking deleted successfully!');
    }
}
