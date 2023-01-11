<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.css"/>
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
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.js"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/dashboard.js')}}"></script>
  <script src="{{asset('js/Chart.roundedBarCharts.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('js/alerts.js')}}"></script>
  <script src="{{asset('js/ajax.js')}}"></script>
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
                icon: 'info',
                title: "{{Session::get('message')}}"
                  })
            break;
            case 'success':
              Toast.fire({
                icon: 'success',
                title: "{{Session::get('message')}}"
              })
              break;
              case 'warning':
                Toast.fire({
                icon: 'warning',
                title: "{{Session::get('message')}}"
            })
            break;  
            case 'error':
              Toast.fire({
                icon: 'error',
                title: "{{Session::get('message')}}"
              })
              break;
    }
    @endif
    @if ($errors->any())
    @foreach($errors->all() as $error)
    Swal.fire({
        icon: 'error',
        title: "Oppsss",
        text: "{{ $error }}",
    });
    @endforeach
    @endif
    let baseurl = "<?=url('/')?>";
    let fullURL = "<?=url()->full()?>";
    </script>
    @stack('js')
    <script>
      $(function(){
        var table = $("#table-data").DataTable();
        $(document).on("submit", "form", function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr("action"),
                    type: $(this).attr("method"),
                    dataType: "JSON",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                        if ($.isEmptyObject(response.error)) {
                            toast('success', response.success);
                            $(".myForm")[0].reset();
                            $(".myModal").modal("hide");
                            table.ajax.reload(null, false);
                        } else {
                            toast('errors', response.error)
                            // printErrorMsg(response.error);
                        }

                    }
                });

            });
            // function printErrorMsg (msg) {
            //     $(".print-error-msg").find("ul").html('');
            //     $(".print-error-msg").css('display','block');
            //     $.each( msg, function( key, value ) {
            //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //     });
            // }
      $(document).on("click", ".btn-hapus", function (e) {
                e.preventDefault();
                Swal.fire({
                icon: 'warning',
                html: 'Anda Akan Menghapus Data<br><strong>' + $(this).attr("id") + '</strong> ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                  if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                    url: $(this).attr("href"),
                    type: "delete",
                    dataType: "JSON",
                    data: {
                            _token: CSRF_TOKEN
                        },
                    success: function (response) {
                        if ($.isEmptyObject(response.error)) {
                            toast('success', response.success);
                            table.ajax.reload(null, false);
                        } else {
                            toast('errors', response.error)
                            // printErrorMsg(response.error);
                        }
                    }
                });
                  }
              });

            });
      });
    </script>
</body>

</html>

