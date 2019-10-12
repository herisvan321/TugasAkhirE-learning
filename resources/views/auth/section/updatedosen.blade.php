@extends('auth.home')
@section('main')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{url('/homeadmin')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Update Dosen</li>
</ol>
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')
<div class="card mb-3">
	<div class="card-header w3-blue">
		<i class="fa fa-pencil-square-o"></i>
		Update Dosen
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
				<thead>
					<tr>
						<th>NIDN</th>
						<th>Nama</th>
						<th>JenKel</th>
						<th>Update Password</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>NIDN</th>
						<th>Nama</th>
						<th>JenKel</th>
						<th>Update Password</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($tbiodata as $t)
					@php($dosen = DB::table('users')->where('noinduk',$t->noinduk)->first())
					@if((@count($dosen) > 0) && ($dosen->level == 'dosen'))
					<tr>
						<td>{{$t->noinduk}}</td>
						<td>
							@if($t->namabelakang == 'kosong')
							{{$t->namadepan}}
							@else
							{{$t->namadepan.' '.$t->namabelakang}}
							@endif
						</td>
						<td>
							@if($t->jenkel == 'L')
							Laki-Laki
							@else
							Perempuan
							@endif
						</td>
						<td align="center"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$t->noinduk}}"><i class="fa fa-pencil-square-o"></i></a></td>
					</tr>
					<div class="modal fade" id="myModal{{$t->noinduk}}" role="dialog">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header w3-blue">
									<h4 class="modal-title">
										@if($t->namabelakang == 'kosong')
										{{$t->namadepan}}
										@else
										{{$t->namadepan.' '.$t->namabelakang}}
										@endif</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>

									</div>
									<div class="modal-body">
										<p>
											<form action="{{url('homeadmin/proses/update/password')}}" method="post">{{csrf_field()}}
												<input type="password" name="password" placeholder="Enter Password" class="form-control">
												<input type="hidden" name="id_user" value="{{$t->noinduk}}">
												<input type="submit"  value="Update" class="btn btn-primary w3-right">
											</form>
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection