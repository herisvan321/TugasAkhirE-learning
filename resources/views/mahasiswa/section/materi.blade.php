@extends('mahasiswa.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">materi</li>
</ol>
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')

<div class="form-group">
@php
	function fsize($file)
	{
		$a = array("B","KB","MB","GB","TB","PB");
		$post = 0;
		$size = filesize($file);
		while ($size >= 1024) {
			$size /= 1024;
			$post++;
		}
		return round($size,2)." ".$a[$post];
	}
@endphp
@php($file = 'upload/materi/'.$c->upload)
	@if($c->status == 0)
		<span class="form-control w3-padding">
		<a href="{{asset('/upload/materi/'.$c->upload)}}" download="{{asset('/upload/materi/'.$c->upload)}}" class="btn btn-primary w3-right"> <i class="fa fa-cloud-download "> Download</i></a>
		<table>
			<tr>
				<th>judul</th>
				<th>:</th>
				<th>{{$c->judul}}</th>
			</tr>
			<tr>
				<td>size</td>
				<td>:</td>
				<td>{{ fsize($file)}}</td>
			</tr>
			<tr>
				<td>update</td>
				<td>:</td>
				<td>{{$c->updated_at}}</td>
			</tr>
			<tr>
				<td valign="top">deskripsi</td>
				<td valign="top">:</td>
				<td>{{$c->deskripsi}}</td>
			</tr>
		</table>
	</span>
	@elseif($c->status == 1)
	<span class="form-control w3-padding">
		<a href="{{asset('/upload/materi/'.$c->upload)}}" download="{{asset('/upload/materi/'.$c->upload)}}" class="btn btn-primary w3-right"> <i class="fa fa-cloud-download "> Download</i></a>
		<table>
			<tr>
				<th>judul</th>
				<th>:</th>
				<th>{{$c->judul}}</th>
			</tr>
			<tr>
				<td>size</td>
				<td>:</td>
				<td>{{ fsize($file)}}</td>
			</tr>
			<tr>
				<td>update</td>
				<td>:</td>
				<td>{{$c->updated_at}}</td>
			</tr>
			<tr>
				<td valign="top">deskripsi</td>
				<td valign="top">:</td>
				<td>{{$c->deskripsi}}</td>
			</tr>
		</table> <br>

		<p>
			<video controls style="width:100%">
				<source src="{{asset('/upload/materi/'.$c->upload)}}">
			</video>
		</p>
	</span>
	@endif
</div>
@endsection