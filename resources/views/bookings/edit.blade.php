@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="breadcrumb-wrapper">

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Bookings</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="mb-3">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif


                            <div class="row">
                                <div class="col-xs-6 col-md-6 form-group">
                                    <label for="start_date">Check-In Date</label>
                                    <input type="date" class="form-control" value="{{ $booking->check_in }}"
                                        name="check_in">
                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label for="end_date">Check-Out Date</label>
                                    <input type="date" class="form-control" value="{{ $booking->check_out }}"
                                        name="check_out">
                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label for="customer_id">Customer</label>
                                    <select class="form-control" name="customer_id">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}"
                                                {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-6 col-md-6 form-group">
                                    <label for="property_id">Property</label>
                                    <select class="form-control" name="property_id">
                                        @foreach ($properties as $property)
                                            <option value="{{ $property->id }}"
                                                {{ $property->id == $booking->property_id ? 'selected' : '' }}>
                                                {{ $property->name }}</option>
                                        @endforeach
                                    </select>
                                </div>






                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">No Of Adults</label>
                                    <input type="number" name="number_of_adults" value="{{ $booking->number_of_adults }}"
                                        class="form-control" placeholder="No Of Adults">
                                    <span id="" class="text-danger error"></span>

                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">No Of Kids</label>
                                    <input type="number" name="number_of_kids" value="{{ $booking->number_of_kids }}"
                                        class="form-control" placeholder="No Of Kids">
                                    <span id="" class="text-danger error"></span>

                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Group Type</label>
                                    <select class="form-control" name="group_type" id="group_type">
                                        <option value="Family" {{ $booking->group_type == 'Family' ? 'selected' : '' }}>
                                            Family</option>
                                        <option value="Friends" {{ $booking->group_type == 'Friends' ? 'selected' : '' }}>
                                            Friends</option>
                                    </select>
                                </div>


                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Booking Type</label>
                                    <select class="form-control" name="booking_type" id="booking_type">
                                        <option value="Rent" {{ $booking->booking_type == 'Rent' ? 'selected' : '' }}>Rent</option>
                                        <option value="Package" {{ $booking->booking_type == 'Package' ? 'selected' : '' }}>Package</option>
                                    </select>
                                </div>
                                


                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Payment Mode</label>
                                    <select class="form-control" name="advance_type" id="advance_type">
                                        <option value="Full Payment"
                                            {{ $booking->advance_type == 'Full Payment' ? 'selected' : '' }}>Full Payment
                                        </option>
                                        <option value="Partial Payment"
                                            {{ $booking->advance_type == 'Partial Payment' ? 'selected' : '' }}>Partial
                                            Payment</option>
                                        <option value="Nil Payment"
                                            {{ $booking->advance_type == 'Nil Payment' ? 'selected' : '' }}>Nil Payment
                                        </option>
                                    </select>

                                </div>


                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Payment Amount</label>
                                    <input type="text" name="advance_payment" value="{{ $booking->advance_payment }}"
                                        name="advance_payment" class="form-control" placeholder="Advance">
                                    <span id="advance_paymentError" class="text-danger error"></span>
                                </div>


                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Tarrif Per Day</label>
                                    <input type="text" name="tarrif_per_day" id="tarrif_per_day" class="form-control"
                                        value="{{ $booking->tarrif_per_day }}" placeholder="Amount">
                                    <span id="tarrif_per_dayError" class="text-danger error"></span>
                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Total Tarrif</label>
                                    <input type="text" name="total_tarrif" id="total_tarrif" class="form-control"
                                        value="{{ $booking->total_tarrif }}" placeholder="Amount">
                                    <span id="total_tarrifError" class="text-danger error"></span>
                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">GST</label>
                                    <input type="text" name="gst" id="gst" class="form-control"
                                        placeholder="Amount" value="{{ $booking->gst }}">
                                    <span id="gstError" class="text-danger error"></span>
                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Food Description</label>
                                    <input type="text" name="food_description" id="gst" class="form-control"
                                        placeholder="description" value="{{ $booking->food_description }}">

                                </div>


                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Food Amount</label>
                                    <input type="text" name="food_admount" id="gst" class="form-control"
                                        placeholder="Amount" value="{{ $booking->food_admount }}">

                                </div>



                                <div class="col-xs-12 col-md-12 form-group">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" name="remarks" id="remarks_text" cols="10" rows="3"> {{ $booking->remarks }}</textarea>
                                    <span id="" class="text-danger error"></span>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save
                                    Booking</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endsection
