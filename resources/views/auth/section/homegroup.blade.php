@extends('auth.home')
@section('main')
<style type="text/css" media="screen">
	.btn{
		border: none;
		border-radius: 0;
	}
</style>
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{url('/homedosen')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item ">Home Group</li>
</ol>
<div class="form-group w3-padding w3-light-grey ">
	Nama Group : {{$cekgroup->judul}}<br>
	ID Group : <span class="w3-green">{{$cekgroup->id_group}}</span>
	<br>
	Deskripsi : {{$cekgroup->deskripsi}}
</div>
<div class="row">
	<div class="col-sm-9">
		
		<div id="posting">
			@foreach($posting as $t)
			@php($nama = DB::table('biodatas')->where('noinduk',$t->noinduk)->first())
			@php($foto = DB::table('fotos')->where('noinduk',$t->noinduk)->first())
			<div class="w3-container w3-card w3-white w3-round w3-margin-bottom"><br>
				@if(($nama->jenkel == 'P') && ($foto->foto == 'foto'))
				<img src="/imgHome/img_avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
				@elseif(($nama->jenkel == 'L') && ($foto->foto == 'foto'))
				<img src="/imgHome/img_avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
				@else
				<img src="{{ asset('/upload/home/'.$foto->foto) }}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
				@endif
				<span class="w3-right w3-opacity">{{date('d-m-Y',strtotime($t->created_at))}}</span>
				
				<h4>@if($nama->namabelakang == 'kosong')
					{{$nama->namadepan}}
					@else
					{{$nama->namadepan.' '.$nama->namabelakang}}
					@endif
				</h4><br>
				<hr class="w3-clear">
				<p>{{$t->isi_posting}}</p>
        <!--<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> -->
    </div>
    @endforeach
</div>

</div>
<div class="col-sm-3">
	<div class="panel-group w3-margin-bottom" id="accordion">
		@foreach($join2grup as $j)
		<div class="panel panel-default">
			<div class="panel-heading">
				@if($j->status == '1')
				<a  href="#"  class="btn btn-primary btn-block">
					Pertemuan {{$j->pertemuan}}</a>
				</div>
				@else
				<a href="#"  class="btn w3-light-grey btn-block">
					Pertemuan {{$j->pertemuan}}</a>
				</div>
				@endif		
				
			</div>
			@endforeach
		</div> 
	</div>
</div> 
@endsection