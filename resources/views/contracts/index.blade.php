@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Contracts </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Contracts</li>
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
                    <!-- <a class="btn btn-outline-primary" href="{{ route('contracts.create') }}" type="button">Add New Contract</a> -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Add New Contract
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display border" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Contract Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $contract)
                                <tr>
                                    <td>{{ $contract->contract_id }}</td>
                                    <td>{{ $contract->contract_name }}</td>
                                    <td><span class="badge rounded-pill {{ $contract->status ? 'badge-success' : 'badge-danger' }}">{{ $contract->status ? 'Active' : 'Inactive' }}</span></td>
                                    <td>
                                        <ul class="action">
                                            <!-- <li class="edit"> <a href="{{ route('contracts.edit', $contract->contract_id) }}"><i class="icon-pencil-alt"></i></a></li> -->
                                            <li class="edit"> <a href="" data-bs-toggle="modal" data-bs-target="#editModal"><i class="icon-pencil-alt"></i></a></li>

                                            <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            <!-- <li class="delete"><a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this contract?')) { document.getElementById('delete-contract-{{ $contract->contract_id }}').submit(); }"><i class="icon-trash"></i></a></li>
                                            <form id="delete-contract-{{ $contract->contract_id }}" action="{{ route('contracts.destroy', $contract->contract_id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form> -->
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

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add New Contract</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modalForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Contract Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Contract Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Description</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Description" required></textarea>
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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Edit Contract</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modalForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Contract Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Contract Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Description</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Description" required></textarea>
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