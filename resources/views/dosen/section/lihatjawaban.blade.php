@extends('dosen.home')
@section('main')
<ol class="breadcrumb ">
	<li class="breadcrumb-item">
		<a href="{{url('/homedosen')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item ">Nilai Jawaban </li>
</ol>
@if(@count($nilai) > 0)
	Nama : {{$joinbiodata->namadepan.' '.$joinbiodata->namabelakang}}<br>
	NPM : {{$joinbiodata->noinduk}} <br>
	NILAI : {{$nilai->nilai}}
@elseif($ceknilai > 0)
<form action="{{url('/homedosen/proses/kuis/jawaban/mahasiswa')}}" method="post">{{csrf_field()}}
<div class="alert alert-info">
  <div class="form-group row">
nilai
  	<div class="col-xs-3">
    <input class="form-control" id="ex2" name="nilai" type="text" value="{{$ceknilai}}">
    <input type="hidden" name="id_user" value="{{$joinbiodata->noinduk}}">
	<input type="hidden" name="id_kuis" value="{{$id_kuis}}">
  </div>
  <div class="col-xs-2">
    <input class="btn btn-primary" id="ex" type="submit" value="Simpan" name="btnsimpannilai">
  </div>
  </div>
</div>
</form>
@else	

Nama : {{$joinbiodata->namadepan.' '.$joinbiodata->namabelakang}}<br>
NPM : {{$joinbiodata->noinduk}}
<hr>
@php($no = 1)
<form action="{{url('/homedosen/proses/kuis/jawaban/mahasiswa')}}" method="post">{{csrf_field()}}
<table border="0">

<tr>
	<td ><b>No</b></td>
	<td><b>Soal</b></td>
</tr>
@foreach($cek as $c)
	<tr>
		<td style="width:50px;" valign="top">{{$no++}}</td>
		<td>{!! $c->soal  !!}</td>
	</tr>
	<tr>
		<td></td>
		<td><b>jawaban</b></td>
	</tr>
	<tr>
		<td>
			<input type="hidden" name="id_user" value="{{$joinbiodata->noinduk}}">
			<input type="hidden" name="id_kuis" value="{{$c->id_kuis}}">
			<input type="hidden" name="id[]" value="{{$c->id}}">
		</td>
		<td>{!! $c->jawaban !!} </td>
	</tr>
	<tr>
		<td></td>
		<td><b>Nilai</b></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="text" name="nilai[]" class="form-control" placeholder="bobot {{$c->bobot}}" required>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><hr></td>
	</tr>
@endforeach
	<tr>
		<td></td>
		<td>
			<input type="submit" class="btn btn-success"  value="simpan" name="btnsimpan">
		</td>
	</tr>
</form>
</table>
@endif
<br><br>
@endsection