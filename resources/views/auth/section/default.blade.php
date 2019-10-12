@extends('auth.home')
@section('main')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{url('/homeadmin')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">My Dashboard</li>
</ol>
 
<h4>Request :</h4>
<div class="list-group">
@foreach($re as $a)
    <div  class="list-group-item w3-light-gray w3-animate-zoom">
      <h4 class="list-group-item-heading">{{$a->nama}}</h4>
      <p class="list-group-item-text">{{$a->email}}</p>
      <p class="list-group-item-text">{{$a->pesan}}</p>
    </div>
  </div>
@endforeach
@endsection