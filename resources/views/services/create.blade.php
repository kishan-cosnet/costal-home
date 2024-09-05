@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Add Service </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
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
        <div class="col-xl-6">
            <div class="card height-equal">
                <div class="card-body custom-input">
                    <form class="row g-3" action="{{ route('services.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="service_name">Service Name</label>
                            <input class="form-control" name="service_name" id="service_name" type="text" placeholder="Service Name" aria-label="First name" required="">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="service_description">Description</label>
                            <textarea class="form-control" name="service_description" id="service_description" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="service_status">Status</label>
                            <select class="form-select" name="service_status" id="service_status" required="">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection