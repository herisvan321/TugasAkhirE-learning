@extends('dosen.home')
@section('main')
      <!-- Breadcrumbs -->
      <ol class="breadcrumb ">
        <li class="breadcrumb-item">
          <a href="{{url('/homedosen')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item ">Pertemuan {{$pertemuan}}</li>
      </ol>
      <form action="{{url('/homedosen/proses/absen')}}" method="post" >
      {{csrf_field()}}
      <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fa fa-edit"></i> materi</button>
      <button type="button" data-toggle="modal" data-target="#myModalKuis"   class="btn btn-success"><i class="fa fa-edit"></i> kuis</button>
      @if($join2grup->type == 1)
      <button type="button" data-toggle="modal" data-target="#myModalCoding" class="btn btn-success"><i class="fa fa-code "></i> coding</button>
      @endif
      <input type="hidden" name="pertemuan" value="{{$pertemuan}}">
      <input type="hidden" name="id_group" value="{{$join2grup->id_group}}">
      @php($ab = DB::table('absens')->where('id_group',$join2grup->id_group)->where('pertemuan',$pertemuan)->first())
      @if(@count($ab) > 0)
        <button type="button" class="btn btn-primary disabled"><i class="fa fa-edit " ></i> Absen</button>
      @else
      <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Absen</button>
      @endif
      </form>
      <hr>
<div class="row">
 	<div class="col-lg-4 w3-animate-left">
 		<h4 class="w3-blue w3-padding">Materi & Coding :</h4>
    @if(@count($tmateri) > 0)
     <ul class="list-group">
        @foreach($tmateri as $t)
        @if($t->status == 1)
        <li class="list-group-item">
          <a href="#" title="">{{$t->judul}}</a>
           <i style="color:green;">Video</i>
        </li>
        @elseif($t->status == 2)
        <li class="list-group-item">
          <a href="#" title="">{{$t->judul}}</a>
          <i style="color:red;">Coding</i>
        </li>
        @else
        <li class="list-group-item">
          <a href="#" title="">{{$t->judul}}</a>
          <i style="color:blue;">File</i>
        </li>
        @endif
        @endforeach
      </ul> 
    @else
    <p align="center" class="w3-text-grey">Kosong...</p>
    @endif
 	</div>
 	<div class="col-lg-4 w3-animate-bottom">
 		<h4 class="w3-blue w3-padding">Kuis:</h4>
    @if(@count($tjkuis) > 0)
    <ul class="list-group">
      @foreach($tjkuis as $t)
        @if($t->jml_soal == 0)
        <li class="list-group-item w3-red">
          <a href="#" title="">{{$t->judul}}</a>
          <a href="{{url('homedosen/view/proses/masuk/group/'.$t->id_group.'/'.$t->noinduk.'/'.$t->pertemuan.'/'.$t->id_kuis)}}" title="" class=" btn btn-primary">lihat</a>
          <i>{{$t->waktu}} menit</i> 
        </li> 
        @else
        <li class="list-group-item">
          <a href="#" title="">{{$t->judul}}</a>
          <a href="{{url('homedosen/view/proses/masuk/group/'.$t->id_group.'/'.$t->noinduk.'/'.$t->pertemuan.'/'.$t->id_kuis)}}" title="" class=" btn btn-primary">lihat</a>
           <i>{{$t->waktu}} menit</i> 
        </li> 
        @endif
        @endforeach
    </ul> 
     @else
    <p align="center" class="w3-text-grey">Kosong...</p>
    @endif
 	</div>
  <div class="col-lg-4 w3-animate-right">
  @php($th = DB::table('tugas')->where('id_group',$join2grup->id_group)->where('pertemuan',$pertemuan)->get())
    <h4 class="w3-blue w3-padding">Tugas mahasiswa : </h4>
    @if(@count($th) > 0)
      <ul>
      @foreach($th as $t)
        <li><a href="{{asset('/upload/tugas/'.$t->upload)}}" download="{{asset('/upload/tugas/'.$t->upload)}}">{{$t->upload}}</a></li>
      @endforeach
      </ul>
    @else
    <p align="center" class="w3-text-grey">Kosong...</p>
    @endif
  </div>

 </div>
 @include('dosen.section.modal.modalcoding')
 @include('dosen.section.modal.modalkuis')
 @include('dosen.section.modal.modalmateri')
 

<script>
	function openCity(cityName) {
		var i;
		var x = document.getElementsByClassName("city");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		}
		document.getElementById(cityName).style.display = "block";  
	}
</script>
@endsection