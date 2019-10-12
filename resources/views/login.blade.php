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
<div style="background: rgba(0,0,0,.4);padding-top:10%;padding-bottom:17%;margin-top:-20px;">
	<div class="container">
		
		<div class="card card-login mx-auto mt-5">
			
			<div class="card-header w3-blue">
				Login
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="control-label">No Induk</label>

						<div >
							<input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password" class="control-label">Password</label>

						<div >
							<input id="password" type="password" class="form-control" name="password" required>

							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
					</div>


					<div class="form-group">
						<div >
							<button type="submit" class="btn btn-primary">
								Login
							</button>
						</div>
					</div>
				</form>
				<div class="text-center">
					<a class="d-block small mt-3" href="{{url('/register')}}">Register an Account</a>
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
