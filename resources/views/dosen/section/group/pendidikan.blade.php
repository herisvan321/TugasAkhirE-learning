@extends('dosen.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">group pendidikan</li>
</ol>
 
<div class="form-group">
<p>Pilih group dibawah ini:</p>
	<div class="list-group">
	@foreach($jmlgroup as $t)
	@if($t->type == 0)
		<a href="{{url('/homedosen/view/proses/masuk/group/'.$t->slug)}}" name="rekap" class="list-group-item ">
			<h4 class="list-group-item-heading">{{$t->judul}}</h4>
			<p class="list-group-item-text">{{$t->deskripsi}}</p>
		</a>
	@endif
	@endforeach
	</div> 
</div>
@endsection