@extends('mahasiswa.home')
@section('main')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{url('/homedosen')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item ">Pesan</li>
</ol><br>
@foreach($pesan as $t)
@if($t->id_noinduk_1 == $id_user)
@php($bio = DB::table('biodatas')->where('noinduk',$t->id_noinduk_2)->first())
 <div class="form-group" style="overflow:hidden">
 @php($foto = DB::table('fotos')->where('noinduk',$t->id_noinduk_2)->first())
 @if(($bio->jenkel == 'L') && ($foto->foto == 'foto'))
    <img src="/imgHome/img_avatar3.png" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
 @elseif(($bio->jenkel == 'P') && ($foto->foto == 'foto'))
 	 <img src="/imgHome/img_avatar2.png" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
@else
	 <img src="{{ asset('/upload/home/'.$foto->foto) }}" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
@endif
<h4 class="w3-text-black">  
		@if($bio->namabelakang == 'kosong')
			<a href="{{url('/homemahasiswa/view/pesan/'.$t->id_pesan)}}" title="">{{$bio->namadepan}}</a>
		@else
			<a href="{{url('/homemahasiswa/view/pesan/'.$t->id_pesan)}}" title="">{{$bio->namadepan}} {{$bio->namabelakang}}</a>
		@endif
		<br>
		<i class="w3-text-gray">{{ substr($t->pesan_terakhir, 0,35)}}</i>
		<span class="w3-right">
	@if($t->jumlah1 > 0)
	<span class="bg-success w3-padding">{{$t->jumlah1}}</span>
	@endif
</span>
		</h4>


		<hr>
</div>
@elseif($t->id_noinduk_2 == $id_user)
@php($bio = DB::table('biodatas')->where('noinduk',$t->id_noinduk_1)->first())

 <div class="form-group" style="overflow:hidden">
 @php($foto = DB::table('fotos')->where('noinduk',$t->id_noinduk_1)->first())
 @if(($bio->jenkel == 'L') && ($foto->foto == 'foto'))
    <img src="/imgHome/img_avatar3.png" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
 @elseif(($bio->jenkel == 'P') && ($foto->foto == 'foto'))
 	 <img src="/imgHome/img_avatar2.png" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
@else
	 <img src="{{ asset('/upload/home/'.$foto->foto) }}" class="w3-circle w3-margin-right" style="width:40px;height:40px; float:left">
@endif
<h4 class="w3-text-black">  
		@if($bio->namabelakang == 'kosong')
			<a href="{{url('/homemahasiswa/view/pesan/'.$t->id_pesan)}}" title="">{{$bio->namadepan}}</a>
		@else
			<a href="{{url('/homemahasiswa/view/pesan/'.$t->id_pesan)}}" title="">{{$bio->namadepan}} {{$bio->namabelakang}}</a>
		@endif
		<br>
		<i class="w3-text-gray">{{ substr($t->pesan_terakhir, 0,35)}}</i>
		<span class="w3-right">
			@if($t->jumlah2 > 0)
			<span class="bg-danger w3-padding w3-circle w3-text-white">{{$t->jumlah2}}</span>
			@endif
		</span>
		</h4>
		<hr>
</div>
@endif
@endforeach
@endsection