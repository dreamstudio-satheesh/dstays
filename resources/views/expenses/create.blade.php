@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="breadcrumb-wrapper">

        </div>
        <div class="row">
            <div class="col-8 col-sm-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Add Explenses</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('expenses.store') }}" method="POST">
                            @csrf
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

                            @php
                                $categories = \App\Moels\ExpenseCategory::all();
                            @endphp


                            <div class="col-xs-6 col-md-6 form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    <option value="add_new">+ Add New Category</option>
                                </select>
                            </div>


                            <div class="row">
                                <div class="col-xs-6 col-md-6 form-group">
                                    <label for="start_date"> Date</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="date">
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add
                                    Expense</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endsection
