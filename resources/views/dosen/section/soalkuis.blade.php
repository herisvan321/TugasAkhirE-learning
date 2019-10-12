@extends('dosen.home')
@section('main')
      <!-- Breadcrumbs -->
      <ol class="breadcrumb ">
        <li class="breadcrumb-item">
          <a href="{{url('/homedosen')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item ">Isi Soal</li>
      </ol>
@if($tbobot >= 100)
  <p>Bobot Telah Terpenuhi!</p>
@else
     <form action="{{url('/homedosen/proses/group/kuis')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">{{csrf_field()}}
     	<div class="form-group">
     	<label>Bobot :</label>
      		<table>
      			<tr><td><input type="number" name="bobot" class="form-control" placeholder="bobot yang tersisa : {{100 - $tbobot  }}" required></td></tr>
      		</table>
        </div>
        <input type="hidden" name="pertemuan" value="{{$pertemuan}}"><input type="hidden" name="id_user" value="{{$id_user}}"><input type="hidden" name="id_group" value="{{$id_group}}"><input type="hidden" name="id_kuis" value="{{$id_kuis}}">
     	<div class="form-group">
      	<textarea name="soal" class="ckeditor" id='ckeditor' required></textarea>
        </div>
        <div class="form-group">
      	<input type="submit" name="btnsoal" value="simpan" class="btn btn-primary">
        </div>
     </form>
@endif    
      <div class="row w3-margin-bottom ">
      	<div class="col-lg-9 w3-animate-bottom">
      		 <ul class="list-group">
      		 	@foreach($tsoal as $t)
				  <li class="list-group-item">
				  	<label>Soal : </label>
				  	<p>
				  		{!! $t->soal !!}
				  	</p>
				  	<label style="color:blue;">bobot : {{$t->bobot}}</label>
				  </li>
				@endforeach
			</ul> 
      	</div>
      	<div class="col-lg-3">
      			<h4 class="w3-padding w3-center w3-blue">yang telah ujian</h4>
      			   <ul class="list-group">
            @foreach($joinbiodata as $s)
					  <li class="list-group-item"><a href="{{url('/homedosen/proses/view/jawaban/'.$s->noinduk.'/'.$s->id_kuis.'/kuis')}}">{{$s->namadepan}}</a></li>
					  @endforeach
					</ul> 
      	</div>	
      </div>	

@endsection