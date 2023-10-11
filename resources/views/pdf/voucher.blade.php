<html>

<head>
    <style>
        body {
            background: rgb(204, 204, 204);
        }

        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }

        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid;
        }

        @media print {

            body,
            page {
                background: white;
                margin: 0;
                box-shadow: 0;
            }

            table {
                height: 100vh;
                width: 100vw;
            }

            td {
                width: 33.3%;
                height: 33.3%;
            }
    </style>
</head>

<body>
    <page size="A4">

        <table>
            <tr>
                <td>Booking ID</td>
                <td>Customer Name:</td>
                <td>Italy</td>
            </tr>
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->customer->name }}</td>
                <td>{{ $booking->property->name }}</td>
            </tr>
          
        </table>
    </page>
</body>

</html>
