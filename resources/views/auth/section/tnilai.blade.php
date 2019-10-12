@extends('auth.home')
@section('main')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{url('/homeadmin')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Nilai</li>
</ol>
<br>
<style>
		.tab, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
</style>
<table border="1" style="width:100%" class="tab">
<tr>
	<td>No</td>
	<td>NPM</td>
	<td>Nama</td>
	<td>jenkel</td>
	@foreach($judulkuis as $b)
	<td>{{$b->judul}}</td>
	@endforeach
	<td>NA</td>
	<td>NH</td>
</tr>
@php($no = 1)
@php($na1 = 0)
@php($na1 = 0)
@php($NA = 0)
@foreach($join as $a)
<tr>
	<td>{{$no++}}</td>
	<td>{{$a->noinduk}}</td>
	@php($nama = DB::table('biodatas')->where('noinduk',$a->noinduk)->first())
	<td>{{$nama->namadepan .' '. $nama->namabelakang}}</td>
	<td>{{$nama->jenkel}}</td>
	@foreach($judulkuis as $b)
	@php($nn = DB::table('nilais')->where('id_kuis',$b->id_kuis)->where('noinduk',$a->noinduk)->first())
	@php($mm = DB::table('judul_kuis')->where('id_group',$b->id_group)->get())
	@if(@count($nn) > 0)
	<td>{{ $nn->nilai}}</td>
	@php($na1 += $nn->nilai)
	@else
    <td>{{$na1 = 0}}</td>
	@endif
	@endforeach
	<td>{{$NA = $na1/@count($mm)}}</td>
	<td>
		@if(($NA > 80) && ($NA <= 100))
		A
		@elseif(($NA > 65) && ($NA <= 80))
		B
		@elseif(($NA > 55) && ($NA <= 65))
		C
		@elseif(($NA > 45) && ($NA <= 55))
		D
		@elseif(($NA >= 0) && ($NA <= 45))
		E
		@endif
	</td>
</tr>

@endforeach
</table>
@endsection