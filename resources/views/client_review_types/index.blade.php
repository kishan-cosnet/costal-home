@extends('theme.default')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Client Review Types</h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Client Review Types</li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
            @if (session('success'))
            <div class="alert alert-success mt-2" id="">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-3 card-no-border">
                    <a class="btn btn-outline-primary" id="addClientReviewTypeBtn" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Add New Record"><i class="icon-plus"></i> Add New</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display border" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientReviewTypes as $clientReviewType)
                                <tr id="clientReviewType-{{ $clientReviewType->crt_id }}">
                                    <td>{{ $clientReviewType->crt_name }}</td>
                                    <td>{{ $clientReviewType->crt_description }}</td>
                                    <td><span class="badge rounded-pill badge-{{ $clientReviewType->crt_status ? 'success' : 'danger'}}">{{ $clientReviewType->crt_status ? 'Active' : 'Inactive' }}</span></td>
                                    <td>{{ $clientReviewType->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"><a href="#" class="editClientReviewTypeBtn" data-id="{{ $clientReviewType->crt_id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit This Record"><i class="icon-pencil-alt"></i></a></li>
                                            <li class="delete"><a href="#" class="deleteClientReviewTypeBtn" data-id="{{ $clientReviewType->crt_id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Delete This Record"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="clientReviewTypeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add New Client Review Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="clientReviewTypeForm">
                    <input type="hidden" id="crt_id">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="mb-3">
                        <label for="crt_name" class="form-label">Type</label>
                        <input type="text" class="form-control" id="crt_name" name="crt_name" placeholder="Review Type Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="crt_description" class="form-label">Description</label>
                        <textarea class="form-control" id="crt_description" name="crt_description" rows="3" placeholder="Review Type Description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="crt_status" class="form-label">Status</label>
                        <select class="form-control" id="crt_status" name="crt_status" required>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this client review type?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="errorMessages">
            </div>
        </div>
    </div>
</div>

<style>
    #errorMessages {
        color: red;
    }
</style>
<script>
    $(document).ready(function() {

        $('[data-bs-toggle="tooltip"]').tooltip();

        let crt_id;

        // Ensure CSRF token is sent with every request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Add Booking Button Click
        $('#addClientReviewTypeBtn').click(function() {
            $('#clientReviewTypeForm').trigger('reset');
            $('#modalTitle').text('Add New Client Review Type');
            $('#saveBtn').text('Save');
            $('#clientReviewTypeModal').modal('show');
        });

        // Save Booking (Add/Update)
        $('#clientReviewTypeForm').submit(function(e) {
            e.preventDefault();
            let crt_id = $('#crt_id').val();
            let url = crt_id ? 'client-review-types/' + crt_id : 'client-review-types';
            let method = crt_id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: {
                    crt_name: $('#crt_name').val(),
                    crt_description: $('#crt_description').val(),
                    crt_status: $('#crt_status').val()
                },
                success: function(response) {
                    $('#clientReviewTypeModal').modal('hide');
                    location.reload(); // Reload the page to show the updated data
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        $.each(errors, function(key, value) {
                            errorMessage += '<p>' + value[0] + '</p>'; // Appends each error message
                        });

                        // Show error messages in a modal
                        $('#errorMessages').html(errorMessage);
                        $('#errorModal').modal('show');
                        $('#clientReviewTypeModal').modal('hide');
                    } else {
                        // Handle other errors
                        alert('An unexpected error occurred.');
                    }
                }
            });
        });

        // Edit Booking Button Click
        $('.editClientReviewTypeBtn').click(function() {
            crt_id = $(this).data('id');
            $.get('client-review-types/' + crt_id + '/edit', function(crt) {
                $('#crt_id').val(crt.crt_id);
                $('#crt_name').val(crt.crt_name);
                $('#crt_description').val(crt.crt_description);
                $('#crt_status').val(crt.crt_status ? '1' : '0');
                $('#modalTitle').text('Edit Client Review Type');
                $('#saveBtn').text('Update');
                $('#clientReviewTypeModal').modal('show');
            });
        });

        // Delete Booking
        $('.deleteClientReviewTypeBtn').click(function() {
            crt_id = $(this).data('id');
            $('#deleteConfirmationModal').modal('show');
        });

        $('#confirmDelete').click(function() {
            $.ajax({
                url: 'client-review-types/' + crt_id,
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#deleteConfirmationModal').modal('hide');
                    $('#clientReviewType-' + crt_id).remove();
                },
                error: function(response) {
                    $('#deleteConfirmationModal').modal('hide');
                }
            });
        });
    });
</script>
@endsection