@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Edit Contracts </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Contracts</a></li>
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
                    <form class="row g-3" action="{{ route('contracts.update', $contract->contract_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label" for="contract_name">Contract Name</label>
                            <input class="form-control" name="contract_name" value="{{ $contract->contract_name }}" id="contract_name" type="text" placeholder="Contract Name" aria-label="First name" required="">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $contract->description }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" name="status" id="status" required="">
                                <option value="1" {{ $contract->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$contract->status ? 'selected' : '' }}>Inactive</option>
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