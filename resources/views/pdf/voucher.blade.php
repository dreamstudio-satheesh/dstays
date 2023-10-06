<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Voucher</title>
    <style>
        /* Base Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        /* Row and Column Styles */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px; /* Adjust for column padding */
        }

        .col {
            flex: 1;
            padding: 0 10px; /* Adjust for column padding */
        }

        /* Additional Styles */
        p {
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Voucher Container -->
    <div class="container">
        <h1>Booking Voucher</h1>
        <div class="row">
            <div class="col">
                <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
                <p><strong>Customer Name:</strong> {{ $booking->customer->name }}</p>
                <p><strong>Property Name:</strong> {{ $booking->property->name }}</p>
                <p><strong>Check-in Date:</strong> {{ $booking->check_in }}</p>
                <p><strong>Check-out Date:</strong> {{ $booking->check_out }}</p>
                <p><strong>Booking Type:</strong> {{ $booking->name }}</p>
                <p><strong>Status:</strong> {{ $booking->status }}</p>
            </div>
            <div class="col">
                <p><strong>Bill/Package Amount:</strong> {{ $booking->bill_package_amount }}</p>
                <p><strong>Advance Payment:</strong> {{ $booking->advance_payment }}</p>
                <p><strong>Number of People:</strong> {{ $booking->number_of_people }}</p>
            </div>
        </div>
    </div>
</body>
</html>
