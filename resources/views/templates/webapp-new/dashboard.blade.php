<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  @yield('css')

  <!-- Custom fonts for this template-->
  <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"><link href="{{ asset('index/assets/img/favicon.ico') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- Custom styles for this template-->
  <link href="{{ asset('dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/arsha/assets/img/favicon.ico') }}" rel="icon">
  <link href="{{ asset('/arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <style>
    .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited .text-primary{
        background-color: #8629f8 !important;
    }
  </style>

</head>

<body>
  @include('templates.webapp.header')
  @include('templates.website.messenger-chatbot')
  @include('templates.webapp.notifications')
  <div class="col-md-6 mx-auto">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-lg my-3 rounded">
            <div class="card-body">
                <div class="p-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
  </div>
  <hr>
  @include('templates.webapp.footer')
  @include('templates.webapp-new.logout')
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>
 
<script>
  @yield('js')
</script>

<script
src="https://www.paypal.com/sdk/js?client-id=SB_CLIENT_ID&vault=true">
</script>
</body>

</html>



