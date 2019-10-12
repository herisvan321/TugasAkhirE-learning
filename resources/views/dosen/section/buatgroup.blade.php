@extends('dosen.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb ">
	<li class="breadcrumb-item">
		<a href="{{url('/homedosen')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item ">Create Group</li>
</ol>
@include('dosen.pesan.gagal')
@include('dosen.pesan.sukses')
<div class="alert alert-info w3-blue w3-animate-zoom">
	Apakah Group anda buat berhubungan dengan pemrograman web?
	<form action="{{url('/homedosen/proses/group')}}" method="get" accept-charset="utf-8">
		{{csrf_field()}}
		<div class="">
			<input type="radio" checked id="ya" name="pertanyaan" value="ya" required>
			<label for="ya">YA</label>
			<input type="radio"  id="tidak" name="pertanyaan" value="tidak" required>
			<label for="tidak">TIDAK</label>
		</div>
		<div class="">
			<input type="submit" class="btn btn-primary" value="Pilih" >
		</div>
	</form>
</div><hr>
<div class="form-group">
	<p class="w3-text-gray">Jumlah group anda : {{@count($jmlgroup)}}</p>
	<p class="w3-text-gray">Jumlah group pemrograman : {{@count($jmlgrouppemrograman)}}</p>
	<p class="w3-text-gray">Jumlah group pendidikan : {{@count($jmlgroupbiasa)}}</p>
</div><hr>
<div class="form-group">
<p>Group anda:</p>
	<ul type="-">
	@foreach($jmlgroup as $jml)
		<li>
		<form action="" method="get" accept-charset="utf-8">
			<a href="{{url('/homedosen/view/proses/masuk/group/'.$jml->slug)}}" title="" class="w3-text-gray">{{$jml->judul}}</a> @if($jml->type == '0')
				@elseif($jml->type == '1')
				<i style="color:blue">web</i>
				@endif
		</form>
		</li>
	@endforeach
	</ul>
</div>
@endsection