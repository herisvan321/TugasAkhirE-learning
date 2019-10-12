@extends('auth.home')
@section('main')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{url('/homeadmin')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Info Group</li>
</ol>

<div class="card mb-3">
 <div class="card-header w3-blue">
  <i class="fa fa-table"></i>
  Group yang Telah Terdaftar
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
    <thead>
     <tr>
      <th>ID</th>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Pertemuan</th>
      <th>Type</th>
      <th>Master</th>
    </tr>
  </thead>
  <tfoot>
   <tr>
    <th>ID Group</th>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Pertemuan</th>
      <th>Type</th>
      <th>Master</th>
  </tr>
</tfoot>
<tbody>
@foreach($tbiodata as $t)
 <tr>
  <td>{{$t->id_group}}</td>
  <td>{{$t->judul}}</td>
  <td>{{ substr($t->deskripsi, 0,20)}}</td>
  <td>
    {{$t->pertemuan}}
  </td>
  <td>
  	@if($t->type == 1)
  	Pemrograman
  	@else
  	Pendidikan
  	@endif
  </td>
  @php($bio = DB::table('biodatas')->where('noinduk',$t->noinduk)->first())
  <td>
  	@if($bio->namabelakang == 'kosong')
  	<span><strong>{{ $bio->namadepan}}</strong> </span>
  	@else
  	<span><strong>{{ $bio->namadepan.' '.$bio->namabelakang}}</strong> </span>
  	@endif
  </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
@endsection