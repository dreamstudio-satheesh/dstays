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
        $customers = Customer::all();
        return view('bookings.index', compact('bookings'));
    }

    public function getBookings()
    {
        $bookings = Booking::all(); // Fetch bookings from database
        $bookingArray = [];

        foreach ($bookings as $booking) {
            $bookingArray[] = [
                'title' => $booking->property->name.': ' . $booking->customer->name, // Assuming the customer relation
                'start' => $booking->check_in,
                'end' => $booking->check_out,
            ];
        }

        return response()->json($bookingArray);
    }

    public function storeBooking(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $customerId = $request->input('customer_id'); 
        $propertyId = $request->input('property_id'); 

        // Validate, then create a new booking
        $booking = new Booking([
            'check_in' => $startDate,
            'check_out' => $endDate,
            'customer_id' => $customerId, 
            'property_id' => $propertyId, 
            'status' => 'pending', 
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
        //
    }

    public function update(Request $request, Booking $booking)
    {
        //
    }

    public function destroy(Booking $booking)
    {
        //
    }
}
