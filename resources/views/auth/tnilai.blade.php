@extends('auth.home')
@section('main')
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
@php($NA = 0)
@foreach($join as $a)
<tr>
	<td>{{$no++}}</td>
	<td>{{$a->noinduk}}</td>
	@php($nama = DB::table('biodatas')->where('noinduk',$a->noinduk)->first())
	<td>{{$nama->namadepan .' '. $nama->namabelakang}}</td>
	<td>{{$nama->jenkel}}</td>
	

	@foreach($judulkuis as $b)
	@php($nt = 0)
	@php($sm = 0)
	@php($kuis = DB::table('nilais')->where('id_group',$b->id_group)->where('noinduk',$a->noinduk)->where('id_kuis',$b->id_kuis)->first())
	<td>
	@if(count($kuis) > 0)
		@if($kuis->nilai == '')
			{{$nt = '0'}}
		@else
			{{$nt += $kuis->nilai}} 
		@endif
	@php($sm = count($kuis))
	@endif

	</td>
	@endforeach
	<td>
		{{$jml = $nt/$sm}}
	</td>
	<td>
		@if(($jml > 80) && ($jml <= 100))
		{{'A'}}
		@elseif(($jml > 75) && ($jml <= 80))
		{{'B'}}
		@elseif(($jml > 55) && ($jml <= 75))
		{{'C'}}
		@elseif(($jml > 40) && ($jml <= 55))
		{{'D'}}
		@elseif(($jml >= 1) && ($jml <= 40))
		{{'E'}}
		@else
		{{'0'}}
		@endif
	</td>
</tr>

@endforeach
</table>
@endsection