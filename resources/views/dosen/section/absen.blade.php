<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style>
		.tab, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
	</style>
</head>
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
 <p align="center">ABSENSI PERKULIAHAN</p>
 <div class="table-responsive">

 <div>
   <table >
   		<tr >
   		<td style="border:none;">NAMA MATAKULIAH</td>
   		<td style="border:none;">:</td>
   		<TD style="border:none;">{{$group->judul}}</TD>
   		</tr>
   		<tr>
   		<td style="border:none;">DOSEN PEMBINA</td>
   		<td style="border:none;">:</td>
   		<TD style="border:none;">{{ Auth::user()->nama_user }}</TD>
   		</tr>
   </table> 	
 </div> <br>  
<table style="width:100%" class="tab">
	<tr>
		<th align="center">No</th>
		<th align="center">NPM</th>
		<th align="center">Nama</th>
		<th align="center">L/P</th>
		@foreach($cek as $a)
		<th align="center">{{$a->pertemuan}}</th>
		@php($p = $a->pertemuan)
		@endforeach
		<th align="center">ket</th>
	</tr>

@php($no = 1)
	@foreach($joinabsen as $t)
	<tr>
		<td>{{$no++}}</td>
		<td>{{$t->noinduk}}</td>
		@php($nama = DB::table('biodatas')->where('noinduk',$t->noinduk)->first())
		<td>{{$nama->namadepan. ' ' .$nama->namabelakang}}</td>
		<td>{{$nama->jenkel}}</td>
		@foreach($cek as $l)
		<td>
		@php($per = DB::table('ambil_absens')->where('id_group',$id_group)->where('pertemuan',$l->pertemuan)->where('noinduk',$t->noinduk)->get()
		)
		@php($last = DB::table('absens')->where('id_group',$id_group)->orderBy('pertemuan','desc')->first())
			@if(@count($per) > 0)
			<i class="fa fa-check "></i>
			@elseif($l->pertemuan > $last->pertemuan)
			
			@else
			<i class="fa fa-times"></i>
			@endif
		</td>
		@endforeach
		<td></td>
	</tr>
		@endforeach
</table>
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
</div>
<!---
<table align="right" style="margin-top:50px;">
	<tr>
		<td style="border:none;">Padang,........................................</td>
	</tr>
	<tr>
		<td style="border:none;">Ketua Prodi</td>
	</tr>
	<tr>
		<td style="border:none;height:130px;"></td>
	</tr>
	<tr>
		<td style="border:none;">Ir.Hj.Nurmi,M.Kom </td>
	</tr>
	<tr>
		<td style="border:none;">NIDN : </td>
	</tr>
</table>
-->
</body>
</html>