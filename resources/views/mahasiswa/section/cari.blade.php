@extends('mahasiswa.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">cari group</li>
</ol>
 
<div class="container">
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')
<label style="color:#000">jumlah group yang ditemukan : {{count($cari)}}</label>
    @foreach($cari as $c)
	<div class="form-group" style="border-bottom:1px solid gray">
	@php($cu = DB::table('gabung_groups')->where('id_group',$c->id_group)->where('noinduk',$id_user)->first())
	@if(count($cu) > 0)
		<a href="{{url('/homemahasiswa/view/masuk/group/'.$c->slug)}}" class="w3-right w3-button w3-white w3-border w3-border-red w3-round-large">Masuk</a>
	@else
		<button type="button" class="w3-right w3-button w3-circle w3-red" data-toggle="modal" data-target="#myModal{{$c->id}}">+</button>
	@endif
		<h4 style="color:#000"> {{$c->judul}}</h4>
		<p style="color:#000">type : 
         @if($c->type == 1)
           <i style="color:blue;">Pemrograman</i>
         @else
           <i style="color:blue;">Pendidikan</i>
         @endif
		</p>
	</div>
	<div class="modal fade" id="myModal{{$c->id}}" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header w3-blue">
          <h4 class="modal-title">Masukan ID Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form-inline my-2 my-lg-0 mr-lg-2" action="{{url('/homemahasiswa/proses/id_group')}}" method="post">
					<div class="input-group">
					 {{csrf_field()}}
						<input type="text" name="id_group" class="form-control" placeholder="ID">
						<span class="input-group-btn">
							<button class="btn btn-success" type="submit" name="btniduser">
								<i class="fa fa-key"></i>
							</button>
						</span>
					</div>
				</form>
        </div>
        <div class="modal-footer w3-blue">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
	@endforeach
</div>
@endsection