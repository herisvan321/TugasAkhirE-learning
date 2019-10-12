@extends('dosen.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb ">
	<li class="breadcrumb-item">
		<a href="{{url('/homedosen')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item ">Create Group</li>
</ol>

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>
		Create pertemuan
	</div>
	<div class="card-body">
		<div class="table-responsive" >
			<form class="" action="{{url('/homedosen/proses/simpanpertemuan')}}" method="post">{{csrf_field()}}
				<div class="form-group">
				<label for="email">Nama Group</label>
					<p class="form-control">{{$judul}}</p>
				</div>
				<label for="email">Masukan Jumlah Pertemuan</label>
					<input type="number" name="pertemuan" class="form-control" id="email">
				</div>
				<button type="submit" name="biasa" class="btn btn-default">Simpan</button>
			</form> 
		</div>
	</div>
</div>
@endsection

@if($pilihan == 'biasa')
<p>biasa</p>
@else
<p>pemrograman</p>
@endif