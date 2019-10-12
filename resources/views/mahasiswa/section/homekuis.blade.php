@extends('mahasiswa.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">home kuis</li>
</ol>
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')
<span class="form-control w3-blue">
	<form action="{{url('/homemahasiswa/proses/view/ujian')}}" method="get" accept-charset="utf-8">
	@php($id_user = Auth::user()->noinduk)
	@php($cek = DB::table('jawabans')->where('id_kuis',$id_kuis)->where('noinduk',$id_user)->get())
	@php($cekmulai = DB::table('mulai_ujians')->where('id_kuis',$id_kuis)->where('noinduk',$id_user)->first())
	@if(date('H') >= 24)
	@else
		@if(count($cek) > 0)
			<span class="w3-right">Anda Telah Ujian</span>
		@else
			@if(count($cekmulai) > 0)
			<input type="submit" class="btn btn-success w3-right"  value="Mulai Ujian" >
			@else
			<input type="submit" class="btn btn-warning w3-right"  value="Klik" >
			@endif
		@endif
	@endif
	<b>	Judul : <br>
	pertemuan : <br></b>
	<i>Waktu : </i>
	<input type="hidden" name="id_group" value="{{ $id_group}}" >
	<input type="hidden" name="id_kuis" value="{{ $id_kuis}}" >
	<input type="hidden" name="jam" value="{{ $c->jam}}" >
	<input type="hidden" name="pertemuan" value="{{ $pertemuan}}" >
	<input type="hidden" name="menit" value="{{ $c->menit}}" >
	{{csrf_field()}}
	</form>
	<span class="w3-text-red">*.catatan <br>
	ujian tidak bisa di lakukan diatas jam 8 malam
	</span> 
</span>
@endsection