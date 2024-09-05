@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Missed Tasks </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Missed Tasks</li>
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
                    <!-- <a class="btn btn-outline-primary" href="{{ route('carers.create') }}" type="button"><i class="icon-plus"></i></a> -->
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="icon-plus"></i> 
                    </button> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display border" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Client</th>
                                    <th>Carer</th>
                                    <th>Timestamp</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge bg-warning rounded-pill p-2"> Missed </span></td>
                                    <td>please ensure that Robert is wearing his careline</td>
                                    <td>Helen Norris</td>
                                    <td><span class="badge rounded-pill badge-light-info"> Gerry Duffy </span></td>
                                    <td>18:50</td>
                                    <td>-</td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="" data-bs-toggle="modal" data-bs-target="#editService"><i class="icon-pencil-alt"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-warning rounded-pill p-2"> Missed </span></td>
                                    <td>Commode - empty, disinfect and return for use after cleaning.</td>
                                    <td>Beth Dismore</td>
                                    <td><span class="badge rounded-pill badge-light-info"> Hannah Churchley </span></td>
                                    <td>15:55</td>
                                    <td>-</td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="" data-bs-toggle="modal" data-bs-target="#editService"><i class="icon-pencil-alt"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Client</th>
                                    <th>Carer</th>
                                    <th>Timestamp</th>
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