@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="breadcrumb-wrapper">

        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Customer Edit</h2>

                    </div>

                    <div class="card-body">
                        <form action="{{ route('customers.update',$customer->id) }}"  method="POST" >
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

                            <div class="form-group">
                                <label for="title" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"  value="{{ $customer->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile_number" class="form-label">Mobile Number</label>
                                <input type="text" name="mobile_number" class="form-control"  value="{{ $customer->mobile_number }}" required>
                            </div>

                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control"  name="address" rows="3">{{ $customer->address }}</textarea>
                            </div>
                          




                            <div class="form-group justify-content-end">
                                <button type="submit" class="btn btn-primary btn-default">Create</button>
                            </div>


                        </form>
                        <br><br><br>

                    </div>
                </div>
            </div>
        @endsection

        @push('css')
            <link href="assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet">
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
