@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Booking Type </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Booking Type</li>
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
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-3 card-no-border">
                    <!-- <a class="btn btn-outline-primary" href="{{ route('services.create') }}" type="button">Add New Service</a> -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="icon-plus"></i> Add New
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display border" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Booking Type 1</td>
                                    <td><span class="badge rounded-pill badge-success">Active</span></td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="" data-bs-toggle="modal" data-bs-target="#editService"><i class="icon-pencil-alt"></i></a></li>
                                            <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Booking Type 2</td>
                                    <td><span class="badge rounded-pill badge-danger">Inactive</span></td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="" data-bs-toggle="modal" data-bs-target="#editService"><i class="icon-pencil-alt"></i></a></li>
                                            <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal">Edit Booking Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modalForm" class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Booking Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Booking Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Content</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Content" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="service_status">Status</label>
                        <select class="form-select" name="service_status" id="service_status" required="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary" form="modalForm">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editService" tabindex="-1" aria-labelledby="editService" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editService">Edit Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modalForm" class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Booking Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Booking Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Content</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Content" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="service_status">Status</label>
                        <select class="form-select" name="service_status" id="service_status" required="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary" form="modalForm">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection