@extends('mahasiswa.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb w3-animate-fading">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">My Dashboard</li>
</ol>
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')
<div class="form-group w3-light-gray w3-round w3-padding w3-text-gray">
@if($user->namabelakang == 'kosong')
	<h2>SELAMAT DATANG {{$user->namadepan}} <br> DI E-LEARNING PENDIDIKAN INFORMATIKA STKIP PGRI SUMATERA BARAT</h2>
@else
<h2>SELAMAT DATANG {{$user->namadepan.' '.$user->namabelakang}} <br> DI E-LEARNING PENDIDIKAN INFORMATIKA STKIP PGRI SUMATERA BARAT</h2>
@endif
</div>
<div class="row">
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-primary o-hidden h-100 w3-animate-zoom">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fa fa-fw fa-comments"></i>
				</div>
				<div class="mr-5">
					Messages!
				</div>
			</div>
			<a href="{{url('homemahasiswa/homepesan')}}" class="card-footer text-white clearfix small z-1">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fa fa-angle-right"></i>
				</span>
			</a>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-warning o-hidden h-100 w3-animate-zoom">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fa fa-fw fa-code"></i>
				</div>
				<div class="mr-5">
					Group Pemrograman!
				</div>
			</div>
			<a href="{{url('/homemahasiswa/pemrograman')}}" class="card-footer text-white clearfix small z-1">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fa fa-angle-right"></i>
				</span>
			</a>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-success o-hidden h-100 w3-animate-zoom">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fa fa-fw fa-graduation-cap "></i>
				</div>
				<div class="mr-5">
					Group Pendidikan!
				</div>
			</div>
			<a href="{{url('/homemahasiswa/pendidikan')}}" class="card-footer text-white clearfix small z-1">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fa fa-angle-right"></i>
				</span>
			</a>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-danger o-hidden h-100 w3-animate-zoom">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fa fa-fw  fa-tags "></i>
				</div>
				<div class="mr-5">
					Nilai!
				</div>
			</div>
			<a href="{{url('homemahasiswa/nilai')}}" class="card-footer text-white clearfix small z-1">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fa fa-angle-right"></i>
				</span>
			</a>
		</div>
	</div>
</div>
<img src="{{asset('/imgHome/gambarstkippgri.png')}}" style="width:100%; height:40%;margin-top:-15px;" alt="" class="w3-animate-bottom">
@endsection