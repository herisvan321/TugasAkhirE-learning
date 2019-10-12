@extends('auth.home')
@section('main')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{url('/homeadmin')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Info user</li>
</ol>

<div class="card mb-3">
 <div class="card-header w3-blue">
  <i class="fa fa-table"></i>
  Biodata yang Telah Terdaftar
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
    <thead>
     <tr>
      <th>No induk</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jenkel</th>
      <th>No Hp</th>
      <th>Alamat</th>
    </tr>
  </thead>
  <tfoot>
   <tr>
    <th>No induk</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jenkel</th>
      <th>No Hp</th>
      <th>Alamat</th>
  </tr>
</tfoot>
<tbody>
@foreach($tbiodata as $t)
 <tr>
  <td>{{$t->noinduk}}</td>
  <td>{{$t->namadepan.' '.$t->namabelakang}}</td>
  <td>{{$t->email}}</td>
  <td>
    @if($t->jenkel == 'L')
      Laki-Laki
    @else
      Perempuan
    @endif
  </td>
  <td>{{$t->nohp}}</td>
  <td>{{$t->alamat}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
@endsection