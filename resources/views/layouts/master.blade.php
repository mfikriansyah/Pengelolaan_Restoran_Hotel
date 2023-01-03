<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css"/>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('layouts.settings-panel')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('layouts.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.js"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <script src="{{asset('js/alerts.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/dashboard.js')}}"></script>
  <script src="{{asset('js/Chart.roundedBarCharts.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- End custom js for this page-->
  <script>
    const Toast = Swal.mixin({
      toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
      })
      @if(Session::has('message'))
    var type = "{{Session::get('alert-type')}}";
    switch (type) {
      case 'info':
        Toast.fire({
          type: 'info',
                    icon: 'info',
                    title: "{{Session::get('message')}}"
                  })
            break;
            case 'success':
              Toast.fire({
                type: 'success',
                icon: 'success',
                title: "{{Session::get('message')}}"
              })
              break;
              case 'warning':
                Toast.fire({
                type: 'warning',
                icon: 'warning',
                title: "{{Session::get('message')}}"
            })
            break;  
            case 'error':
              Toast.fire({
                type: 'error',
                icon: 'error',
                title: "{{Session::get('message')}}"
              })
              break;
              case 'dialog_error':
                Swal.fire({
                type: 'error',
                icon: 'error',
                title: "Oppssss",
                text: "{{Session::get('message')}}",
                timer:3000
              })
            break;
    }
    @endif
    @if ($errors->any())
    @foreach($errors->all() as $error)
    Swal.fire({
        type: 'error',
        icon: 'error',
        title: "Oppsss",
        text: "{{ $error }}",
    });
    @endforeach
    @endif
    
    @if ($errors->any())
    Swal.fire({
      icon: 'error',
      title: "Oppsss",
      text: "Terjadi suatu kesalahan",
    })
    @endif
    $('#table-data').DataTable();
    let baseurl = "<?=url('/')?>";
    let fullURL = "<?=url()->full()?>";
    </script>
@stack('js')
</body>

</html>

