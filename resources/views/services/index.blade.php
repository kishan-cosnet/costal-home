@extends('theme.default')

@section('content')

<div class="container-fluid">

    <div class="page-title">

        <div class="row">

            <div class="col-sm-6 p-0">

                <h3>Services </h3>

            </div>

            <div class="col-sm-6 p-0">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.html">

                            <svg class="stroke-icon">

                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>

                            </svg></a></li>

                    <li class="breadcrumb-item">Services</li>

                    <li class="breadcrumb-item active">Settings</li>

                </ol>

            </div>

            @if (session('success'))

            <div class="alert alert-success mt-2">

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

                    <a class="btn btn-outline-primary" id="addServiceBtn" type="button"><i class="icon-plus"></i></a>

                </div>



                <div class="card-body">

                    <div class="table-responsive custom-scrollbar">

                        <table class="display border" id="data-source-1" style="width:100%">

                            <thead>

                                <tr>

                                    <th>ID</th>

                                    <th>Service Name</th>

                                    <th>Status</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($services as $service)

                                <tr id="service-{{ $service->service_id }}">

                                    <td>{{ $service->service_id }}</td>

                                    <td>{{ $service->service_name }}</td>

                                    <td><span class=" badge rounded-pill {{ $service->service_status ? 'badge-success' : 'badge-danger' }}">{{ $service->service_status ? 'Active' : 'Inactive' }}</span></td>

                                    <td>

                                        <ul class="action">
                                            <li class="edit"> <a href="#" class="editServiceBtn" data-id="{{ $service->service_id }}"><i class="icon-pencil-alt"></i></a></li>
                                            <li class="delete"><a href="#" class="deleteServiceBtn" data-id="{{ $service->service_id }}"><i class="icon-trash"></i></a></li>

                                        </ul>

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                            <tfoot>

                                <tr>

                                    <th>ID</th>

                                    <th>Service Name</th>

                                    <th>Status</th>

                                    <th>Action</th>

                                </tr>

                            </tfoot>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="modalTitle">Add New Service</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <div class="modal-body" id="errorMessages">
                </div>
                <form id="serviceForm">

                    <input type="hidden" id="service_id">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="mb-3">

                        <label for="name" class="form-label">Service Name</label>

                        <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Service Name" required>

                    </div>

                    <div class="mb-3">

                        <label for="description" class="form-label">Description</label>

                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description" required></textarea>

                    </div>

                    <div class="mb-3">

                        <label for="message" class="form-label">Status</label>

                        <select class="form-select" id="status" name="status" required="">

                            <option value="1">Active</option>

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
<style>
    #errorMessages {
        color: red;
    }
</style>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addServiceBtn').click(function() {
            $('#serviceForm').trigger('reset');
            $('#modalTitle').text('Add Service');
            $('#saveBtn').text('Save');
            $('#serviceModal').modal('show');
        });

        $('#serviceForm').submit(function(e) {
            e.preventDefault();
            let service_id = $('#service_id').val();
            let url = service_id ? 'services/' + service_id : 'services';
            let method = service_id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: {
                    service_name: $('#service_name').val(),
                    service_description: $('#description').val(),
                    service_status: $('#status').val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#serviceModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        $.each(errors, function(key, value) {
                            errorMessage += '<p>' + value[0] + '</p>';
                        });
                        $('#errorMessages').html(errorMessage);
                        $('#errorModal').modal('show');
                    } else {
                        alert('An unexpected error occurred.');
                    }
                }
            });
        });

        $('.editServiceBtn').click(function() {
            let service_id = $(this).data('id');
            $.get('services/' + service_id + '/edit', function(service) {
                $('#service_id').val(service.service_id);
                $('#service_name').val(service.service_name);
                $('#description').val(service.service_description);
                if (service.service_status) {
                    $('#status').val(1);
                } else {
                    $('#status').val(0);
                }

                $('#modalTitle').text('Edit Service');
                $('#saveBtn').text('Update');
                $('#serviceModal').modal('show');
            });
        });

        $('.deleteServiceBtn').click(function() {
            let service_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this service?')) {
                $.ajax({
                    url: 'services/' + service_id,
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#service-' + service_id).remove();
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }
        });
    });
</script>


@endsection