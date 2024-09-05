@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>All User </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Account</li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="card-header card-no-border">
                    <a class="btn btn-outline-primary" href="{{ route('carers.create') }}" type="button"><i class="icon-plus"></i></a>

                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <div class="mb-3 col-sm-3">
                            <label class="form-label" for="exampleFormControlSelect17">Roles </label>
                            <select class="form-select input-air-primary digits" id="exampleFormControlSelect17">
                                <option>Administrator</option>
                                <option>Carer</option>
                                <option>Care Circle</option>
                                <option>Client</option>
                                <option>Coordinator</option>
                                <option>Supervisor</option>
                                <option>Branch Manager</option>
                                <option>On-Call</option>
                                <option>On-Call (read only)</option>
                                <option>Registered Manager</option>
                            </select>
                        </div>
                        <table class="display border" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Roles</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> Abdul Riaz* </td>
                                    <td> abdul.mukitriaz@coastal.carelinelive.com </td>
                                    <td> Carer</td>
                                    <td> <span class="badge rounded-pill badge-success">Active</span> </td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="" data-bs-toggle="modal" data-bs-target="#editService"><i class="icon-pencil-alt"></i></a></li>
                                            <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Adam Janman </td>
                                    <td> headchefadam88@gmail.com </td>
                                    <td> Care Circle </td>
                                    <td> <span class="badge rounded-pill badge-success">Active</span> </td>
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
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Roles</th>
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
<!-- Container-fluid Ends-->

@endsection