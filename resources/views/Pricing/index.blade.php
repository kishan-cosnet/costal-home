@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Pricing </h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Pricing</li>
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
<!--You can use .accordion-collapse with .show class then show accordions.-->
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <ul class="simple-wrapper nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link txt-primary active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false" tabindex="-1">Default</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link txt-primary" id="profile-tabs" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">03 Jan 2024</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link txt-primary" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">12 Dec 2024</a></li>
                    </ul>
                    <div class="tab-content  " id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body common-flex main-custom-form card-wrapper">
                                        <div class="input-group"><span class="input-group-text">Default Hourly Rate</span>
                                            <input class="form-control" type="text" aria-label="First name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion dark-accordion pb-3" id="simpleaccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Hourly Rates<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Hourly Rates</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Fixed Rates<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Fixed Rates</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Guaranteed Pay<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Guaranteed Pay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tabs">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body common-flex main-custom-form card-wrapper">
                                        <div class="input-group"><span class="input-group-text">Default Hourly Rate</span>
                                            <input class="form-control" type="text" aria-label="First name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion dark-accordion pb-3" id="simpleaccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Hourly Rates<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Hourly Rates</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Fixed Rates<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Fixed Rates</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Guaranteed Pay<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Guaranteed Pay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body common-flex main-custom-form card-wrapper">
                                        <div class="input-group"><span class="input-group-text">Default Hourly Rate</span>
                                            <input class="form-control" type="text" aria-label="First name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion dark-accordion pb-3" id="simpleaccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Hourly Rates<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Hourly Rates</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Fixed Rates<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Fixed Rates</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed bg-light-primary txt-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Guaranteed Pay<i class="svg-color" data-feather="chevron-down"></i></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#simpleaccordion">
                                        <div class="accordion-body">
                                            <p>Guaranteed Pay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection