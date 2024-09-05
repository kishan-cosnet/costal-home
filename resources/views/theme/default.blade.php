<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Crocs admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">

    <meta name="keywords" content="admin template, Crocs admin template, dashboard template, flat admin template, responsive admin template, web app">

    <meta name="author" content="pixelstrap">

    <link rel="icon" href="{!! asset('images/favicon.png') !!}" type="image/x-icon">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <title>Crocs - Premium Admin Template</title>

    <!-- Google font-->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

    <!-- ico-font-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/icofont.css') }}">

    <!-- Themify icon-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/themify.css') }}">

    <!-- Flag icon-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/flag-icon.css') }}">

    <!-- Feather icon-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/feather-icon.css') }}">

    <!-- Plugins css start-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/scrollbar.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/calendar.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/date-picker.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/vector-map.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/fullcalender.css') }}">

    <!-- Plugins css Ends-->

    <!-- Bootstrap css-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/bootstrap.css') }}">



    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet">

    <!-- App css-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link id="color" rel="stylesheet" href="{{ asset('css/color-1.css') }}" media="screen">

    <!-- Responsive css-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">

    <!-- latest jquery-->

    <script src="{{ asset('js/jquery.min.js ') }}">

    </script>

</head>



<body onload="startTime()">

    <!-- loader starts-->

    <div class="loader-wrapper">

        <div class="loader">

            <div class="box"></div>

            <div class="box"></div>

            <div class="box"></div>

            <div class="box"></div>

            <div class="box"></div>

        </div>

    </div>

    <!-- loader ends-->

    <!-- tap on top starts-->

    <div class="tap-top"><i data-feather="chevrons-up"></i></div>

    <!-- tap on tap ends-->

    <!-- page-wrapper Start-->

    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        @include('theme.header')

        <!-- Page Body Start-->

        <div class="page-body-wrapper">

            @include('theme.sidebar')

            <div class="page-body">

                @yield('content')

            </div>

            <!-- footer start-->

            <footer class="footer">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-6 p-0 footer-copyright">

                            <p class="mb-0">Copyright 2024 © Costal Homes.</p>

                        </div>

                        <div class="col-md-6 p-0">

                            <p class="heart mb-0">Hand crafted &amp; made with

                                <svg class="footer-icon">

                                    <use href="{{ asset('svg/icon-sprite.svg#heart') }}"></use>

                                </svg>

                            </p>

                        </div>

                    </div>

                </div>

            </footer>

        </div>

    </div>



    <!-- Bootstrap js-->

    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>



    <!-- feather icon js-->

    <script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>

    <script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- scrollbar js-->

    <script src="{{ asset('js/scrollbar/simplebar.js') }}"></script>

    <script src="{{ asset('js/scrollbar/custom.js') }}"></script>

    <!-- Sidebar jquery-->

    <script src="{{ asset('js/config.js') }}"></script>

    <!-- Plugins JS start-->

    <script src="{{ asset('js/sidebar-menu.js') }}"></script>

    <script src="{{ asset('js/sidebar-pin.js') }}"></script>

    <!-- <script src="{{ asset('js/clock.js') }}"></script> -->

    <!-- <script src="{{ asset('js/calendar/fullcalendar.min.js') }}"></script>

    <script src="{{ asset('js/calendar/fullcalendar-custom.js') }}"></script>

    <script src="{{ asset('js/calendar/fullcalender.js') }}"></script> -->

    <!-- <script src="{{ asset('js/calendar/custom-calendar.js') }}"></script> -->

    <!-- <script src="{{ asset('js/chart/apex-chart/apex-chart.js') }}"></script> -->

    <script src="{{ asset('js/chart/apex-chart/stock-prices.js') }}"></script>

    <script src="{{ asset('js/chart/apex-chart/moment.min.js') }}"></script>

    <script src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>

    <script src="{{ asset('js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>

    <script src="{{ asset('js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>

    <script src="{{ asset('js/vector-map/map/jquery-jvectormap-us-aea-en.js') }}"></script>

    <script src="{{ asset('js/vector-map/map/jquery-jvectormap-uk-mill-en.js') }}"></script>

    <script src="{{ asset('js/vector-map/map/jquery-jvectormap-au-mill.js') }}"></script>

    <script src="{{ asset('js/vector-map/map/jquery-jvectormap-chicago-mill-en.js') }}"></script>

    <script src="{{ asset('js/vector-map/map/jquery-jvectormap-in-mill.js') }}"></script>

    <script src="{{ asset('js/vector-map/map/jquery-jvectormap-asia-mill.js') }}"></script>

    <!-- <script src="{{ asset('js/dashboard/default.js') }}"></script> -->

    <script src="{{ asset('js/notify/index.js') }}"></script>

    <script src="{{ asset('js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('js/datatable/datatables/datatable.custom.js') }}"></script>

    <script src="{{ asset('js/datatable/datatables/datatable.custom1.js') }}"></script>

    <script src="{{ asset('js/datepicker/date-picker/datepicker.js') }}"></script>

    <script src="{{ asset('js/datepicker/date-picker/datepicker.en.js') }}"></script>

    <script src="{{ asset('js/datepicker/date-picker/datepicker.custom.js') }}"></script>

    <script src="{{ asset('js/typeahead/handlebars.js') }}"></script>

    <script src="{{ asset('js/typeahead/typeahead.bundle.js') }}"></script>

    <script src="{{ asset('js/typeahead/typeahead.custom.js') }}"></script>

    <script src="{{ asset('js/typeahead-search/handlebars.js') }}"></script>

    <script src="{{ asset('js/typeahead-search/typeahead-custom.js') }}"></script>

    <script src="{{ asset('js/vector-map/map-vector.js') }}"></script>

    <!-- Plugins JS Ends-->

    <!-- Theme js-->

    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('js/theme-customizer/customizer.js') }}"></script>

    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/index.global.min.js'></script>

    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.15/index.global.min.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.14/index.global.min.js"></script>

    <!-- Plugin used-->

</body>



</html>