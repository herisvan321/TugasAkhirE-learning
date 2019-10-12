@extends('dosen.home')
@section('main')
      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('/homedosen')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item ">Rekap Nilai</li>
      </ol>
@include('dosen.pesan.gagal')
@include('dosen.pesan.sukses')
<div class="form-group">
<p>Pilih group dibawah ini:</p>
	<div class="list-group w3-animate-bottom">
	@foreach($tgroup as $t)
		<a href="{{url('/homedosen/view/rekapnilai/'.$t->slug)}}" name="rekap" class="list-group-item ">
			<h4 class="list-group-item-heading">{{$t->judul}}</h4>
			<p class="list-group-item-text">{{$t->deskripsi}}</p>
		</a>
	@endforeach
	</div> 
</div>
@endsection