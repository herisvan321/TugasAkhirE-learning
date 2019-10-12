@extends('dosen.home')
@section('main')
<script>
	function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
var gb = gambar.files;

//                loop untuk merender gambar
for (var i = 0; i < gb.length; i++){
//                    bikin variabel
var gbPreview = gb[i];
var imageType = /image.*/;
var preview=document.getElementById(idpreview);            
var reader = new FileReader();

if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
preview.file = gbPreview;
reader.onload = (function(element) { 
	return function(e) { 
		element.src = e.target.result; 
	}; 
})(preview);

    //                    membaca data URL gambar
    reader.readAsDataURL(gbPreview);
}else{
//                        jika tipe data tidak sesuai
alert("Type file tidak sesuai. Khusus image.");
}

}    
}
</script>
<!-- Breadcrumbs -->
<ol class="breadcrumb ">
	<li class="breadcrumb-item">
		<a href="{{url('/homedosen')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item ">Setting Akun</li>
</ol>
@include('dosen.pesan.gagal')
@include('dosen.pesan.sukses')
<div class="row">
	<div class="col-sm-6">
		<div class="w3-padding w3-light-grey w3-round w3-animate-left w3-margin-bottom">
		<label>Update Biodata</label> <hr>
			<form action="{{url('/homedosen/proses/setting/update')}}" method="post">{{csrf_field()}}
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							<label for="exampleInputName">Nama Depan</label>
							<input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="namadepan" value="{{ $user->namadepan}}" depan" required>
						</div>
						<div class="col-md-6">
							<label for="exampleInputLastName">Nama Belakang</label>
							@if($user->namabelakang == 'kosong')
							<input type="text" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" name="namabelakang" >
							@else
							<input type="text" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" value="{{$user->namabelakang}}" name="namabelakang" >
							@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">No Induk</label>
					<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->noinduk}}" name="id" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}" name="email" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label><br>
					@if($user->jenkel == 'L')
					<input type="radio" name="jenkel" value="L" id="l" checked><label for="l">Laki-laki</label>
					<input type="radio" name="jenkel" value="P" id="p"><label for="p">Perempuan</label>
					@elseif($user->jenkel == 'P')
					<input type="radio" name="jenkel" value="L" id="l"><label for="l">Laki-laki</label>
					<input type="radio" name="jenkel" value="P" id="p" checked><label for="p">Perempuan</label>
					@endif
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">Tempat/tangal lahir</label>
							<table>
								<tr>
									<td><input type="text" class="form-control" name="tempat" value="{{$user->tempat}}" required></td>
									<td>
										<input type="text" name="tgl_lahir" class="form-control datepicker" 
										value="{{$user->tgl_lahir}}">
									</td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<label for="exampleConfirmPassword">No HP</label>
							<input type="number" class="form-control" id="exampleConfirmPassword" value="{{$user->nohp}}" name="nohp">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Alamat</label>
					<textarea name="alamat" placeholder="Enter alamat" class="form-control">{{$user->alamat}}</textarea>
				</div>
				<button class="btn btn-primary btn-block" name="biodata" type="submit">Submit </button>
			</form>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="col-sm-12">
			<div class="w3-padding w3-light-grey w3-round w3-animate-right">
				<form action="{{url('/homedosen/proses/setting/update')}}" method="post">{{csrf_field()}}
					<label>Update Password</label> <hr>
					<div class="form-group">
						<input type="password" class="form-control" name="password"  placeholder="password" required>
					<input type="hidden" value="{{$user->id}}" name="id" >	
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block" name="pass" value="Submit">
					</div>
				</form>
			</div>

		</div>
		<div class="col-sm-12">
			<div class="w3-padding w3-light-grey w3-round w3-animate-bottom w3-margin-top" >
		<label>Update Foto</label> <hr>
				<form action="{{url('/homedosen/proses/setting/update')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<input type="hidden" value="{{$user->id}}" name="id" >
					{{csrf_field()}}
					<div class="form-group">
						@if(($user->jenkel == 'L') && ($user->foto == 'foto'))
						<img id="preview" src="/imgHome/img_avatar3.png" alt="" style="width:200px;height:200px;"  class="img-thumbnail" /> 

						@elseif(($user->jenkel == 'P') && ($user->foto == 'foto'))
							<img id="preview" src="/imgHome/img_avatar2.png" alt="" style="width:200px;height:200px;"  class="img-thumbnail" /> 
						@else
						<img id="preview" src="{{asset('/upload/home/'.$user->foto)}}" alt="" style="width:200px;height:200px;"  class="img-thumbnail" /> 
						@endif
						<br>

					</div>
					<div class="form-group">
						<label for="klik" class="btn btn-info" style="margin-top:7px;">pilih</label>
						<input type="file" name="foto" class="form-control" accept="image/*"  onchange="tampilkanPreview(this,'preview')" style="display:none;"  id="klik">
						<input type="submit" class="btn btn-primary" name="foto" value="Update">
					</div> 
				</form>
			</div>

		</div>
	</div>
</div>
@endsection