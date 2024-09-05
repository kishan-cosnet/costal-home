@extends('theme.default')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Booking Cancellation Types</h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Booking Cancellation Types</li>
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
                    <a class="btn btn-outline-primary" id="addBookingBtn" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Add New Record"><i class="icon-plus"></i> Add New</a>
                    <button class="btn btn-outline-primary" id="importButton" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Upload CSV and Add Bulk Data">Import CSV</button>
                    <a href="{{ route('booking-cancellation-types.sample-csv') }}" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Download CSV Sample File For Import CSV">Download Sample CSV</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display border" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                <tr id="booking-{{ $booking->booking_id }}">
                                    <td>{{ $booking->booking_name }}</td>
                                    <td>{{ $booking->booking_description }}</td>
                                    <td><span class="badge rounded-pill badge-{{ $booking->booking_status ? 'success' : 'danger'}}">{{ $booking->booking_status ? 'Active' : 'Inactive' }}</span></td>
                                    <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <ul class=" action">
                                            <li class="edit"><a href="#" class="editBookingBtn" data-id="{{ $booking->booking_id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit This Record"><i class="icon-pencil-alt"></i></a></li>
                                            <li class="delete"><a href="#" class="deleteBookingBtn" data-id="{{ $booking->booking_id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Delete This Record"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
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

<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add New Booking Cancellation Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm">
                    <input type="hidden" id="booking_id">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="mb-3">
                        <label for="booking_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="booking_name" name="booking_name" placeholder=" Booking Cancellation Type Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="booking_description" class="form-label">Description</label>
                        <textarea class="form-control" id="booking_description" name="booking_description" rows="3" placeholder="Booking Cancellation Type Description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="booking_status" class="form-label">Status</label>
                        <select class="form-control" id="booking_status" name="booking_status" required>
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

<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Booking Cancellation Types</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="importForm" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="csv_file">Choose CSV File:</label>
                        <input type="file" name="csv_file" id="csv_file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
                <div class="progress mt-3">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" id="progressBar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
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
                Are you sure you want to delete this booking cancellation type?
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

        let booking_id;

        // Ensure CSRF token is sent with every request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Add Booking Button Click
        $('#addBookingBtn').click(function() {
            $('#bookingForm').trigger('reset');
            $('#modalTitle').text('Add Booking Cancellation Type');
            $('#saveBtn').text('Save');
            $('#bookingModal').modal('show');
        });

        // Save Booking (Add/Update)
        $('#bookingForm').submit(function(e) {
            e.preventDefault();
            let booking_id = $('#booking_id').val();
            let url = booking_id ? 'booking-cancellation-types/' + booking_id : 'booking-cancellation-types';
            let method = booking_id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: {
                    booking_name: $('#booking_name').val(),
                    booking_description: $('#booking_description').val(),
                    booking_status: $('#booking_status').val()
                },
                success: function(response) {
                    $('#reasonModal').modal('hide');
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
                        $('#bookingModal').modal('hide');
                    } else {
                        // Handle other errors
                        alert('An unexpected error occurred.');
                    }
                }
            });
        });

        // Edit Booking Button Click
        $('.editBookingBtn').click(function() {
            booking_id = $(this).data('id');
            $.get('booking-cancellation-types/' + booking_id + '/edit', function(booking) {
                $('#booking_id').val(booking.booking_id);
                $('#booking_name').val(booking.booking_name);
                $('#booking_description').val(booking.booking_description);
                $('#booking_status').val(booking.booking_status ? '1' : '0');
                $('#modalTitle').text('Edit Booking Cancellation Type');
                $('#saveBtn').text('Update');
                $('#bookingModal').modal('show');
            });
        });

        // Delete Booking
        $('.deleteBookingBtn').click(function() {
            booking_id = $(this).data('id');
            $('#deleteConfirmationModal').modal('show');
        });

        $('#confirmDelete').click(function() {
            $.ajax({
                url: 'booking-cancellation-types/' + booking_id,
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#deleteConfirmationModal').modal('hide');
                    $('#booking-' + booking_id).remove();
                },
                error: function(response) {
                    $('#deleteConfirmationModal').modal('hide');
                }
            });
        });

        // Show Import Modal
        $('#importButton').click(function() {
            $('#importModal').modal('show');
        });

        // Handle CSV Import Form Submission
        $('#importForm').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let progressBar = $('#progressBar');

            $.ajax({
                url: "{{ route('booking-cancellation-types.import') }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                xhr: function() {
                    let xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            let percentComplete = Math.round((evt.loaded / evt.total) * 100);
                            progressBar.css('width', percentComplete + '%');
                            progressBar.text(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function(response) {
                    $('#importModal').modal('hide');
                    progressBar.css('width', '0%');
                    progressBar.text('0%');
                    $('#messageContainer').html('<div class="alert alert-success">' + response.success + '</div>');
                    location.reload();
                },
                error: function(xhr) {
                    $('#importModal').modal('hide');
                    progressBar.css('width', '0%');
                    progressBar.text('0%');
                    if (xhr.status === 422) { // Laravel validation error
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value[0] + '</li>';
                        });
                        errorMessage += '</ul></div>';
                        $('#messageContainer').html(errorMessage);
                    } else {
                        $('#messageContainer').html('<div class="alert alert-danger">An unexpected error occurred.</div>');
                    }
                }
            });
        });
    });
</script>
@endsection