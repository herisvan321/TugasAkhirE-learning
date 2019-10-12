<div class="modal fade" id="myModalCoding" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header w3-blue">
				<h4 class="modal-title">Coding</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="{{url('/homedosen/proses/group/materi')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">{{csrf_field()}}
					<div class="form-group">
						<label>Judul :</label>
						<input type="text" name="judul" placeholder="Enter judul" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Deskripsi :</label>
						<textarea name="deskripsi" rows="4" class="form-control" placeholder="Enter Deskripsi" required></textarea>
						<input type="hidden" name="pertemuan" value="{{$pertemuan}}"><input type="hidden" name="id_user" value="{{$join2grup->noinduk}}"><input type="hidden" name="id_group" value="{{$join2grup->id_group}}">
						<input type="hidden" name="id_pertemuan" value="{{$cpertemuan->id_pertemuan}}">
					</div>
					<div class="form-group">
						<label>Coding :</label> <br>
						<textarea placeholder="Enter Coding" name="coding" rows="20" required class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="btncoding" class="btn btn-primary">
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

