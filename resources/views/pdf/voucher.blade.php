<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Voucher</title>
    <!-- Include Bootstrap CSS (You may need to adjust the path) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add additional CSS styling here */

        /* Customize the voucher container */
        .voucher-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Voucher Container -->
    <div class="container voucher-container">
        <h1 class="text-center">Booking Voucher</h1>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
                <p><strong>Customer Name:</strong> {{ $booking->customer->name }}</p>
                <p><strong>Property Name:</strong> {{ $booking->property->name }}</p>
                <p><strong>Check-in Date:</strong> {{ $booking->check_in }}</p>
                <p><strong>Check-out Date:</strong> {{ $booking->check_out }}</p>
                <p><strong>Booking Type:</strong> {{ $booking->name }}</p>
                <p><strong>Status:</strong> {{ $booking->status }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Bill/Package Amount:</strong> {{ $booking->bill_package_amount }}</p>
                <p><strong>Advance Payment:</strong> {{ $booking->advance_payment }}</p>
                <p><strong>Number of People:</strong> {{ $booking->number_of_people }}</p>
            </div>
        </div>
    </div>
</body>
</html>
