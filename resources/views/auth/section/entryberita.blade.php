@extends('auth.home')
@section('main')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
  <a href="{{url('/homeadmin')}}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Pengumuman</li>
</ol>
@include('auth.pesan.dosen.gagal')
@include('auth.pesan.dosen.sukses')
<div class="card mb-3">
	<div class="card-header w3-blue">
		<i class="fa fa-table"></i>
		Entry Pengumuman
	</div>
	<div class="card-body">
		<div class="table-responsive">
		<form action="{{url('/homeadmin/entry/berita')}}" method="post" accept-charset="utf-8">
		{{csrf_field()}}
		
			<div class="form-group">
				<textarea name="berita" class="ckeditor" id="ckeditor"></textarea>
			</div>
			 <div class="form-group">
				<input type="submit" class="btn btn-primary" value="Publikasi">
			</div>
		</form>
		</div>
	</div>
</div>
@endsection