<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Property;
use Hamcrest\Core\IsNull;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function voucher(Booking $booking) {
        return $booking;

        return view('voucher', compact('booking'));
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id = null)
    {
        $id = $id ?: (Property::first() ? Property::first()->id : null);

        $customers = Customer::all();
        $properties = Property::all();

        return view('home', compact('customers', 'properties', 'id'));
    }
}
