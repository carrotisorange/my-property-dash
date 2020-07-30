<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ $investor->unit_owner }}</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  
    <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      
      <div class="sidebar-brand-text mx-5"> </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0"> --}}

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="/">
         <i class="fas fa-home"></i> 
        <span>The Property Manager</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- <!-- Heading -->
     <div class="sidebar-heading">
      Interface
    </div>  --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' )
    <li class="nav-item">
      <a class="nav-link" href="/home">
        <i class="fas fa-home"></i>
        <span>Home</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/tenants">
        <i class="fas fa-users fa-chart-area"></i>
        <span>Tenants</span></a>
    </li>

   @if(Auth::user()->property_ownership === 'Multiple Owners')
  <!-- Nav Item - Tables -->
  <li class="nav-item active">
      <a class="nav-link" href="/owners">
      <i class="fas fa-user-tie"></i>
      <span>Owners</span></a>
  </li>
   @endif

      <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/concerns">
          <i class="fas fa-tools fa-table"></i>
          <span>Concerns</span></a>
      </li>

      
              <!-- Nav Item - Tables -->
              <li class="nav-item">
            <a class="nav-link" href="/personnels">
            <i class="fas fa-user-cog"></i>
                <span>Personnels</span></a>
        </li>
    @endif

     @if(Auth::user()->user_type === 'billing' || Auth::user()->user_type === 'manager')
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/bills">
          <i class="fas fa-file-invoice-dollar fa-table"></i>
          <span>Bills</span></a>
      </li>
     @endif

     @if(Auth::user()->user_type === 'treasury' || Auth::user()->user_type === 'manager')
        <li class="nav-item">
        <a class="nav-link" href="/collections">
          <i class="fas fa-file-invoice-dollar"></i>
          <span>Collections</span></a>
      </li>

      @endif

    @if(Auth::user()->user_type === 'manager')
     <!-- Nav Item - Tables -->
     <li class="nav-item">
      <a class="nav-link" href="/users">
        <i class="fas fa-users-secret fa-table"></i>
        <span>Users</span></a>
    </li>
    @endif
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          {{ Auth::user()->property }}
          <!-- Topbar Search -->
          {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> --}}

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

        
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <i class="fas fa-users-circle"></i> 
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">
                  <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                {{-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> --}}
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Owners</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#editTenant" data-whatever="@mdo"><i class="fas fa-edit fa-sm text-white-50"></i>Edit</button>  
          </div>
        <!-- 404 Error Text -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <tr>
                   <th>Owner</th>
                   <td>{{ $investor->unit_owner }}</td>
               </tr>
               <tr>
                <th>Email</th>
                <td>{{ $investor->investor_email_address }}</td>
            </tr>
             <tr>
                <th>Mobile</th>
                <td>{{ $investor->investor_contact_no }}</td>
            </tr>
            <tr>
              <th>Representative</th>
              <td>{{ $investor->investor_contact_no }}</td>
          </tr>
          <tr>
            <th>Address</th>
            <td>{{ $investor->investor_address }}</td>
          </tr>
            <tr>
              <th>Bank Name</th>
              <td>{{ $investor->investor_contact_no }}</td>
          </tr>
          <tr>
            <th>Account Name</th>
            <td>{{ $investor->account_name }}</td>
        </tr>
        <tr>
          <th>Account Number</th>
          <td>{{ $investor->account_number }}</td>
        </tr>
       
        <tr>
          <th>Contract Period</th>
          <td>{{ Carbon\Carbon::parse($investor->contract_start)->format('M d Y').' - '.Carbon\Carbon::parse($investor->contract_end)->format('M d Y') }}</td>
        </tr>
            </table>
        </div>
        </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Godie Enterprises 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/dashboard/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('/dashboard/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('/dashboard/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('/dashboard/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('/dashboard/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
