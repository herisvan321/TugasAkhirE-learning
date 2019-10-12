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
		Edit Group
	</div>
	<div class="card-body">
		<div class="table-responsive" >
			<form class="" action="{{url('/homedosen/proses/updategroup')}}" method="post">{{csrf_field()}}
				<div class="form-group">
				<label for="email">Nama Group</label>
					<input type="text" name="judul" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="pwd">Deskripsi:</label>
					<textarea name="deskripsi" class="form-control" id="pwd"></textarea>
				</div>
				<button type="submit" name="biasa" class="btn btn-default">Simpan</button>
			</form> 
		</div>
	</div>
</div>
@endsection