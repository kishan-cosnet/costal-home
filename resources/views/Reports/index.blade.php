@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Reports </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Reports</li>
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
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <div class="card height-equal">
                            <!-- <div class="card-header pb-0">
                                <h4>Browser defaults</h4>
                            </div> -->
                            <div class="card-body custom-input">
                                <form class="row g-3">
                                    <div class="col-12">
                                        <span>Select which type of report you'd like to run</span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="types">Type</label>
                                        <select class="form-select" id="types" required="">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            <option> Attendance </option>
                                            <option> Bookings </option>
                                            <option> Carers </option>
                                            <option> Clients </option>
                                            <option> Carer Availability </option>
                                            <option> Carer Utilisation </option>
                                            <option> Carer Reviews </option>
                                            <option> Carer Timesheets </option>
                                            <option> Carer Vaccinations </option>
                                            <option> Client Reviews </option>
                                            <option> Client Suspensions </option>
                                            <option> Client Suspended Visits </option>
                                            <option> Shifts </option>
                                            <option> Client Vaccinations </option>
                                            <option> Contingency </option>
                                            <option> Continuity </option>
                                            <option> Contract Expirations </option>
                                            <option> Leave </option>
                                            <option> Mileage </option>
                                            <option> Task Completions </option>
                                            <option> Visits </option>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="col-xxl-3 box-col-12 text-start"> Choose a timeframe for the report</label>
                                        <input class="form-control flatpickr-input" id="range-date" type="text" readonly="readonly">
                                    </div>
                                    <div class="col-12">
                                        <label class="col-sm-12 col-form-label">Pick which teams to report on</label>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="validationDefault04">Team</label>
                                        <select class="form-select" id="validationDefault04" required="">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            <option>U.K </option>
                                            <option>Thailand</option>
                                            <option>India </option>
                                            <option>U.S</option>
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
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <div class="card height-equal">
                            <div class="card-header pb-0">
                                <h4><i class="fa fa-navicon"></i> Quick reports</h4>
                            </div>
                            <div class="card-body" style="max-height:500px;overflow: auto;">
                                <ul class="list-group list-group-flush">
                                    <span>Carer Requirements</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Expiring requirements this month</li>
                                    <span class="pt-4">Carer Reviews</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Carer reviews this month</li>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Overdue carer reviews</li>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Carer reviews this month</li>
                                    <span class="pt-4">Contract Expirations</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Expiring carer contracts (this month)</li>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Expiring client service contracts (this month) </li>
                                    <span class="pt-4">Client Reviews</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Client reviews this month</li>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Overdue client reviews</li>
                                    <span class="pt-4">Client Suspensions</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Client suspensions this week</li>
                                    <span class="pt-4">Contingency</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Contingency plan for today</li>
                                    <span class="pt-4">Visits</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Visits so far this week</li>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Visits cancelled week</li>
                                    <span class="pt-4">Hours</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Clients hours this week</li>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Carers hours this week</li>
                                    <span class="pt-4">Leave</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Leave this week</li>
                                    <span class="pt-4">Punctuality</span>
                                    <li class="list-group-item"><i class="icofont icofont-arrow-right"> </i>Carer punctuality this month</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection