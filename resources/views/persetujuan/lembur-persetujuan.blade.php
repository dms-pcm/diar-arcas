@extends('layout.app') @section('content')

<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row"></div>
		<div class="content-body">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="card">
						<div class="card-header d-flex align-items-center">
							<div class="d-flex align-items-center">
								<h3 class="card-title mr-2">Persetujuan Lembur Karyawan</h3>

							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body">

								<table class="table table-striped table-bordered zero-configuration w-100">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Karyawan</th>
											<th>Tgl Lembur</th>
											<th>Lama Lembur</th>
											<th>Status</th>
											<th>Aksi</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Tiger Nixon</td>
											<td></td>
											<td></td>												<td>
												<p class="badge badge-success round">Disetujui</p>
												<p class="badge badge-danger round">Ditolak</p>
												<p class="badge badge-warning round">Menunggu</p>
											</td>
											<td>
												<a href="#" title="" class="btn btn-sm btn-cyan text-white" data-toggle="modal" data-target="#viewpengajuan">
													<i class="fa fa-eye" aria-hidden="true"></i>
												</a>
													<!-- <div class="d-flex">
														<a href="#" title="" class="btn btn-sm btn-success text-white mr-1" data-toggle="modal" data-target="#edit" id="setuju-lembur">
															<i class="fa fa-check" aria-hidden="true"></i>
														</a>
														<a href="#" title="" class="btn btn-sm btn-danger text-white" id="hapus-data" id="tolak-lembur">
															<i class="fa fa-times" aria-hidden="true"></i>
														</a>
													</div> -->
												</td>

											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal view -->
	<div class="modal animated zoomIn text-left" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel69">Detail Data Lembur Karyawan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card bg-grey bg-lighten-4">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4 col-lg-12 col-md-12">
									<p>Nama Karyawan</p>
									<p>Jabatan</p>
									<p>Tanggal lembur</p>
									<p>Lama Lembur</p>
									<p>Selesai</p>
									<p>Deskripsi</p>
								</div>
								<div class="col-xl-8 col-lg-12 col-md-12">
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal view-->

	<!-- Modal view pengajuan -->
	<div class="modal animated zoomIn text-left" id="viewpengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel69">Detail Persetujuan Lembur Karyawan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card bg-grey bg-lighten-4">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4 col-lg-12 col-md-12">
									<p>Nama Karyawan</p>
									<p>Jabatan</p>
									<p>Tanggal lembur</p>
									<p>Lama Lembur</p>
									<p>Selesai</p>
									<p>Status</p>
									<p>Deskripsi</p>
								</div>
								<div class="col-xl-8 col-lg-12 col-md-12">
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; Handoko</p>
									<p>:&nbsp; 
										<span class="badge badge-success round">Disetujui</span>
										<span class="badge badge-danger round">Ditolak</span>
										<span class="badge badge-warning round">Menunggu</span>
									</p>
									<p>:&nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="row justify-content-center	">
								
								<a href="#" title="" class="btn btn-danger mr-1 text-white" id="tolak-lembur">
									<span>Tolak <i class="fa fa-times" aria-hidden="true"></i></span>
								</a>
								<a href="#" title="" class="btn btn-success text-white mr-1" data-toggle="modal" data-target="#edit" id="setuju-lembur">
									<span>Setuju <i class="fa fa-check" aria-hidden="true"></i></span>
								</a>

							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal view pengajuan-->


	<!-- Modal tambah -->
	<div class="modal animated zoomIn text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel69">Tambah Data Lembur Karyawan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form">
						<div class="form-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="projectinput1">Nama Karyawan</label>
										<div class="wrapper">
											<select name="" id="" class="custom-select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
												<option value="">One</option>
												<option value="">Two</option>
												<option value="">Three</option>
												<option value="">Four</option>
												<option value="">Five</option>
												<option value="">Six</option>
												<option value="">Seven</option>
												<option value="">Eight</option>
												<option value="">Nine</option>
												<option value="">Ten</option>
											</select></div>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Jabatan Karyawan</label>
											<div class="wrapper">
												<select name="" id="" class="custom-select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
													<option value="">One</option>
													<option value="">Two</option>
													<option value="">Three</option>
													<option value="">Four</option>
													<option value="">Five</option>
													<option value="">Six</option>
													<option value="">Seven</option>
													<option value="">Eight</option>
													<option value="">Nine</option>
													<option value="">Ten</option>
												</select></div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="projectinput3">Tanggal Lembur</label>
												<input type="text" class="form-control" id="animate" placeholder="Tanggal Lembur">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="projectinput4">Lama Lembur</label>
												<input type="text" id="projectinput4" class="form-control" placeholder="1 Jam" name="phone">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="projectinput4">Selesai</label>
												<input type="text" class="form-control" id="time_init_animation" placeholder="Selesai Lembur">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="">Deskripsi</label>
												input
												<textarea name="" class="form-control"></textarea>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-outline-success">Save changes</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal tambah-->
			<script src="{{asset('assets/extends/page/persetujuan/persetujuan-lembur.js')}}"></script>
			<!-- ////////////////////////////////////////////////////////////////////////////-->
			@endsection