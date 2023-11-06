@extends('layouts.admin')


@push('scripts')

<script>
    document.getElementById('category_id').addEventListener('change', function() {
        if (this.value === 'add_new') {
            // Show the modal when "+ Add New Category" is selected
            $('#addCategoryModal').modal('show');

            // Reset the dropdown to its default value
            this.value = '';
        }
    });

    document.getElementById('saveNewCategory').addEventListener('click', function() {
    const newCategoryName = document.getElementById('newCategoryName').value;

    if (newCategoryName) {
        $.ajax({
            url: "{{ route('categories.store') }}",
            method: 'POST',
            data: {
                name: newCategoryName,
                _token: "{{ csrf_token() }}" // CSRF token for security
            },
            success: function(response) {
                if (response.message) {
                    alert(response.message);

                    // Optionally, you can also append the new category to the dropdown
                    const newOption = new Option(response.category.name, response.category.id, true, true);
                    $('#category_id').append(newOption).trigger('change');

                    // Close the modal
                    $('#addCategoryModal').modal('hide');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error: ' + errorThrown);
            }
        });
    } else {
        alert('Please enter a category name.');
    }
});

</script>

    
@endpush

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


                            <div class="col-xs-6 col-md-6 form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    <option value="add_new">+ Add New Category</option>
                                </select>
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control" id="newCategoryName" placeholder="Enter new category name">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="saveNewCategory">Save</button>
                                        </div>
                                    </div>
                                </div>
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
