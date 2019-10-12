@extends('mahasiswa.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">nilai</li>
</ol>
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')
<div class="form-group">
<p>Pilih group dibawah ini:</p>
	<div class="list-group w3-animate-bottom">
	@foreach($jotable as $t)
		<a href="{{url('homemahasiswa/view/group/nilai/'.$t->slug)}}" name="rekap" class="list-group-item ">
			<h4 class="list-group-item-heading">{{$t->judul}}</h4>
			<p class="list-group-item-text">{{$t->deskripsi}}</p>
		</a>
	@endforeach
	</div> 
</div>
@endsection