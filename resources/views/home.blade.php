@extends('layouts.admin')

@push('css')
    <link href="{{ url('') }}/assets/plugins/fullcalendar/core-4.3.1/main.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/plugins/fullcalendar/daygrid-4.3.0/main.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ url('') }}/assets/plugins/fullcalendar/core-4.3.1/main.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/fullcalendar/daygrid-4.3.0/main.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/fullcalendar/interaction/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction'],
                titleFormat: {
                    year: 'numeric',
                    month: 'short',
                },
                defaultView: 'dayGridMonth',
                events: "/get-bookings/{{ $id }}", // API Endpoint to get booking events
                selectable: true,
                selectLongPressDelay: 500,
                allDay: true,
                select: function(info) {
                    // console.log('Date range selected');
                    var events = calendar.getEvents();
                    var overlap = false;
                    if (!overlap) {
                        $('#bookingModal').modal('show');
                        $('#start_date').val(info.startStr);
                        $('#end_date').val(info.endStr);

                    } else {
                        alert("The selected date range is already booked.");
                    }

                }
            });
            calendar.render();
        });




        $('#saveBooking').click(function() {
            // Get form values
            let startDate = $('#start_date').val();
            let endDate = $('#end_date').val();
            let customerId = $('#customer_id').val();
            let propertyId = $('#property_id').val();
            let numberOfAdults = $('#number_of_adults').val();
            let numberOfKids = $('#number_of_kids').val();
            let bookingType = $('#booking_type').val();
            let groupType = $('#group_type').val();
            let advanceType = $('#advance_type').val();
            let advancePayment = $('#advance_payment').val();
            let totalTarrif = $('#total_tarrif').val();
            let tarrifPerday = $('#tarrif_per_day').val();
            let gstAmount = $('#gst').val();
            let remarksText = $('#remarks_text').val();

            console.log(totalTarrif);
            // Send an AJAX request to your Laravel back-end
            $.ajax({
                url: '/store-booking', // Replace with your POST route
                type: 'POST',
                data: {
                    start_date: startDate,
                    end_date: endDate,
                    customer_id: customerId,
                    property_id: propertyId,
                    number_of_adults: numberOfAdults,
                    number_of_kids: numberOfKids,
                    advance_type: advanceType,
                    booking_type: bookingType,
                    group_type: groupType,
                    advance_payment: advancePayment,
                    total_tarrif: totalTarrif,
                    tarrif_per_day: tarrifPerday,
                    gst: gstAmount,
                    remarks: remarksText,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#bookingModal').modal('hide');
                    // calendar.refetchEvents();

                    console.log('Success function executed');
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 422) { // When status code is 422, it's a validation issue
                        // Display errors on each form field
                        var errors = jqXHR.responseJSON.errors;
                        $('.error').html(''); // Clear previous errors

                        Object.keys(errors).forEach(function(key) {
                            $('#' + key + 'Error').html(errors[key][0]);
                        });
                    } else {
                        console.error("Request failed: " + textStatus);
                    }
                }
            });
        });
    </script>
@endpush
@section('content')
    <div class="content">


        <div class="row">

            @if ($id)
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header justify-content-between card-header-border-bottom">
                            <select class="form-control" onchange="if (this.value) window.location=this.value">
                                <option value="">Select</option>
                                @foreach ($properties as $property)
                                    <option value="{{ url('home') }}/{{ $property->id }}"
                                        {{ $property->id == $id ? 'selected' : '' }}>{{ $property->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal">
                        <i class="mdi mdi-plus mr-1"></i> New Booking
                    </button>
                </div>
            @endif




            <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form id="bookingForm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookingModalLabel">Create New Booking</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="bookingForm">

                                    <div class="row">
                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label for="start_date">Check-In Date</label>
                                            <input type="date" class="form-control" id="start_date">
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
                                            value="{{ $id }}">

                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">Group Type</label>
                                            <select class="form-control" name="group_type" id="group_type">
                                                <option value="Family">Family</option>
                                                <option value="Friends">Friends</option>
                                            </select>

                                        </div>


                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">No of Adults</label>
                                            <input type="number" name="number_of_adults" id="number_of_adults"
                                                class="form-control" placeholder="No Of Adults">
                                            <span id="number_of_adultsError" class="text-danger error"></span>

                                        </div>

                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">No of Kids</label>
                                            <input type="number" name="number_of_kids" id="number_of_kids"
                                                class="form-control" placeholder="No Of Kids" value="0">
                                            <span id="number_of_kidsError" class="text-danger error"></span>

                                        </div>



                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">Payment Mode</label>
                                            <select class="form-control" name="advance_type" id="advance_type">
                                                <option value="Full Payment">Full Payment</option>
                                                <option value="Full Payment">partial Payment</option>
                                                <option value="Full Payment">Nil Payment</option>
                                            </select>

                                        </div>

                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">Booking Type</label>
                                            <select class="form-control" name="booking_type" id="booking_type">
                                                <option value="Rent">Rent</option>
                                                <option value="Package">Package</option>
                                            </select>

                                        </div>


                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">Advance Amount</label>
                                            <input type="text" name="advance_payment" id="advance_payment"
                                                class="form-control" placeholder="Advance">
                                            <span id="advance_paymentError" class="text-danger error"></span>
                                        </div>

                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">Tarrif Per Day</label>
                                            <input type="text" name="tarrif_per_day" id="tarrif_per_day"
                                                class="form-control" placeholder="Amount">
                                            <span id="tarrif_per_dayError" class="text-danger error"></span>
                                        </div>

                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">Total Tarrif</label>
                                            <input type="text" name="total_tarrif" id="total_tarrif"
                                                class="form-control" placeholder="Amount">
                                            <span id="total_tarrifError" class="text-danger error"></span>
                                        </div>

                                        <div class="col-xs-6 col-md-6 form-group">
                                            <label class="form-label">GST</label>
                                            <input type="text" name="gst" id="gst" value="18"
                                                class="form-control" placeholder="Amount">
                                            <span id="gstError" class="text-danger error"></span>
                                        </div>


                                        <div class="col-xs-12 col-md-12 form-group">
                                            <label class="form-label">Property Unit:</label>
                                           {{-- cteate text area remarks --}}
                                           <input type="text" name="remarks" id="remarks_text" value=""
                                                class="form-control" placeholder="Unit">
                                          
                                          
                                        </div>


                                        

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="saveBooking">Save
                                            Booking</button>
                                    </div>
                                </form>

                                <br><br><hr><br><br>
                            </div>
                    </div>
                </div>


            </div>
        @endsection
