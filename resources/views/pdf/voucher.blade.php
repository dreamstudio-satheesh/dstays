<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Voucher</title>
    <style>
        /* Add CSS styling for your voucher here */
    </style>
</head>
<body>
    <h1>Booking Voucher</h1>
    <table>
        <tr>
            <th>Booking ID:</th>
            <td>{{ $booking->id }}</td>
        </tr>
        <tr>
            <th>Customer Name:</th>
            <td>{{ $booking->customer->name }}</td>
        </tr>
        <tr>
            <th>Property Name:</th>
            <td>{{ $booking->property->name }}</td>
        </tr>
        <tr>
            <th>Check-in Date:</th>
            <td>{{ $booking->check_in }}</td>
        </tr>
        <tr>
            <th>Check-out Date:</th>
            <td>{{ $booking->check_out }}</td>
        </tr>
        <tr>
            <th>Booking Type:</th>
            <td>{{ $booking->name }}</td>
        </tr>
        <tr>
            <th>Bill/Package Amount:</th>
            <td>{{ $booking->bill_package_amount }}</td>
        </tr>
        <tr>
            <th>Advance Payment:</th>
            <td>{{ $booking->advance_payment }}</td>
        </tr>
        <tr>
            <th>Number of People:</th>
            <td>{{ $booking->number_of_people }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $booking->status }}</td>
        </tr>
    </table>
</body>
</html>
