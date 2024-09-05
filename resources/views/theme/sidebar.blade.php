<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-layout="fill-svg">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('images/logo/logo.png') }}" alt=""></a>
            <div class="toggle-sidebar">
                <svg class="sidebar-toggle">
                    <use href="{{ asset('svg/icon-sprite.svg#toggle-icon') }}"></use>
                </svg>
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>
                    <!-- <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                        </div>
                    </li> -->
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Dashboard</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('announcements') }}">Announcements</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-faq') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-faq') }}"></use>
                            </svg><span>Alerts</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('late-arrivals') }}">Late Arrivals</a></li>
                            <li><a href="{{ route('missed-tasks') }}">Missed tasks</a></li>
                            <li><a href="{{ route('missed-booking') }}">Missed Bookings</a></li>
                            <li><a href="{{ route('missed-medications') }}">Missed Medications</a></li>
                            <li><a href="{{ route('note-reviews') }}">Note Reviews</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('concerns') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-layout') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-layout') }}"></use>
                            </svg><span>Concerns</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-to-do') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-to-do') }}"></use>
                            </svg><span>Incidents</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-calender') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-calender') }}"></use>
                            </svg><span>Calendar/Roaster</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('calendar-booking') }}">Bookings</a></li>
                            <li><a href="{{ route('shifts.index') }}">Shifts</a></li>
                            <li><a href="{{ route('publishing.index') }}">Publishing</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('reconciliation.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-table') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-table') }}"></use>
                            </svg><span>Reconciliation</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('account.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-to-do') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-to-do') }}"></use>
                            </svg><span>Accounts</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('carers.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-learning') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-learning') }}"></use>
                            </svg><span>Carers </span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg><span>Clients</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('clients.index') }}">Clients</a></li>
                            <li><a href="#">Service Contract Types</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('teams.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg><span>Teams</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('people.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg><span>People</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('reports.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-charts') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-charts') }}"></use>
                            </svg><span>Reports</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-icons') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-icons') }}"></use>
                            </svg><span>Finance</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Invoices</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('leave-requests')}}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-to-do') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-to-do') }}"></use>
                            </svg><span>Leave Requests</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('svg/icon-sprite.svg#fill-knowledgebase') }}"></use>
                            </svg><span>Settings</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('services.index') }}">Services</a></li>
                            <li><a href="{{ route('pricing.index') }}">Pricing</a></li>
                            <li><a href="{{ route('leave-types.index') }}">Leave Types</a></li>
                            <li><a href="{{ route('contracts.index') }}">Contract Types</a></li>
                            <li><a href="{{ route('contract-finish-reasons.index') }}">Contract Finish reasons</a></li>
                            <li><a href="{{ route('booking-types') }}">Booking Types</a></li>
                            <li><a href="{{ route('booking-cancellation-types.index') }}">Booking Cancellation Types</a></li>
                            <li><a href="#">Visit expectation reasons</a></li>
                            <li><a href="#">Client Types</a></li>
                            <li><a href="#">Special day</a></li>
                            <li><a href="{{ route('holidays.index') }}">Public Holidays</a></li>
                            <li><a href="#">Time of the day</a></li>
                            <li><a href="#">Task completion statuses</a></li>
                            <li><a href="#">Diseases list</a></li>
                            <li><a href="#">Carer Review types</a></li>
                            <li><a href="{{ route('client-review-types.index') }}">Client Review types</a></li>
                            <li><a href="#">Ethnicity</a></li>
                            <li><a href="#">User Roles</a></li>
                            <li><a href="#">User Permissions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->