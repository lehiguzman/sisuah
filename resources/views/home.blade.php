<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SISUAH - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json">

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
          &nbsp;
      <!-- Sidebar - Brand -->
      <a class="d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
        <div class="sidebar-brand-text mx-3"><img src="{{ asset('img/logo-uah.jpg')}}"></div>
      </a>
          &nbsp;
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link text-center" href="{{ url('/home') }}">
          <i class="fas fa-fw fa-tablet"></i>
          <span>Menu</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      @if(Auth::user()->tipo == '1')
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span><b>Administración</b></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-black py-2 collapse-inner rounded">            
            <a class="collapse-item text-blue" href="{{ url('/users') }}"><i class="fa fa-user-tag"><b> Usuarios</b></i></a>            
            
            <a class="collapse-item text-blue" href="{{ url('/periods') }}"><i class="fas fa-bell"></i><b> Periodos Académicos</b></i></a>            
                  
            <a class="collapse-item text-blue" href="{{ url('/research_lines') }}"><i class="fas fa-clipboard-list"></i><b> Lineas de Investigación</b></i></a>
                 
            <a class="collapse-item text-blue" href="{{ url('/subjects') }}"><i class="fas fa-book-open"></i><b> Materias</b></i></a>
                  
            <a class="collapse-item text-blue" href="{{ url('/sections') }}"><i class="fas fa-cheese"></i><b> Secciones</b></i></a>
          </div>
        </div>        
      </li>
      @endif

      @if(Auth::user()->tipo == '4' or Auth::user()->tipo == '1')
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-pencil-alt"></i>
          <span><b>Estudiantes</b></span>
        </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-black py-2 collapse-inner rounded">            
            <a class="collapse-item text-blue" href="{{ url('/users') }}"><i class="fas fa-edit"></i><b> Datos personales</b></a>
            <a class="collapse-item text-blue" href="{{ url('/proposals') }}"><i class="fas fa-edit"></i><b> Propuesta de tesis</b></a>
          </div>
        </div> 
      </li>
      @endif
      <!-- Divider 
      <hr class="sidebar-divider">

           Heading 
      <div class="sidebar-heading">
        Addons
      </div> -->
      @if(Auth::user()->tipo == '3' or Auth::user()->tipo == '1')
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProf" aria-expanded="true" aria-controls="collapseProf">
          <i class="fas fa-fw fa-folder"></i>
          <span>Profesores</span>
        </a>
        <div id="collapseProf" class="collapse" aria-labelledby="headingProf" data-parent="#accordionSidebar">
          <div class="bg-black py-2 collapse-inner rounded">            
            <a class="collapse-item text-blue" href="{{ url('/users') }}"><i class="fas fa-edit"></i><b> Datos personales</b></a>
            <a class="collapse-item text-blue" href="{{ url('/evaluations') }}"><i class="fas fa-edit"></i><b> Evaluaciones</b></a>
          </div>
        </div>
      </li>  
      @endif

      @if(Auth::user()->tipo == '2' or Auth::user()->tipo == '1')
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDir" aria-expanded="true" aria-controls="collapseDir">
          <i class="fas fa-fw fa-folder"></i>
          <span>Dirección Academica</span>
        </a>
        <div id="collapseDir" class="collapse" aria-labelledby="headingDir" data-parent="#accordionSidebar">
          <div class="bg-black py-2 collapse-inner rounded">            
            <a class="collapse-item text-blue" href="{{ url('/evaluators') }}"><i class="fas fa-edit"></i><b> Asignar Evaluadores</b></a>         
            <a class="collapse-item text-blue" href="{{ url('/evaluations') }}"><i class="fas fa-edit"></i><b> Evaluaciones</b></a>         
          </div>
        </div>
      </li>      
      @endif
      <!-- Nav Item - Tables -->
   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
          <i class="fas fa-fw fa-table"></i>
          <span>Reportes</span>
        </a>
        <!-- <div id="collapseReports" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>            
          </div>
        </div> -->
      </li>      

      <!-- Nav Item - Charts -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCharts" aria-expanded="true" aria-controls="collapseCharts">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Estadisticas</span>
        </a>
        <!-- <div id="collapseCharts" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>            
          </div>
        </div> -->
      </li>      

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
        <nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">                       

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white small">USUARIO</span>
                <!-- <img class="img-profile rounded-circle" src="#"> -->
                     <i class="fas fa-user-tag" style="font-size: 32px; color: skyblue;"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> 
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-500" style="font-size: 18px;"> Salir</i>
                  
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        

              @yield('contenido')           

           
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-secondary">
        <div class="container my-auto text-center text-white">
          <div class="copyright my-auto">
            <span">Derechos de autor &copy; Universidad Alejandro de Humboldt 2019</span>
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
          <h5 class="modal-title" id="exampleModalLabel">¿Seguro de salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccioné "Salir" si esta seguro de terminar la sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}" ></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('datatables/jquery.dataTables.min.js') }} "></script>
  <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>


