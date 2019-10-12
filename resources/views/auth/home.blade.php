<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">
  <meta name="author" content="">
  <title>Halaman Home</title>

  <!-- Bootstrap core CSS -->
  <link href="/assetsAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="/css/w3.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/assetsAdmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="/assetsAdmin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/assetsAdmin/css/sb-admin.css" rel="stylesheet">

  <script type="text/javascript" src="/assetsAdmin/ckeditor/ckeditor.js"></script>
<style type="text/css">
  .atas{
    background:#09192A;
  }
</style>
</head>

<body class="fixed-nav sticky-footer bg-info" id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark atas fixed-top" id="mainNav">
    <a class="navbar-brand" href="#" id="typed"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      @include('auth.include.menukiri')
      @include('auth.include.menuatas')
    </div>
  </nav>

  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      @yield('main')
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->

  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright &copy; 2018 Herisvan Hendra</small>
      </div>
    </div>
  </footer>

  <!-- Scroll to Top Button -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Logout Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>
@include('auth.section.modal.modalcari')
@include('auth.section.modal.modalcariuser')
  <!-- Bootstrap core JavaScript -->
  <script src="/assetsAdmin/vendor/jquery/jquery.min.js"></script>
  <script src="/assetsAdmin/vendor/popper/popper.min.js"></script>
  <script src="/assetsAdmin/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/assetsAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/assetsAdmin/vendor/chart.js/Chart.min.js"></script>
  <script src="/assetsAdmin/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/assetsAdmin/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/assetsAdmin/js/sb-admin.min.js"></script>
  <script src="/js/typed.min.js"></script>
  <script>
    function newTyped(){}$(function(){$("#typed").typed({
    // Change to edit type effect
    strings: ["SELAMAT DATANG ", "DI E-LEARNING","PENDIDIKAN INFORMATIKA", "STKIP PGRI SUMATERA BARAT"],

    typeSpeed:200,backDelay:700,contentType:"html",loop:!0,resetCallback:function(){newTyped()}}),$(".reset").click(function(){$("#typed").typed("reset")})});
  </script>
</body>

</html>
