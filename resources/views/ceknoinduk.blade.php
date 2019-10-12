<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="">
	<meta name="author" content="">
	<title>Informatika STKIP</title>
  <link href="/css/w3.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="/assetsAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/assetsAdmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="/assetsAdmin/css/sb-admin.css" rel="stylesheet">

</head>

<body style="background-image: url(assetsHome/images/images.jpg); background-size:cover;">
@include('include.pesan.gagal')
  @include('include.pesan.sukses')
<div style="background: rgba(0,0,0,.4);padding-top:10%;padding-bottom:23.7%;margin-top:-20px;">
 <div class="container">
  
  <div class="card card-register mx-auto mt-5 w3-animate-bottom">
   
    <div class="card-header w3-blue ">
      Register cek
    </div>
    <div class="card-body">
      <form action="{{url('/register')}}" method="post">{{csrf_field()}}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10">
              <input type="text" class="form-control" name="id" placeholder="Masukan no induk anda" required>
            </div>
            <div class="col-md-2">
              <input type="submit" class="btn btn-primary btn-block" name="cek" value="cek">
            </div>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="
            {{url('/login')}}">Login Page</a>
          </div>
        </div>
      </div>
    </div>
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="/assetsAdmin/vendor/jquery/jquery.min.js"></script>
    <script src="/assetsAdmin/vendor/popper/popper.min.js"></script>
    <script src="/assetsAdmin/vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

  </html>
