@extends('dosen.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{url('/homedosen')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item ">Create Group</li>
</ol>

<div class="card mb-3">
	<div class="card-header w3-blue">
		<i class="fa fa-table"></i>
		Create Group Pendidikan
	</div>
	<div class="card-body">
		<div class="table-responsive" >
			<form class="" action="{{url('/homedosen/proses/simpangroup')}}" method="post">{{csrf_field()}}
				<div class="form-group">
				<label for="email">Nama Group</label>
					<input type="text" name="judul" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="email">Masukan Jumlah Pertemuan</label>
					<input type="number" name="pertemuan" value="16" class="form-control" id="email">
					<input type="hidden" name="type" value="0">
				</div>
				<div class="form-group">
					<label for="pwd">Deskripsi:</label>
					<textarea name="deskripsi" class="form-control" id="pwd"></textarea>
				</div>
				<input type="hidden" name="tipe" value="biasa">
				<button type="submit" name="biasa" class="btn btn-primary">Simpan</button>
			</form> 
		</div>
	</div>
</div>
@endsection