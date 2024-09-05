@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3> Dashboard </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
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
<div class="container-fluid default-dashboard ecommerce-dashboard">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card notifications-tabs">
                <div class="card-header pb-0">
                    <div class="header-top">
                        <h4>Announcements</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content content-tab" id="bottom-tabContent3">
                        <div class="tab-pane fade show active" id="bottom-inbox" role="tabpanel" aria-labelledby="bottom-tabContent3">
                            <div class="d-flex align-items-center"><img src="{{ asset('images/dashboard/user/5.png') }}" alt="">
                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                        <h5>
                                            Ralph Edwards Started Following you.</h5><span>35 min Ago</span>
                                    </a></div>
                                <!-- <div class="flex-shrink-0">
                                    <div class="activity-dot-primary"></div>
                                </div> -->
                            </div>
                            <div class="d-flex align-items-center"><img src="{{ asset('images/dashboard/user/6.png') }}" alt="">
                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                        <h5>
                                            Jenny Wilson Requested to Follow</h5><span>1w Ago</span>
                                    </a></div>
                            </div>
                            <div class="d-flex align-items-center"><img src="{{ asset('images/dashboard/user/7.png') }}" alt="">
                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                        <h5>Jenny Wilson Started Following you.</h5><span>3.10pm</span>
                                    </a></div>
                                <!-- <div class="flex-shrink-0">
                                    <div class="activity-dot-primary"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 proorder-xl-1">
            <div class="card">
                <div class="card-header pb-2">
                    <div class="header-top">
                        <h5>Workers/Carers on leave today</h5>
                    </div>
                </div>
                <div class="card-body pt-0 upcoming">
                    <div class="table-responsive custom-scrollbar">
                        <div id="upcoming-deadlines_wrapper" class="dataTables_wrapper no-footer">
                            <div id="upcoming-deadlines_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="upcoming-deadlines"></label></div>
                            <table class="table display dataTable no-footer" id="upcoming-deadlines" style="width:100%" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Employee: activate to sort column descending">Carer Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-label="Task: activate to sort column ascending">Carer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-label="Deadline: activate to sort column ascending">Leave date</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-label="Progress: activate to sort column ascending">Leave type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>1</td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/31.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Joohe</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td>26 Dec</td>
                                        <td>Half Day</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>2</td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/30.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Junsung</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td>3 Oct</td>
                                        <td>Full Day</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>3</td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/29.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Kyuwon</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td>10 Aug</td>
                                        <td>Full Day</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>4</td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/32.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Wonkyu</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td>10 Jun</td>
                                        <td>Half Day</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-12 col-lg-12 box-col-12">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="card total-sales">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 xl-12 col-md-12 col-sm-12 col box-col-12">
                                    <div class="d-flex align-items-center"> <span>
                                            <svg>
                                                <use href="{{ asset('svg/icon-sprite.svg#Revenue') }}"></use>
                                            </svg></span>
                                        <div class="flex-shrink-0">
                                            <h4>73</h4>
                                            <h6>Total Completed <br>Bookings Today </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="card total-sales">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 xl-12 col-md-12 col-sm-12 col box-col-12">
                                    <div class="d-flex up-sales align-items-center"><span>
                                            <svg>
                                                <use href="{{ asset('svg/icon-sprite.svg#Sales') }}"></use>
                                            </svg></span>
                                        <div class="flex-shrink-0">
                                            <h4>24</h4>
                                            <h6>Total Uncompleted <br>Bookings</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="card total-sales">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-8 xl-12 col-md-8 col-sm-12 col box-col-12">
                                    <div class="d-flex total-customer align-items-center"><span>
                                            <svg>
                                                <use href="{{ asset('svg/icon-sprite.svg#Customer') }}"></use>
                                            </svg></span>
                                        <div class="flex-shrink-0">
                                            <h4>62,828</h4>
                                            <h6>Total Clients</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="card total-sales">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-8 xl-12 col-md-8 col-sm-12 col box-col-12">
                                    <div class="d-flex total-product align-items-center"><span>
                                            <svg>
                                                <use href="{{ asset('svg/icon-sprite.svg#Customer') }}"></use>
                                            </svg></span>
                                        <div class="flex-shrink-0">
                                            <h4>729</h4>
                                            <h6>Total Carers</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 proorder-xl-1">
            <div class="card">
                <div class="card-header pb-2">
                    <div class="header-top">
                        <h5>Birthdays</h5>
                    </div>
                </div>
                <div class="card-body pt-0 upcoming">
                    <div class="table-responsive custom-scrollbar">
                        <div id="upcoming-deadlines_wrapper" class="dataTables_wrapper no-footer">
                            <!-- <div id="upcoming-deadlines_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="upcoming-deadlines"></label></div> -->
                            <table class="table display dataTable no-footer" id="upcoming-deadlines" style="width:100%" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Employee: activate to sort column descending">User Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-label="Task: activate to sort column ascending">User Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-label="Deadline: activate to sort column ascending">User Role</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-label="Progress: activate to sort column ascending">Birth Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>1</td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/31.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Joohe</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td>Cared</td>
                                        <td>26 Aug 2024</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>2</td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/30.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Junsung</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td>Client</td>
                                        <td>3 Oct 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 proorder-xl-1">
            <div class="card">
                <div class="card-header pb-2">
                    <div class="header-top">
                        <h5>Recent Alerts</h5>
                    </div>
                </div>
                <div class="card-body pt-0 upcoming">
                    <div class="table-responsive custom-scrollbar">
                        <div id="upcoming-deadlines_wrapper" class="dataTables_wrapper no-footer">
                            <!-- <div id="upcoming-deadlines_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="upcoming-deadlines"></label></div> -->
                            <table class="table display dataTable no-footer" id="upcoming-deadlines" style="width:100%" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1" aria-sort="ascending">Carer Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1">Type of Alert</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1">Booking type</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1">Date </th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1">Client</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1">Timestamp</th>
                                        <th class="sorting" tabindex="0" aria-controls="upcoming-deadlines" rowspan="1" colspan="1">Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>1</td>
                                        <td> <span class="badge rounded-pill badge-danger">Missed</span></td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/31.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Joohe</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>26 Dec</td>
                                        <td>Joohe</td>
                                        <td>IST</td>
                                        <td><span class="badge rounded-pill badge-light-primary">Not Acknowledged</span></td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>2</td>
                                        <td> <span class="badge rounded-pill badge-danger">Missed</span></td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/30.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Junsung</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>3 Oct</td>
                                        <td>Junsung</td>
                                        <td>IST</td>
                                        <td><span class="badge rounded-pill badge-light-success">Acknowledged</span></td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>3</td>
                                        <td> <span class="badge rounded-pill badge-warning">Late</span></td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/29.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Kyuwon</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>10 Aug</td>
                                        <td>Kyuwon</td>
                                        <td>IST</td>
                                        <td><span class="badge rounded-pill badge-light-primary">Not Acknowledged</span></td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>4</td>
                                        <td> <span class="badge rounded-pill badge-danger">Missed</span></td>
                                        <td class="sorting_1">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-3/user/32.png" alt=""></div>
                                                <div class="flex-grow-1 ms-2"><a href="user-profile.html">
                                                        <h6>Wonkyu</h6>
                                                    </a></div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>10 Jun</td>
                                        <td>Wonkyu</td>
                                        <td>IST</td>
                                        <td><span class="badge rounded-pill badge-light-success">Acknowledged</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid Ends-->

@endsection