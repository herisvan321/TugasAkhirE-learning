@extends('auth.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">cari user</li>
</ol>
 
<div class="container-fluid">
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')
<label>jumlah user yang ditemukan : {{@count($cariuser)}}</label>
@foreach($cariuser as $t)
 <div class="form-group" style="overflow:hidden">
 @php($foto = DB::table('fotos')->where('noinduk',$t->noinduk)->first())
 @if(($t->jenkel == 'L') && ($foto->foto == 'foto'))
    <img src="/imgHome/img_avatar3.png" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
 @elseif(($t->jenkel == 'P') && ($foto->foto == 'foto'))
 	 <img src="/imgHome/img_avatar2.png" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
@else
	 <img src="{{ asset('/upload/home/'.$foto->foto) }}" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
@endif
		<a href="#" class="w3-right w3-button w3-white w3-border w3-border-red w3-round-large">Pesan</a>
		<h4 class="w3-text-gray">  
		@if($t->namabelakang == 'kosong')
			{{$t->namadepan}}
		@else
			{{$t->namadepan}} {{$t->namabelakang}}
		@endif
		</h4>
		<hr>
	</div> 
@endforeach
@endsection