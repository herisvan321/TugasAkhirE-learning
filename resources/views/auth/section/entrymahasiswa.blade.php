@extends('auth.home')
@section('main')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
  <a href="{{url('/homeadmin')}}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Entry Mahasiswa</li>
</ol>
@include('auth.pesan.mahasiswa.gagal')
@include('auth.pesan.mahasiswa.sukses')
<div class="card mb-3">
	<div class="card-header w3-blue">
		<i class="fa fa-table"></i>
		Entry NPM Mahasiswa Manual
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<form action="{{url('/homeadmin/entry/mahasiswa')}}" method="post" accept-charset="utf-8">
		{{csrf_field()}}
			<div class="form-group">
			<label for="usr">NPM:</label>
				<input type="text" class="form-control" id="usr" name="id" placeholder="Enter NPM" required>
			</div>
			<div class="form-group">
				<label for="pwd">Nama:</label>
				<input type="text" class="form-control" id="pwd" name="nama" placeholder="Enter Nama" required>
			</div>
			 <div class="form-group">
				<input type="submit" class="btn btn-primary" value="Simpan"> <a href="{{url('/homeadminupdatemahasiswa')}}" class="btn btn-primary">Update data</a>
			</div>
		</form>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header w3-blue">
		<i class="fa fa-table"></i>
		Entry Mahasiswa Import Excel
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<form action="{{url('/homeadmin/entry/mahasiswa/uploadexcel')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="form-group">
			<label for="usr">Upload:</label>
				<input type="file" name="file" class="form-control" id="usr">
			</div>
			 <div class="form-group">
				<input type="submit" class="btn btn-primary" value="Upload">
			</div>
		</form>
		</div>
	</div>
</div>
@endsection