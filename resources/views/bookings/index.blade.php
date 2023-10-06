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
                        <table id="basic-data-table" class="table nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Property</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $book)
                                    <tr>
                                        <th scope="row"><a href="#" class="fw-semibold">#{{ $book->id }}</a>
                                        </th>
                                        <td>{{ $book->customer->name }}</td>
                                        <td>{{ $book->property->name }}</td>
                                        <td>{{ date('d M', strtotime($book->check_in)) }} - {{ date('d M', strtotime($book->check_out)) }}</td>
                                        <td>

                                            <div class="d-flex gap-2">

                                                <a target="blank" href="https://wa.me/send?phone=91{{$book->customer->mobile_number}}&text=%0D%0AYour+Resort+Booking+Completed+%21+Thanks%0D%0Ahttp%3A%2F%2Fdstays.dreampos.in%2Fvoucher%2F{{ $book->id }}" ><i class="fa fa-whatsapp" style="font-size:24px; color:#43ab43;"></i></a>
                                               
                                                &nbsp;  &nbsp;  &nbsp;

                                                <a target="blank" href="{{ route('voucher', $book->id) }}"
                                                    class="btn btn-sm btn-primary edit-item-btn">Voucher</a>
                                                &nbsp;  &nbsp;  &nbsp;
                                                <!-- Edit Button -->
                                                <a href="{{ route('bookings.edit', $book->id) }}"
                                                    class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                                &nbsp;  &nbsp;  &nbsp;
                                                <div class="remove">
                                                    <form action="{{ route('bookings.destroy', $book->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary remove-item-btn">Remove</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        @endsection

        @push('css')
            <link href="assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @endpush

        @push('scripts')
            <script src="assets/plugins/data-tables/jquery.datatables.min.js"></script>
            <script src="assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>
            <script>
                jQuery(document).ready(function() {
                    jQuery('#basic-data-table').DataTable({
                        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
                    });
                });
            </script>
        @endpush
