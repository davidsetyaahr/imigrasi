<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
      @php 
      $pageSegment = Request::segment(1);
      @endphp
      {!!ucwords( str_replace("-"," ",$pageSegment) )!!} | PAPALASAK
    </title>
    {{-- favicon --}}
    <link href="{{ asset('frontend/img/logo-imigrasi.png') }}" rel="icon">
    <link href="{{ asset('frontend/img/logo-imigrasi.png') }}" rel="apple-touch-icon">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/vendor/select2-develop/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css') }}" rel="stylesheet" />
    <link href="{{asset('backend/vendor/sweetalert-master/dist/sweetalert.css')}}" rel="stylesheet" />

    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/vendor/ckeditor/ckeditor.js') }}"></script>
  </head>

  <body id="page-top">
    <div class="loading">
      <div class="info">
        <img src="{{asset('backend/img/loading.gif')}}" alt="">
        <p>Loading...</p>
      </div>
  </div>

    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div class="left-sidebar">
        <ul
          class="navbar-nav sidebar sidebar-dark accordion"
          id="accordionSidebar"
        >
          <!-- Sidebar - Brand -->
          <a
            class="sidebar-brand d-flex align-items-center justify-content-center"
            href="{{ url('/home') }}"
          >
          <img src="{{asset('frontend/img/logo-imigrasi.png')}}" alt="" srcset="" width="50">
          &nbsp; <span>PAPALASAK</span>
          </a>

          <!-- Nav Item - Dashboard -->
          <li class="nav-item {{Request::segment(1) == 'home' ? 'active' : ''}}">
            <a class="nav-link" href="{{url('home')}}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a
            >
          </li>
          <li class="nav-item {{Request::segment(1) == 'jadwal' ? 'active' : ''}}">
            <a class="nav-link" href="{{url('jadwal')}}">
              <i class="fas fa-fw fa-calendar"></i>
              <span>Jadwal Pemeriksaan</span></a
            >
          </li>
          <li class="nav-item {{Request::segment(1) == 'pengajuan' ? 'active' : ''}}">
            <a
              class="nav-link {{Request::segment(1) == 'pengajuan' ? '' : 'collapsed'}}"
              href="#"
              data-toggle="collapse"
              data-target="#pengajuan"
              aria-expanded="true"
              aria-controls="pengajuan"
            >
            <i class="fas fa-fw fa-passport"></i>
              <span>Pengajuan Masuk</span>
            </a>
            <div
              id="pengajuan"
              class="collapse {{Request::segment(1) == 'pengajuan' ? 'show' : ''}}"
              aria-labelledby="headingTwo"
              data-parent="#accordionSidebar"
            >
              <div class="py-2 collapse-inner rounded">
                <a class="nav-link" href="{{url('pengajuan_passport_rusak')}}">
                  <span>Paspor Rusak</span>
                </a>
                <a class="nav-link" href="{{url('pengajuan_passport_hilang')}}">
                  <span>Paspor Hilang</span>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item {{Request::segment(1) == 'rekap' ? 'active' : ''}}">
            <a class="nav-link" href="{{url('home')}}">
              <i class="fas fa-fw fa-book-reader"></i>
              <span>Rekap</span></a
            >
          </li>
          <li class="nav-item {{Request::segment(1) == 'arsip' ? 'active' : ''}}">
            <a class="nav-link" href="{{url('home')}}">
              <i class="fas fa-fw fa-file-archive"></i>
              <span>Arsip Pemeriksaan</span></a
            >
          </li>
          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
        </ul>
      </div>
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

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            
            <ul class="navbar-nav ml-auto">
              {{-- <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-notif-top fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter badge-notif">
                    
                    </span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Notification
                    </h6>
                    <div class="dropdown-notif"></div>
                </div>
            </li> --}}

            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <span class="my-auto">{{ Auth::user()->name }}</span>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{\Auth::user()->nama}}</span>
                <i class="fa fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                {{-- <a class="dropdown-item" href="{{ route('user.ganti-password')}}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ganti Password
                </a> --}}
                {{-- <div class="dropdown-divider"></div> --}}
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid common-container">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="h4 mb-0 solid-color font-weight-bold infopage">
                  <?php 
                    $pageSegment = !empty(Request::segment(2)) ? Request::segment(2) : 'Dashboard';
                  ?>
                  {{ ucwords( str_replace("-"," ",$pageSegment) ) }}
            </div>
            <div class="float-right info-text-page">
              <a href="#"> 
                {{ucwords( str_replace("-"," ",$pageSegment) )}}
              </a>
              /
              @if (!empty($pageInfo))
                <a href="#"> {{$pageInfo}}</a>
              @else
                <a href="#"> Dashboard</a>
              @endif
            </div>
          </div>
          <div class="row pb-5">
            <div class="col-md-12">
            @yield('container')
              </div>
          </div>
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright 2020 - <a href="https://limadigital.id" target="_blank">LIMA Digital</a></span>
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
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/select2-develop/dist/js/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script> --}}
    <script src="{{ asset('backend/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{asset('backend/vendor/sweetalert-master/dist/sweetalert-dev.js')}}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    {{-- <script>
      const tel = document.getElementById('kode_rekening');

      tel.addEventListener('input', function() {
        let start = this.selectionStart;
        let end = this.selectionEnd;
        
        const current = this.value
        const corrected = current.replace(/([^+0-9.]+)/gi, '');
        this.value = corrected;
        
        if (corrected.length < current.length) --end;
        this.setSelectionRange(start, end);
      });
    </script> --}}
    <script>
/*       $(document).ready(function(){
        $.ajax({
            type : "get",
            url : "<?= url('dashboard/cekNotif') ?>",
            success : function(data){
              if(data!=0){
                console.log('cekNotif');
                $(".badge-notif").html(data)
              }
            }
          })
          setInterval(() => {
          $.ajax({
            type : "get",
            url : "<?= url('dashboard/cekNotif') ?>",
            success : function(data){
              if(data!=0){
                console.log('cekNotif');
                $(".badge-notif").html(data)
              }
            }
          })
        }, 3000);
        $(".fa-notif-top").click(function(){
          $.ajax({
            type : "get",
            url : "<?= url('dashboard/cekDetailNotif') ?>",
            success : function(data){
                $(".dropdown-notif").html(data)
            }
          })
        })
      })

 */
      const tel = document.getElementById('kode_rekening');
      if(tel!=null){
        tel.addEventListener('input', function() {
          let start = this.selectionStart;
          let end = this.selectionEnd;
          
          const current = this.value
          const corrected = current.replace(/([^+0-9.]+)/gi, '');
          this.value = corrected;
          
          if (corrected.length < current.length) --end;
          this.setSelectionRange(start, end);
        });
      }
    </script>
  </body>
</html>
