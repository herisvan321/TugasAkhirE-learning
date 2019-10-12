@extends('dosen.home')
@section('main')
<style type="text/css" media="screen">
	.btn{
		border: none;
		border-radius: 0;
	}
</style>
<!-- Breadcrumbs -->
<ol class="breadcrumb ">
	<li class="breadcrumb-item">
		<a href="{{url('/homedosen')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item ">Home Group</li>
</ol>
<div class="form-group w3-padding w3-light-grey w3-animate-zoom">
	Nama Group : {{$cekgroup->judul}}<br>
	ID Group : <span class="w3-green">{{$cekgroup->id_group}}</span>
	<br>
	Deskripsi : {{$cekgroup->deskripsi}}
</div>
<div class="row">
	<div class="col-sm-9">
	<div class="w3-card" style="padding:10px;">
	<form  action="{{url('homemahasiswa/save/posting')}}" method="post">
	 {{csrf_field()}}
    <input type="text" class="form-control"  placeholder="Apa yang anda pikirkan?" name="posting" style="margin-bottom:5px;" required>
    <input type="hidden" name="id_group" value="{{$cekgroup->id_group}}" >
    <button type="submit" class="btn btn-primary">posting</button>
  </form>  
	 </div><br>
	 <div id="posting">
     @foreach($posting as $t)
	 	@php($nama = DB::table('biodatas')->where('noinduk',$t->noinduk)->first())
	 	@php($foto = DB::table('fotos')->where('noinduk',$t->noinduk)->first())
         <div class="w3-container w3-card w3-white w3-round w3-margin-bottom"><br>
         @if(($nama->jenkel == 'P') && ($foto->foto == 'foto'))
        <img src="/imgHome/img_avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
        @elseif(($nama->jenkel == 'L') && ($foto->foto == 'foto'))
         <img src="/imgHome/img_avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
        @else
        <img src="{{ asset('/upload/home/'.$foto->foto) }}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
        @endif
        <span class="w3-right w3-opacity">{{date('d-m-Y',strtotime($t->created_at))}}</span>
        
        <h4>@if($nama->namabelakang == 'kosong')
        {{$nama->namadepan}}
        @else
        {{$nama->namadepan.' '.$nama->namabelakang}}
        @endif
        </h4><br>
        <hr class="w3-clear">
        <p>{{$t->isi_posting}}</p>
        <!--<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> -->
      </div>
      @endforeach
	 </div>

	</div>
	<div class="col-sm-3 w3-animate-right">
		<div class="form-group">
		<lable>Aktifkan pertemuan :</label>
		<form action="{{url('/homedosen/view/proses/group/aktifpertemuan')}}" method="post" accept-charset="utf-8">{{csrf_field()}}
			<table>
				<td>
					<select name="pilih" class="form-control">
					@foreach($join2grup as $j)
						@if($j->status == '1')

						@else
						<option value="{{$j->pertemuan}}">pertemuan ke {{$j->pertemuan}}</option>
						@endif
					@endforeach
					</select>
					<input type="hidden" name="id_group" value="{{$cekgroup->id_group}}">
				</td>
				<td>
					<button class="btn btn-primary" type="submit"><i class="fa fa-send-o "></i></button>
				</td>
			</table>
		</form>
		</div>
		<div class="panel-group w3-margin-bottom" id="accordion">
			@foreach($join2grup as $j)
			<div class="panel panel-default">
				<div class="panel-heading">
					@if($j->status == '1')
					<a  href="{{url('/homedosen/view/proses/masuk/group/'.$j->slug.'/'.$j->pertemuan)}}"  class="btn btn-primary btn-block">
					Pertemuan {{$j->pertemuan}}</a>
					</div>
					@else
					<a href="#"  class="btn w3-light-grey btn-block">
					Pertemuan {{$j->pertemuan}}</a>
					</div>
					@endif		
					
					</div>
			@endforeach
								</div> 
							</div>
						</div> 
						@endsection