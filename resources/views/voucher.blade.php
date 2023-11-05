
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
	<title>DStays - invoice & Receipt  </title>
    <link href="http://dstays.dreampos.in/assets/img/favicon.png" rel="shortcut icon" />
    
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main-style.css')}}">
</head>
<body class="section-bg-one">
    <main class="container invoice-wrapper" id="download-section">
        <!-- invoice Top -->
        <div class="card-headers d-flex flex-wrap gap-15 align-items-center justify-content-between mb-4">
            <div class="logo">
                <a href="index.html"><img  src="{{ asset('assets/logo.png')}}" title="invoice" alt="invoice"></a>
                <span class="status d-block"> <strong>Date :</strong> 01-12-2023</span>
            </div>
            <div class="title">
                <h4 class="text-30 mb-0 mt-0">Invoice</h4>
                <span class="status d-block text-capitalize"><strong>Status:</strong> Paid</span>
            </div>
        </div>
        <!-- invoice Description -->
        <div class="card-body border-top pt-20 mt-30  mb-3">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Name :</h5>
                        <p class="mb-10">{{ $booking->customer->name }}</p>
                    </div>
                </div>  
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Type:</h5>
                        <p class="mb-10">{{ $booking->name }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Check In :</h5>
                        <p class="mb-10">{{ $booking->check_in }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Check out :</h5>
                        <p class="mb-10">{{ $booking->check_out }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Room type:</h5>
                        <p class="mb-10">Single / 02</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Room type:</h5>
                        <p class="mb-10">Double / 01</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600">Booking date</h5>
                        <p class="mb-10">Double / 01</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="text-18 text-capitalize font-600"> Booking Id :</h5>
                        <p class="mb-10">#{{ $booking->id }}</p>
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
                                <td class="col-3">Rafsan jani</td>
                                <td class="col-3">02654545145</td>
                                <td class="col-4">Dhaka, Mirpur</td>
                                <td class="col-4">04</td>
                            </tr>
                            <tr>
                                <td class="col-3">Abr. Farhan</td>
                                <td class="col-3">+2589365452</td>
                                <td class="col-4">sylhet,Moulvibazar </td>
                                <td class="col-4">01</td>
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
                                <th>Description</th>
                                <th>Other Description</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Room Charges</td>
                                <td>6th floor</td>
                                <td>3</td>
                                <td>$43 USD</td>
                                <td>$1,305 USD</td>
                            </tr>
                            <tr>
                                <td>6 Nights</td>
                                <td>Private Rooms</td>
                                <td>5 person</td>
                                <td>$600 USD</td>
                                <td>$42000 USD</td>
                            </tr>
                            <tr>
                                <td>Lunch-Dinner</td>
                                <td>6 packed - 2days</td>
                                <td>5 person</td>
                                <td>$256 USD</td>
                                <td>$6854 USD</td>
                            </tr>
                            <tr>
                                <td>Service Fee</td>
                                <td>Included VAT</td>
                                <td>0</td>
                                <td>100 USD</td>
                                <td>200 USD</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-4 text-right">
                    <h5 class="text-15"> Total Amount : <strong> 900 USD</strong> </h5>
                </div>
            </div>
        </div>
        <div class="mb-10">
            <h4 class="mb-2 text-title font-700 text-border"> Return Policy : </h4>
            <p>This is an electronic generated receipt so doesn't require any signature. </p>
        </div>
        <div class="mb-10">
            <h4 class="mb-2 text-title font-700 text-border"> Terms & Conditions : </h4>
            <p>If you want to cancel the booking please inform us before 3 days, otherwise, you will not get any refund.
                Invoice was created on a computer and is valid without the signature and seal.</p>
        </div>
    </main>
    <!-- invoice Bottom  -->
    <div class="text-center mt-5 mb-4 regular-button">
        <div class="d-print-none d-flex justify-content-center gap-10 mt-5"> 
            <button id="bill-download" class="btn-primary-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
            </button> 
            <a href="javascript:window.print()" class="btn-primary-fill">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></rect><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path><circle cx="392" cy="184" r="24" fill="currentColor"></circle></svg>
            </a> 
        </div>
    </div>

    <!-- jquery-->
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <!-- Plugin -->
    <script src="assets/js/plugin.js"></script>
    <!-- Main js-->
    <script src="assets/js/mian.js"></script>
</body>
</html>