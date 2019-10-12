@extends('auth.home')
@section('main')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
  <a href="{{url('/homeadmin')}}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Entry Dosen</li>
</ol>
@include('auth.pesan.dosen.gagal')
@include('auth.pesan.dosen.sukses')
<div class="card mb-3">
	<div class="card-header w3-blue">
		<i class="fa fa-table"></i>
		Entry Dosen Manual
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<form action="{{url('/homeadmin/entry/dosen')}}" method="post" accept-charset="utf-8">
		{{csrf_field()}}
		
			<div class="form-group">
			<label for="usr">NIDN:</label>
				<input type="text" name="id" placeholder="Enter NIDN" class="form-control" id="usr" required>
			</div>
			<div class="form-group">
				<label for="pwd">Nama:</label>
				<input type="text" name="nama" class="form-control" placeholder="Enter Nama" id="pwd" required>
			</div>
			 <div class="form-group">
				<input type="submit" class="btn btn-primary" value="Simpan"> <a href="{{url('/homeadminupdatedosen')}}" class="btn btn-primary">Update data</a>
			</div>
		</form>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header w3-blue">
		<i class="fa fa-table"></i>
		Entry Dosen Import exel
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<form action="{{url('/homeadmin/entry/dosen/uploadexcel')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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