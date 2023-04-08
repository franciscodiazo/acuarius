<!DOCTYPE html>
<html lang="en">
 <head>
   @include('layouts.head')
 </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @include('layouts.nav')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('img/AdminLTELogo.png') }}" alt="Acuarius" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Acuarius   </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @include('layouts.userpanel')
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        @include('layouts.search')
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @include('layouts.nav2')
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<section class="content">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->   

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">

                </h3>

                <div class="card-tools">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                </div>
              </div>
              <div class="card-body">
                 @yield('content')

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                @include('layouts.footer')
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>            


</section>

    </div>
<!-- ./wrapper -->
    @include('layouts.footer-scripts')
</body>
</html>


