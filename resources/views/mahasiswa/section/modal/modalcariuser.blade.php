<div class="modal fade" id="myModaluser" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header w3-blue">
				<h4 class="modal-title">Cari User</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-inline my-2 my-lg-0 mr-lg-2" action="{{url('/homemahasiswa/cariuser')}}" method="get">
					{{csrf_field()}}
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search for..." name="cari" required>
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
			</div>
			<div class="modal-footer w3-blue">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>