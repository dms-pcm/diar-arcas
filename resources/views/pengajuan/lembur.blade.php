@extends('layout.app') @section('content')

<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row"></div>
		<div class="content-body">

			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="card">
						<div class="card-header d-flex align-items-center">
							<div class="d-flex align-items-start flex-column">
								<h3 class="card-title mr-2">Pengajuan Lembur</h3>
								<a href="#" class="btn btn-blue btn-sm mt-1" title="" data-toggle="modal" data-target="#tambah_lembur">Ajukan Lembur</a>
							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body">

								<table class="table table-striped table-bordered w-100" id="tb-lembur">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Karyawan</th>
											<th>Tgl. Lembur</th>
											<th>Durasi Lembur</th>
											<th>Selesai Lembur</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									{{--<tbody>
										<tr>
											<td>1</td>
											<td>Tiger Nixon</td>
											<td></td>
											<td></td>
											<td></td>
											<td>
												<p class="badge badge-success round">Disetujui</p>
												<p class="badge badge-danger round">Ditolak</p>
												<p class="badge badge-warning round">Menunggu</p>
											</td>
											<td>
												<a href="#" title="" class="btn btn-sm btn-cyan text-white" data-toggle="modal" data-target="#view">
													<i class="fa fa-eye" aria-hidden="true"></i>
												</a>
													<!-- <a href="#" title="" class="btn btn-sm btn-success text-white" data-toggle="modal" data-target="#edit">
														<i class="fa fa-edit" aria-hidden="true"></i>
													</a>
													<a href="#" title="" class="btn btn-sm btn-danger text-white" id="hapus-data">
														<i class="fa fa-trash" aria-hidden="true"></i>
													</a> -->

												</td>
											</tr>
										</tbody>--}}
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
	<div class="modal animated zoomIn text-left" id="viewlembur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
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
							<table  class="w-100">
								<tbody>
									<tr>
										<td><p>Nama Karyawan</p></td>
										<td><p id="nama">-</p></td>
									</tr>
									<tr>
										<td><p>Jabatan</p></td>
										<td><p id="jabatan">-</p></td>
									</tr>
									<tr>
										<td><p>Tanggal Lembur</p></td>
										<td><p id="tgl_izin">-</p></td>
									</tr>
									<tr>
										<td><p>Durasi Lembur</p></td>
										<td><p id="durasi">-</p></td>
									</tr>
									<tr>
										<td><p>Selesai Lembur</p></td>
										<td><p id="selesai">-</p></td>
									</tr>
									<tr>
										<td><p>Status</p></td>
										<td>
											<span id="status">
												{{--<p class="badge badge-success round">Disetujui</p>
												<p class="badge badge-danger round">Ditolak</p>
												<p class="badge badge-warning round">Menunggu</p>--}}
											</span>
										</td>
									</tr>
									<tr>
										<td><p>Alasan</p></td>
										<td>
											<p id="alasan">-</p>
										</td>
									</tr>
								</tbody>
							</table>	
							
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


	<!-- Modal tambah -->
	<div class="modal animated zoomIn text-left" id="tambah_lembur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
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

											<select id="nama_karyawan" class="hide-search form-control">
												{{--<option value="">One</option>
												<option value="">Two</option>
												<option value="">Three</option>
												<option value="">Four</option>
												<option value="">Five</option>
												<option value="">Six</option>
												<option value="">Seven</option>
												<option value="">Eight</option>
												<option value="">Nine</option>
												<option value="">Ten</option>--}}
											</select>
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="projectinput1">Jabatan Karyawan</label>
										<input type="text" id="jabatan" class="form-control" placeholder="Masukkan Jabatan Karyawan">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="projectinput3">Tanggal Lembur</label>
										<input type="text" class="form-control tgl-izin" id="animate" placeholder="Masukkan Tanggal Lembur">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="projectinput4">Durasi Lembur <small class="text-danger">(Contoh: 1 jam)</small></label>
										<input type="text" id="lama_lembur" class="form-control" placeholder="Masukkan Durasi Lembur" name="phone">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="projectinput4">Selesai Lembur</label>
										<input type="text" class="form-control" id="timeformat" placeholder="Masukkan Waktu Selesai Lembur">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Deskripsi</label>
										<textarea id="alasan" class="form-control" placeholder="Masukkan Deskripsi Lembur"></textarea>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-outline-success" onclick="simpanLembur()">Simpan</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal tambah-->
	<script src="{{asset('assets/extends/page/pengajuan/lembur.js')}}"></script>
	<!-- ////////////////////////////////////////////////////////////////////////////-->
	@endsection