@extends('layouts.admin')

@push('css')
    <link href="assets/plugins/fullcalendar/core-4.3.1/main.min.css" rel="stylesheet">
    <link href="assets/plugins/fullcalendar/daygrid-4.3.0/main.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src='assets/plugins/fullcalendar/core-4.3.1/main.min.js'></script>
    <script src='assets/plugins/fullcalendar/daygrid-4.3.0/main.min.js'></script>
    <script src='assets/plugins/fullcalendar/interaction/main.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction'],
                defaultView: 'dayGridMonth',
                events: '/get-bookings', // API Endpoint to get booking events
                selectable: true,
                selectLongPressDelay: 500,
                allDay: false ,
                select: function(info) {
                    // Here, you can show the modal
                    console.log('Date range selected');
                    var events = calendar.getEvents();
                    var overlap = false;

                 /*    events.forEach(function(event) {
                        if (info.start < event.end && info.end > event.start) {
                            overlap = true; // The selected date range overlaps with an existing event
                        }
                    }); */

                    if (!overlap) {
                        $('#bookingModal').modal('show');
                        // Optionally, you can populate the modal fields based on the selection
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
            // Add more fields here

            // Send an AJAX request to your Laravel back-end
            $.ajax({
                url: '/store-booking', // Replace with your POST route
                type: 'POST',
                data: {
                    start_date: startDate,
                    end_date: endDate,
                    customer_id: customerId,
                    property_id: propertyId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Close the modal
                    $('#bookingModal').modal('hide');

                    // Refresh the calendar or add the event directly
                    // Option 1: Reload the full calendar
                    calendar.refetchEvents();

                    // Option 2: Add the event directly (no need for another server request)
                    /* calendar.addEvent({
                        title: 'New Booking', // Replace with your dynamic data
                        start: startDate,
                        end: endDate
                    }); */
                }
            });
        });
    </script>
@endpush
@section('content')
    <div class="content">


        <div class="row">

            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header justify-content-between card-header-border-bottom">
                        <h2>Badges </h2>
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


            <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
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
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control" id="start_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" class="form-control" id="end_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_id">Customer</label>
                                        <select class="form-control" name="customer_id" id="customer_id">
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="property_id">Property</label>
                                        <select class="form-control" id="property_id">
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}">{{ $property->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="customername-field" class="form-label">No Of people</label>
                                        <input type="number" name="number_of_people" class="form-control"
                                            placeholder="No Of People">

                                    </div>


                                    <div class="form-group">
                                        <label for="customername-field" class="form-label">Advance Payment</label>
                                        <input type="text" name="advance_payment" class="form-control"
                                            placeholder="Advance">

                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveBooking">Save Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    @endsection
