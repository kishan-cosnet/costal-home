@extends('theme.default')

@section('content')

<div class="container-fluid">

    <div class="page-title">

        <div class="row">

            <div class="col-sm-6 p-0">

                <h3>Clients </h3>

            </div>

            <div class="col-sm-6 p-0">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.html">

                            <svg class="stroke-icon">

                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>

                            </svg></a></li>

                    <li class="breadcrumb-item">Clients</li>

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

                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

                        <i class="icon-plus"></i> 

                    </button> -->

                </div>

                <div class="card-body">

                    <div class="table-responsive custom-scrollbar">

                        <table class="display border" id="data-source-1" style="width:100%">

                            <thead>

                                <tr>

                                    <th>Name</th>

                                    <th>Type</th>

                                    <th>Phone</th>

                                    <th>Age</th>

                                    <th>Contract(s)</th>

                                    <th>Status</th>

                                    <!-- <th>Action</th> -->

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td> Abbott, Mr Geoffrey </td>

                                    <td> Private via BHCC </td>

                                    <td> 01273 419791 </td>

                                    <td> 90 </td>

                                    <td> Private via Brighton and Hove (Hove) </td>

                                    <td><span class="badge rounded-pill badge-success">Active</span></td>

                                    <!-- <td>

                                        <ul class="action">

                                            <li class="edit"> <a href="" data-bs-toggle="modal" data-bs-target="#editService"><i class="icon-pencil-alt"></i></a></li>

                                            <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>

                                        </ul>

                                    </td> -->

                                </tr>

                                <tr>

                                    <td> Adams, Mr Frank </td>

                                    <td> Private </td>

                                    <td> 01903 505878 </td>

                                    <td> 74 </td>

                                    <td> Private </td>

                                    <td><span class="badge rounded-pill badge-success">Active</span></td>

                                    <!-- <td>

                                        <ul class="action">

                                            <li class="edit"> <a href="" data-bs-toggle="modal" data-bs-target="#editService"><i class="icon-pencil-alt"></i></a></li>

                                            <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>

                                        </ul>

                                    </td> -->

                                </tr>

                            </tbody>

                            <tfoot>

                                <tr>

                                    <th>Name</th>

                                    <th>Type</th>

                                    <th>Phone</th>

                                    <th>Age</th>

                                    <th>Contract(s)</th>

                                    <th>Status</th>

                                    <!-- <th>Action</th> -->

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