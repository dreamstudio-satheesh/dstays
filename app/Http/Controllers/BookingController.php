<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Property;
use Illuminate\Http\Request;

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
  
        //return response()->json($request->all());
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $customerId = $request->input('customer_id');         
        $propertyId = $request->input('property_id'); 
        $numberOfPeople = $request->input('number_of_people'); 
        $advanceType = $request->input('advance_type'); 
        $advancePayment = $request->input('advance_payment'); 
        $billAmount = $request->input('bill_amount'); 

        // Validate, then create a new booking
        $booking = new Booking([
            'check_in' => $startDate,
            'check_out' => $endDate,
            'customer_id' => $customerId, 
            'property_id' => $propertyId, 
            'number_of_people' => $numberOfPeople, 
            'advance_type' => $advanceType, 
            'advance_payment' => $advancePayment, 
            'bill_amount' => $billAmount, 
            'status' => 'active', 
        ]);

        $booking->save();

        return response()->json(['message' => 'Booking created']);
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

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
