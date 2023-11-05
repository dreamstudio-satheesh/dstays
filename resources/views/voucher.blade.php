<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="bill , receipt,  invoice, booking invoice, general invoice">
    <meta name="author" content="initTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DStays - invoice & Receipt </title>
    <link href="http://dstays.dreampos.in/assets/img/favicon.png" rel="shortcut icon" />

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main-style.css') }}">
</head>

<body class="section-bg-two">
    <main class="container modern-invoice3" id="download-section">
        <!-- invoice Top -->
        <div class="card-headers d-flex flex-wrap gap-15 align-items-center justify-content-between mb-4">
            <div class="logo">
                <a href=""><img src="{{ asset('assets/logo.png') }}" title="invoice" alt="invoice"></a>
                <span class="status d-block"> <strong>Date :</strong>
                    {{ \Carbon\Carbon::parse($booking->created_at)->format('d-m-Y') }} </span>
            </div>
            <div class="title">
                <h4 class="text-30 mb-0 mt-0">Booking Confirmation</h4>
            </div>
        </div>
        <!-- invoice Description -->
        <div class="card-body border-top pt-20 mt-30  mb-3">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Booking Id :</h5>
                        <p class="mb-10">#{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Type:</h5>
                        <p class="mb-10">{{ $booking->booking_type }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Check In :</h5>
                        <p class="mb-10">{{ \Carbon\Carbon::parse($booking->check_in)->format('d-M-y') }} <br>
                            {{ \Carbon\Carbon::parse($booking->check_in)->format('l') }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Check out :</h5>
                        <p class="mb-10">{{ \Carbon\Carbon::parse($booking->check_out)->format('d-M-y') }} <br>
                            {{ \Carbon\Carbon::parse($booking->check_out)->format('l') }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Group Type:</h5>
                        <p class="mb-10">{{ $booking->group_type }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> No of Adults:</h5>
                        <p class="mb-10">{{ str_pad($booking->number_of_adults, 2, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> No of Kids:</h5>
                        <p class="mb-10">{{ str_pad($booking->number_of_kids, 2, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
              
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Booking Status :</h5>
                        <p class="mb-10">Confirmed</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- invoice descriptions -->
        <div class="card mb-2 ">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="card-header">
                            <tr>
                                <td class="col-3"><strong>Guest Name</strong></td>
                                <td class="col-3"><strong>Guest Phone</strong></td>
                                <td class="col-4"><strong>Guest location</strong></td>
                                <td class="col-4"><strong>Total Person</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-3">{{ $booking->customer->name }}</td>
                                <td class="col-3">{{ $booking->customer->mobile_number }}</td>
                                <td class="col-4">{{ $booking->customer->address }}</td>
                                <td class="col-4">{{ str_pad($booking->number_of_adults+$booking->number_of_kids, 2, '0', STR_PAD_LEFT) }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- invoice Table -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive invoice-table mb-20 mt-30">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tarrif Per Day</th>
                                <th>Total Tarrif</th>
                                <th>GST</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Rs. {{ $booking->tarrif_per_day }}</td>
                                <td>Rs. {{ $booking->total_tarrif }}</td>
                                <td>Rs. {{ $booking->gst }}</td>
                            </tr>
                        </tbody>
                    </table>
                            <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Package Name</th>
                                <th> Amount</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Toatal Payable :</td>
                                <td>{{ $booking->total_tarrif + $booking->gst }}</td>
                            </tr>
                            <tr>
                                <td>Advance paid to online date  {{ \Carbon\Carbon::parse($booking->created_at)->format('d-m-Y') }} </td>
                                <td>{{ $booking->advance_payment }}</td>
                            </tr>
                            <tr>
                                <td>Balance To Be Paid</td>
                                <td>{{ ($booking->total_tarrif + $booking->gst ) -$booking->advance_payment }} &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;</td>
                            </tr>
                        </tbody>
                         
                       
                    </table>
                </div>
               
            </div>
        </div>
        <div class="mb-10">
            <p><span class="mb-2 text-title font-700 text-border"> Remarks : </span>
            {{ $booking->remarks }}  </p>   
        </div>
        <div class="mb-10">
            <h4 class="mb-2 text-title font-700 text-border"> House Rules : </h4>
            <p>
                Music speakers are not allowed, Smoking is allowed only in outdoors,
                Our place is not pet friendly,  </p>
            <p>Early check in & late check out is subject to the availability, Any damages happen in our property, it will be chargeable </p>
            
        </div>
        <div class="mb-10">
            <h4 class="mb-2 text-title font-700 text-border"> Cancellation Policy : </h4>
            <p>Cancellation policy - No refund (That amount can be used for your next visit)</p>
           
        </div>

    </main>
    <!-- invoice Bottom  -->
    <div class="text-center mt-5 mb-4 regular-button">
        <div class="d-print-none d-flex justify-content-center gap-10 mt-5">
            <button id="bill-download" class="btn-primary-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path
                        d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32"></path>
                </svg>
            </button>
            <a href="javascript:window.print()" class="btn-primary-fill">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path
                        d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                        fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path>
                    <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32"
                        fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></rect>
                    <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                        stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path>
                    <circle cx="392" cy="184" r="24" fill="currentColor"></circle>
                </svg>
            </a>
        </div>
    </div>

    <!-- jquery-->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Plugin -->
    <script src="{{ asset('assets/js/plugin.js')}}"></script>
    <!-- Main js-->
    <script src="{{ asset('assets/js/mian.js')}}"></script>
</body>

</html>
