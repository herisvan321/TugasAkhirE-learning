@extends('mahasiswa.home')
@section('main')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">nilai</li>
</ol>
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')

 <table class="table table-striped">
    <thead>
      <tr>
        <th>NO</th>
        <th>Nama Kuis</th>
        <th>Nilai</th>
        <th>Tanggal ujian</th>
      </tr>
    </thead>
    <tbody>
    @php($no = 1)
    @foreach($joinnilai as $t)
      <tr>
        <td>{{$no++}}</td>
        <td>
          @php($judul1 = DB::table('judul_kuis')->where('id_kuis',$t->id_kuis)->first())
          {{$judul1->judul}}
        </td>
        <td>{{$t->nilai}}</td>
        <td>{{$t->created_at}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>
@endsection