<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="">
	<meta name="author" content="">
	<title>Informatika STKIP</title>

	<!-- Bootstrap core CSS -->
	<link href="/assetsAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="/assetsAdmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="/assetsAdmin/css/sb-admin.css" rel="stylesheet">
  <link href="/assetsAdmin/plugin/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <script src="/assetsAdmin/vendor/jquery/jquery.min.js"></script>
<link href="/css/w3.css" rel="stylesheet">
</head>

<body style="background-image: url(assetsHome/images/images.jpg); background-size:cover;">
<div style="background: rgba(0,0,0,.4);padding-top:3%;padding-bottom:17%;margin-top:-20px;">
   <div class="container">

      <div class="card card-register mx-auto mt-3 w3-animate-zoom">
        <div class="card-header w3-blue">
          Register Biodata
        </div>
        <div class="card-body">
        <form action="{{url('/register')}}" method="post">{{csrf_field()}}
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName">Nama Depan</label>
                  <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="namadepan" placeholder="Enter nama depan" required>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName">Nama Belakang</label>
                  <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" placeholder="Enter nama belakang" name="namabelakang" >
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No Induk</label>
              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$id}}" name="id" required>
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" required>
            </div>
            <div class="form-group">
            <label>Jenis Kelamin</label><br>
              <input type="radio" name="jenkel" value="L" id="l"><label for="l">Laki-laki</label>
               <input type="radio" name="jenkel" value="P" id="p"><label for="p">Perempuan</label>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputPassword1">Tempat/tangal lahir</label>
                  <table>
                    <tr>
                      <td><input type="text" class="form-control" name="tempat" placeholder="tempat" required></td>
                      <td>
                        <input type="text" name="tgl_lahir" class="form-control datepicker" placeholder="tanggal lahir">
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">No HP</label>
                  <input type="number" class="form-control" id="exampleConfirmPassword" placeholder="Enter No Hp!" name="nohp">
                </div>
              </div>
            </div>
            <input type="hidden" name="type" value="{{$type}}">
             <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
             <textarea name="alamat" placeholder="Enter alamat" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary btn-block" name="biodata" type="submit">Submit </button>
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
	<script src="/assetsAdmin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assetsAdmin/plugin/js/bootstrap-datepicker.min.js"></script>
	<script src="/assetsAdmin/vendor/popper/popper.min.js"></script>
	
<script>
  $(function(){
    $(".datepicker").datepicker({
      format : 'yyyy-mm-dd',
      autoclose : true,
      todayHightLight : true,
    });
  });
</script>
</body>

</html>
