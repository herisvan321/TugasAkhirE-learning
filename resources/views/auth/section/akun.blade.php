@extends('auth.home')
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
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{url('/homeadmin')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Setting Akun</li>
</ol>
@include('auth.pesan.akun.gagal')
@include('auth.pesan.akun.sukses')
<div class="card mb-3 w3-animate-top">
	<div class="card-header w3-blue">
		<i class="fa fa-table"></i>
		Setting Akun
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form action="{{url('/homeadmin/update/akun/'.Auth::user()->noinduk)}}" method="post" accept-charset="utf-8">
				{{csrf_field()}} {{method_field('PUT')}}
				<div class="form-group">
					<label for="usr">Nama:</label>
					<input type="text" class="form-control" name="name" id="usr" required value="{{Auth::user()->nama_user}}">
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" name="password"  class="form-control" id="pwd" placeholder="Enter Password!">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Update">
				</div> 
			</form>
		</div>
	</div>
</div>

<div class="card mb-3 w3-animate-bottom">
	<div class="card-header w3-blue">
		<i class="fa fa-table"></i>
		Update Foto
	</div>
	<div class="card-body">
		<div class="table-responsive" >
			<form action="{{url('/homeadmin/akun/foto')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					@if(@count($tampilfoto) > 0)
					<img id="preview" src="{{asset('/upload/admin/'.$tampilfoto->foto)}}" alt="" style="width:200px;height:200px;"  class="img-thumbnail" /> <br>
					@else
					<img id="preview" src="/imgHome/img_avatar2.png" alt="" style="width:200px;height:200px;"  class="img-thumbnail" /> <br>
					@endif	
				</div>
				<div class="form-group">
					<label for="klik" class="btn btn-info" style="margin-top:7px;">pilih</label>
					<input type="file" name="foto" class="form-control" accept="image/*"  onchange="tampilkanPreview(this,'preview')" style="display:none;"  id="klik">
					<input type="submit" class="btn btn-primary" value="Update">
				</div> 
			</form>
		</div>
	</div>
</div>
@endsection