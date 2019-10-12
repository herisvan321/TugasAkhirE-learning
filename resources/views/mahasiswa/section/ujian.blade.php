@extends('mahasiswa.home')
@section('main')
@include('mahasiswa.pesan.gagal')
@include('mahasiswa.pesan.sukses')
<span class="form-control" >
	<span>Selamat Ujian!!!</span>
	<p class="w3-right">waktu : <span id="demo"></span></p>
</span>
<br>
<div class="form-group">
	<div class="container">
	@php($no=1)
	<form action="{{'/homemahasiswa/proses/kuis/save'}}" method="post" accept-charset="utf-8" id="selesai">{{csrf_field()}}
	<table>
		<tr>
	 		<td style="width:30px"><b>No</b></td>
	 		<td><b>Soal</b></td>
	 	</tr>
	 @foreach($kuis as $ku)
	 	<tr>
	 		<td valign="top">{{$no++}}</td>
	 		<td width="100%">{!! $ku->soal !!}
	 		<input type="hidden" name="id_kuis" value="{{$ku->id_kuis}}" >
	 		<input type="hidden" name="id_soal[]" value="{{$ku->id}}" >
	 		<input type="hidden" name="bobot[]" value="{{$ku->bobot}}" ><input type="hidden" name="pertemuan" value="{{$ku->pertemuan}}" >
	 		<input type="hidden" name="id_group" value="{{$ku->id_group}}" >
	 		<input type="hidden" name="soal[]" value="{{$ku->soal}}" >
	 		</td>
	 	</tr>
	 	<tr>
	 		<td valign="top"></td>
	 		<td><b>Jawaban :</b></td>
	 	</tr>
	 	<tr>
	 		<td valign="top"></td>
	 		<td><textarea name="jawaban[]" class="ckeditor" id="ckeditor"></textarea> <hr></td>
	 	</tr>

	 @endforeach
	 <tr>
	 <td></td>
	 	<td>
	 		<input type="submit" class="btn btn-primary" value="simpan" >
	 	</td>
	 </tr>
	 </table>
	 </form>
	</div>
</div>
<script> 
// Set the date we're counting down to
var countDownDate = new Date("{{ $tanggal }} {{$cekkuis->waktu}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML =   hours + "jam "
  + minutes + "menit " + seconds + "detik ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "waktu habis";
    document.getElementById('selesai').submit();
  }
}, 1000);
</script>
@endsection