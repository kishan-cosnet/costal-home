@extends('theme.default')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Public Holidays</h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Public Holidays</li>
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
                    <a class="btn btn-outline-primary" id="addHolidayBtn" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Add New Holiday"><i class="icon-plus"></i> Add New</a>
                    <button class="btn btn-outline-primary" id="importButton" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Upload CSV and Add Bulk Data">Import CSV</button>
                    <a href="{{ route('holidays.sample') }}" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Download CSV Sample File For Import CSV">Download Sample CSV</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display border" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holidays as $holiday)
                                <tr id="holiday-{{ $holiday->hld_id }}">
                                    <td>{{ $holiday->hld_name }}</td>
                                    <td>{{ $holiday->hld_description }}</td>
                                    <td>{{ $holiday->hld_date }}</td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"><a href="#" class="editHolidayBtn" data-id="{{ $holiday->hld_id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit This Record"><i class="icon-pencil-alt"></i></a></li>
                                            <li class="delete"><a href="#" class="deleteHolidayBtn" data-id="{{ $holiday->hld_id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Delete This Record"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
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

<!-- Add/Edit Holiday Modal -->
<div class="modal fade" id="holidayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add New Holiday</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="holidayForm">
                    <input type="hidden" id="hld_id">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="mb-3">
                        <label for="hld_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="hld_name" name="hld_name" placeholder="Holiday Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="hld_date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="hld_date" name="hld_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="hld_description" class="form-label">Description</label>
                        <textarea class="form-control" id="hld_description" name="hld_description" rows="3" placeholder="Holiday Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Import CSV Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Holidays</h5>
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
                Are you sure you want to delete this holiday?
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

        let hld_id;

        // Ensure CSRF token is sent with every request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Add Holiday Button Click
        $('#addHolidayBtn').click(function() {
            $('#holidayForm').trigger('reset');
            $('#modalTitle').text('Add Public Holiday');
            $('#saveBtn').text('Save');
            $('#holidayModal').modal('show');
        });

        // Save Holiday (Add/Update)
        $('#holidayForm').submit(function(e) {
            e.preventDefault();
            let hld_id = $('#hld_id').val();
            let url = hld_id ? 'holidays/' + hld_id : 'holidays';
            let method = hld_id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: {
                    hld_name: $('#hld_name').val(),
                    hld_date: $('#hld_date').val(),
                    hld_description: $('#hld_description').val(),
                },
                success: function(response) {
                    $('#holidayModal').modal('hide');
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
                        $('#holidayModal').modal('hide');
                    } else {
                        // Handle other errors
                        alert('An unexpected error occurred.');
                    }
                }
            });
        });

        // Edit Holiday Button Click
        $('.editHolidayBtn').click(function() {
            hld_id = $(this).data('id');
            $.get('holidays/' + hld_id + '/edit', function(holiday) {
                $('#hld_id').val(holiday.hld_id);
                $('#hld_name').val(holiday.hld_name);
                $('#hld_date').val(holiday.hld_date);
                $('#hld_description').val(holiday.hld_description);
                $('#modalTitle').text('Edit Public Holiday');
                $('#saveBtn').text('Update');
                $('#holidayModal').modal('show');
            });
        });

        // Delete Holiday
        $('.deleteHolidayBtn').click(function() {
            hld_id = $(this).data('id');
            $('#deleteConfirmationModal').modal('show');
        });

        $('#confirmDelete').click(function() {
            $.ajax({
                url: 'holidays/' + hld_id,
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#deleteConfirmationModal').modal('hide');
                    $('#holiday-' + hld_id).remove(); // Remove the row from the table
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
                url: "{{ route('holidays.import') }}",
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