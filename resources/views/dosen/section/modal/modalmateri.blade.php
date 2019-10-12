<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header w3-blue">
				<h4 class="modal-title">Materi</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="w3-bar w3-blue">
					<button class="w3-bar-item w3-button" onclick="openCity('London')">File</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Paris')">Video</button>
				</div>
				<form action="{{url('/homedosen/proses/group/materi')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">{{csrf_field()}}
				<div id="London" class="w3-container city">
					<h2>Materi File</h2>
					<div class="form-group">
						<label>Judul :</label>
						<input type="text" name="judul" placeholder="Enter judul" class="form-control" required>
						<input type="hidden" name="pertemuan" value="{{$pertemuan}}"><input type="hidden" name="id_user" value="{{$join2grup->noinduk}}"><input type="hidden" name="id_group" value="{{$join2grup->id_group}}">
					</div>
					<div class="form-group">
						<label>Deskripsi :</label>
						<textarea name="deskripsi" rows="10" class="form-control" placeholder="Maksimal 255 karakter" required maxlength="255"></textarea>
					</div>
					<div class="form-group">
						<label>Upload :</label>
						<input type="file" name="file" class="form-control" required>
						<input type="hidden" name="id_pertemuan" value="{{$cpertemuan->id_pertemuan}}">
					</div>
					<div class="form-group">
						<input type="submit" name="btnfile" class="btn btn-primary">
					</div>
				</form> 
				</div>
				<form action="{{url('/homedosen/proses/group/materi')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">{{csrf_field()}}
				<div id="Paris" class="w3-container city" style="display:none">
					<h2>Materi Video</h2>
					<div class="form-group">
						<label>Judul :</label>
						<input type="text" name="judul" placeholder="Enter judul" class="form-control" required>
						<input type="hidden" name="pertemuan" value="{{$pertemuan}}"><input type="hidden" name="id_user" value="{{$join2grup->noinduk}}"><input type="hidden" name="id_group" value="{{$join2grup->id_group}}"><input type="hidden" name="id_pertemuan" value="{{$cpertemuan->id_pertemuan}}">
					</div>
					<div class="form-group">
						<label>Deskripsi :</label>
						<textarea name="deskripsi" rows="10" class="form-control" placeholder="Maximal 255 karakter" required maxlength="255"></textarea>
					</div>
					<div class="form-group">
						<label>Upload :</label>
						<input type="file" name="file" class="form-control" required accept="video/*">
					</div>
					<div class="form-group">
						<input type="submit" name="btnvideo" class="btn btn-primary">
					</div>
				</form> 
				</div>
			</div>
			<div class="modal-footer w3-blue">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</div>
