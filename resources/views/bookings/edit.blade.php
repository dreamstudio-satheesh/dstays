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
                        <form action="{{ route('bookings.update',$booking->id) }}"  method="POST" >
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
                                    <input type="date" class="form-control" value="{{ date('d-m-Y', strtotime($book->check_in)) }}" name="check_in">
                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label for="end_date">Check-Out Date</label>
                                    <input type="date" class="form-control" id="end_date">
                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label for="customer_id">Customer</label>
                                    <select class="form-control" name="customer_id" id="customer_id">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--  <div class="col-xs-6 col-md-6 form-group">
                                <label for="property_id">Property</label>
                                <select class="form-control" id="property_id">
                                    @foreach ($properties as $property)
                                        <option value="{{ $property->id }}"  {{ $property->id == $id ? 'selected' : '' }} >{{ $property->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                                <input type="hidden" id="property_id" name="property_id"
                                    value="">
                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">No Of people</label>
                                    <input type="number" name="number_of_people" id="number_of_people"
                                        class="form-control" placeholder="No Of People">
                                    <span id="number_of_peopleError" class="text-danger error"></span>

                                </div>



                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Payment Mode</label>
                                    <select class="form-control" name="advance_type" id="advance_type">
                                        <option value="Full Payment">Full Payment</option>
                                        <option value="Full Payment">partial Payment</option>
                                        <option value="Full Payment">Nill Payment</option>
                                    </select>

                                </div>

                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Booking Type</label>
                                    <select class="form-control" onchange="showInputBox(this.value)"
                                        name="booking_type" id="booking_type">
                                        <option value="">Select</option>
                                        <option value="Rent">Rent</option>
                                        <option value="Package">Package</option>
                                    </select>

                                </div>


                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Payment Amount</label>
                                    <input type="text" name="advance_payment" value="{{ $booking->advance_payment }}" name="advance_payment"
                                        class="form-control" placeholder="Advance">
                                    <span id="advance_paymentError" class="text-danger error"></span>
                                </div>


                                <div class="col-xs-6 col-md-6 form-group">
                                    <label class="form-label">Rent / Package Amount</label>
                                    <input type="text" id="package_amount" name="package_amount"
                                        class="form-control" placeholder="Rent Amount" style="display: none;">
                                    <input type="text" id="bill_amount" name="bill_amount"
                                        class="form-control" placeholder="Package Amount" style="display: none;">
                                    <span id="bill_amountError" class="text-danger error"></span>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveBooking">Save
                                    Booking</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endsection

     

      
