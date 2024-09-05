<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Crocs admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Crocs admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
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
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="{{ asset('images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('images/logo/logo.png') }}" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form method="POST" class="theme-form" action="{{ route('login.custom') }}">@csrf
                                <h3>Sign in to account</h3>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <p>Enter your email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" name="email" placeholder="Test@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>

                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" name="remember">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div><a class="link" href="forget-password.html">Forgot password?</a>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <!-- feather icon js-->
        <script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="{{ asset('js/config.js') }}"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="{{ asset('js/script.js') }}"></script>
        <!-- Plugin used-->
    </div>
</body>

</html>