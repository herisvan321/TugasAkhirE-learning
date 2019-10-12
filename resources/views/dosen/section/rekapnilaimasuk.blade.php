<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<style>
		.tab, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
</style>
<body>
<div style="overflow:hidden;">
	<img src="{{public_path('imgHome/logo.png')}}" alt="" style="width:100px;height:75px;" align="left" >
 <div>
 	<h3 align="center">
 		SEKOLAH TINGGI KEGURUAN DAN ILMU PENDIDIKAN <BR>
 		(STKIP) PGRI SUMATERA BARAT
 	</h3>
 </div>
 
</div>
<br>
<div style="float:left">
 	Jl Gunung Pengilun Padang
 </div>
<div style="float:right">
	Telp (0751) 7053731. Fax (0751) 34311
</div>
 <br>
 <hr >
 <p align="center">NILAI PERKULIAHAN</p>
  <div>
   <table >
   		<tr >
   		<td style="border:none;">NAMA MATAKULIAH</td>
   		<td style="border:none;">:</td>
   		<TD style="border:none;">{{$tgroup->judul}}</TD>
   		</tr>
   		<tr>
   		<td style="border:none;">DOSEN PEMBINA</td>
   		<td style="border:none;">:</td>
   		<TD style="border:none;">{{ Auth::user()->nama_user }}</TD>
   		</tr>
   </table> 	
 </div> <br> 
<table border="1" style="width:100%" class="tab">
<tr>
	<th align="center">No</th>
	<th align="center">NPM</th>
	<th align="center">Nama</th>
	<th align="center">L/P</th>
	@foreach($judulkuis as $b)
	<th align="center">{{$b->judul}}</th>
	@endforeach
	<th align="center">NA</th>
	<th align="center">NH</th>
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
	@php($nn = DB::table('nilais')->where('id_kuis',$b->id_kuis)->where('noinduk',$a->noinduk)->first())
	@php($ww = DB::table('all_nilais')->where('id_group',$b->id_group)->where('noinduk',$a->noinduk)->first())
	@php($mm = DB::table('judul_kuis')->where('id_group',$b->id_group)->get())
	@if(@count($nn) > 0)
	<td>{{ $nn->nilai}}</td>
	@else
    <td>0</td>
	@endif
	@endforeach
	@php($NA = $ww->nilai / @count($mm))
	<td>{{ substr($NA,0,4)}}</td>
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
<br>
 <table align="right">
   		<tr >
   		<td style="border:none;">padang</td>
   		<td style="border:none;">,</td>
   		<TD style="border:none;">{{date('d/m-Y')}}</TD>
   		</tr>
   		<tr>
   			<td style="border:none;" colspan="3" height="80" valign="top">Dosen Pembina</td>
   		</tr>
   		<tr>
   		<TD style="border:none;" colspan="3">{{ Auth::user()->nama_user }}</TD>
   		</tr>
   </table> 
</body>
</html>