@extends('auth.home')
@section('main')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{url('/homeadmin')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Entry Periode</li>
</ol>
@include('auth.pesan.periode.pesangagal')
@include('auth.pesan.periode.sukses')
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>
		Entry Periode
	</div>
	<div class="card-body">
		<div class="table-responsive">
		
			<form class="form-inline" action="{{url('homeadminperiode')}}" method="post">{{csrf_field()}}
				<div class="form-group">
				<label for="email">Periode</label>
					<input type="text" class="form-control" name="periode" id="email" placeholder="<?= date('Y')?>1 atau <?= date('Y')?>2" required>
				</div>..
				<div class="form-group">
					<label for="pwd">Semester</label>
					<input type="text" class="form-control" id="pwd" name="semester" required placeholder="semester genap/ganjil <?= date('Y')?>/<?= date('Y')+1?>">
				</div>..
				<div class="form-group">
					<button type="submit" class="btn btn-default">Simpan</button>
				</div>
				
			</form> 
		</div>
	</div>
</div>

<div class="card mb-3">
 <div class="card-header">
  <i class="fa fa-table"></i>
  Data Priode
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
    <thead>
     <tr>
      <th>NO</th>
      <th>Priode</th>
      <th>Semester</th>
      <th>Action</th>
    </tr>
  </thead>
  <tfoot>
   <tr>
   	<th>NO</th>
   	<th>Priode</th>
   	<th>Semester</th>
   	<th>Action</th>
  </tr>
</tfoot>
<tbody>
@php($no=1)
@foreach($tampil as $t)
 <tr>
  <td>{{$no++}}</td>
  <td>{{$t->periode}}</td>
  <td>{{$t->semester}}</td>
  <td>
  <form action="{{url('/homeadmin/delete/periode/'.$t->id)}}" method="post" accept-charset="utf-8">
  {{csrf_field()}} {{method_field('delete')}}
  	<button type="submit" class="btn btn-warning">Hapus</button>
  </form>
  	

  </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
@endsection