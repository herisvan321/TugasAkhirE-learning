<div class="modal fade" id="myModalKuis" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header w3-blue">
				<h4 class="modal-title">Kuis</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="{{url('/homedosen/proses/group/kuis')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">{{csrf_field()}}
					<div class="form-group">
				 		<label>Judul Kuis:</label>
						<input type="text" name="judul" placeholder="Enter judul" class="form-control" required>
						<input type="hidden" name="pertemuan" value="{{$pertemuan}}"><input type="hidden" name="id_user" value="{{$join2grup->noinduk}}"><input type="hidden" name="id_group" value="{{$join2grup->id_group}}"><input type="hidden" name="id_pertemuan" value="{{$cpertemuan->id_pertemuan}}">
					</div>
					<div class="form-group">
						<label>Waktu :</label>
						<select name="waktu"  class="form-control">
						  <option value="" disabled selected>Silahkan Pilih!</option>
						  <option value="30">30 Menit</option>
						  <option value="60">60 Menit</option>
						  <option value="90">90 Menit</option>
						  <option value="120">120 Menit</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" name="btnkuis" class="btn btn-primary">
					</div>
				</form> 
				</div>
			<div class="modal-footer w3-blue">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</div>

