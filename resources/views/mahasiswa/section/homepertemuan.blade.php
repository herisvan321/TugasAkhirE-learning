@extends('mahasiswa.home')
@section('main')
<style type="text/css" media="screen">
  a{
    color:#000;
  }
</style>
<!-- Breadcrumbs -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Home Pertemuan {{$pertemuan}}</li>
</ol>
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')

<div class="form-group">
@php($ca = DB::table('absens')->where('id_group',$join2grup->id_group)->where('pertemuan',$pertemuan)->first())
@if(count($ca) > 0)
  @if(date('YmdHis') > date('Ymd',strtotime($ca->created_at)).'233000')
    @else
    @if(count($cekabsen) > 0)
    @else
    <div class="alert alert-info">
    
       Ambil Absen Pertemuan {{$pertemuan}}
       <form action="{{url('/homemahasiswa/absen')}}" method="post">
       {{csrf_field()}}
         <input type="hidden" name="id_group" value="{{$join2grup->id_group}}">
         <input type="hidden" name="pertemuan" value="{{$pertemuan}}">
         <input type="submit"  value="Ambil" class="btn btn-primary">
       </form>
    </div>
  @endif
 @endif
@endif
	<div class="row">

		<div class="col-sm-4 w3-animate-left">
    
			<h4 class="w3-padding w3-center w3-blue">Materi</h4>
			<ul class="list-group">
        @foreach($tmateri as $t)
        @if($t->status == 1)
        <li class="list-group-item">
          <a href="#" title="">{{$t->judul}}</a>
          <a href="{{url('/homemahasiswa/view/pertemuan/'.$t->id_materi.'/materi')}}" title="" name="vidio" class="w3-gray" >Lihat</a> <i style="color:green;">Video</i>
        </li>
        @elseif($t->status == 2)
        <li class="list-group-item">
          <a href="#" title="">{{$t->judul}}</a>
          <a href="{{url('/homemahasiswa/view/pertemuan/'.$t->id_materi.'/materi')}}" title="" class="w3-gray" >Lihat</a> <i style="color:red;">Coding</i>
        </li>
        @else
        <li class="list-group-item">
          <a href="#" title="">{{$t->judul}}</a>
          <a href="{{url('/homemahasiswa/view/pertemuan/'.$t->id_materi.'/materi')}}" title="" name="materi" class="w3-gray" >lihat</a> <i style="color:blue;">File</i>
        </li>
        @endif
        @endforeach
      </ul> 
		</div>
		<div class="col-sm-4 w3-animate-top">
			<h4 class="w3-padding w3-center w3-blue">Kuis</h4>
			<ul class="list-group">
      @foreach($tjkuis as $t)
        @if($t->jml_soal == 0)
          <p class="w3-padding w3-center">Sedang Mengisi Soal...</p>
        @else
        <li class="list-group-item">
          <span class="w3-text-gray">{{$t->judul}}</span>
          <a href="{{url('homemahasiswa/view/proses/masuk/group/'.$t->id_group.'/'.$t->noinduk.'/'.$t->pertemuan.'/'.$t->id_kuis)}}" title="" class="w3-gray">masuk</a>
          <i class="w3-text-gray">{{$t->waktu}} menit</i> 
        </li> 
        @endif
        @endforeach
    </ul> 
		</div>
		<div class="col-sm-4 w3-animate-right">
    @php($tg = DB::table('tugas')->where('id_group',$join2grup->id_group)->where('pertemuan',$pertemuan)->where('noinduk',$id_user)->orderBy('id','desc')->get())
			<h4 class="w3-padding w3-center w3-blue">Upload Tugas</h4>
			<ul>
        @foreach($tg as $t)
				<li class="w3-text-gray"><a href="{{asset('/upload/tugas/'.$t->upload)}}"  download="{{asset('/upload/tugas/'.$t->upload)}}">{{$t->upload}}</a></li>
        @endforeach
			</ul>
			<form action="{{url('/homemahasiswa/save/tugas')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">{{csrf_field()}}
			<div class="form-group">
      <input type="hidden" name="pertemuan" value="{{$pertemuan}}" >
      <input type="hidden" name="id_group" value="{{$join2grup->id_group}}">
				<input type="file" name="file" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit"  value="kirim" class="w3-button w3-blue w3-block">
			</div>
				
			</form>
		</div>
	</div>
</div>
@endsection