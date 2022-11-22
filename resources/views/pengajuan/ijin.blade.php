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
								<h1 class="card-title mr-2">Pengajuan Izin Karyawan</h1>
								<a href="#" class="btn btn-blue btn-sm mt-1" title="" data-toggle="modal" data-target="#tambah_izin">Ajukan Izin</a>
							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body">
								<table class="table table-striped table-bordered w-100" id="tb-ijin">
									<thead>
										<tr>
										<th>No</th>
										<th>Nama Karyawan</th>
										<th>Jabatan</th>
										<th>Tgl. Izin</th>
										<th>Durasi Izin</th>
										<th>Status</th>
										<th>Aksi</th>
										</tr>
									</thead>
									{{--<tbody>
										<tr>
										<td>1</td>
										<td>Tiger Nixon</td>
										<td>manajer</td>
										<td>11-10-2022</td>
										<td>2 hari</td>
										<td>
											<p class="badge badge-success round">Disetujui</p>
											<p class="badge badge-danger round">Ditolak</p>
											<p class="badge badge-warning round">Menunggu</p>
										</td>
										<td>
											<a href="#" title="" class="btn btn-sm btn-cyan text-white" onclick="viewPengajuan()">
												<i class="fa fa-eye" aria-hidden="true"></i>
											</a>
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
<div class="modal animated zoomIn text-left" id="viewpengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel69">Detail Data Izin</h4>
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
								<p>Tanggal Izin</p>
								<p>Durasi Izin</p>
								<p>Status</p>
								<p>Alasan</p>
							</div>
							<div class="col-xl-8 col-lg-12 col-md-12">
								<p id="nama_karyawan">-</p>
								<p id="jabatan">-</p>
								<p id="tgl_izin">-</p>
								<p id="durasi">-</p>
								<p id="status">
									{{--<p class="badge badge-success round">Disetujui</p>
									<p class="badge badge-danger round">Ditolak</p>
									<p class="badge badge-warning round">Menunggu</p>--}}
								</p>
								<p id="alasan">-</p>
								<p id="bukti_surat"></p>
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
<!-- Modal tambah -->
<div class="modal animated zoomIn text-left" id="tambah_izin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel69">Ajukan Izin</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form" enctype="multipart/form-data" id="data_izin">
					@csrf
					<div class="form-body">
						<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="projectinput1">Nama Karyawan</label>
							<div class="wrapper">
								<input type="text" id="nama" class="form-control">
							</div>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="projectinput1">Jabatan Karyawan</label>
							<div class="wrapper">
								<!-- <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected" name="traditional[single]"><option>Amsterdam</option><option>Antwerp</option></select> -->
								<input type="text" id="jabatan" class="form-control">
							</div>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="projectinput1">Jenis Izin</label>
							<div class="wrapper">
								<select id="jenis_izin" class="form-control" onchange="showDiv(this)">
									<option value="0">Lainnya</option>
									<option value="1">Sakit</option>
								</select>
							</div>
							</div>
						</div>
						</div>
						<div class="row" id="sakit" style="display: none;">
							<div class="col-md-4">
								<div class="form-group">
									<label for="projectinput1">Upload Surat Dokter</label>
									<div class="wrapper">
										<input class="d-none" type="file" id="surat_dokter">
										<label class="mb-0 w-100 d-flex align-items-center btn btn-blue font-weight-bold justify-content-center" style="cursor: pointer;" for="surat_dokter">
										<i class='fa fa-edit'></i> &nbsp;Pilih File
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<img src="{{asset('assets/img/no_image.png')}}" alt="" class="img-fluid" id="surat_preview">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label for="projectinput3">Tanggal Izin</label>
								<input type="text" class="form-control" id="animate" data-dd-opt-format="mm" placeholder="Tanggal Izin">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label for="projectinput4">Durasi Izin</label>
								<input type="text" id="durasi_izin" class="form-control" placeholder="1 Jam" name="phone">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="">Alasan</label>
								<textarea id="alasan" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-success" onclick="simpanIzin()">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal tambah-->

<!-- Modal edit -->
<div class="modal animated zoomIn text-left" id="edit_izin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel69">Ajukan Izin</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form" enctype="multipart/form-data" id="data_edit">
					@csrf
					<div class="form-body">
						<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="projectinput1">Nama Karyawan</label>
							<div class="wrapper">
								<input type="text" id="nama" class="form-control">
							</div>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="projectinput1">Jabatan Karyawan</label>
							<div class="wrapper">
								<!-- <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected" name="traditional[single]"><option>Amsterdam</option><option>Antwerp</option></select> -->
								<input type="text" id="jabatan" class="form-control">
							</div>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="projectinput1">Jenis Izin</label>
							<div class="wrapper">
								<select id="jenis_izin" class="form-control">
									<option value="1">Sakit</option>
								</select>
							</div>
							</div>
						</div>
						</div>
						<div class="row" id="wk">
							<div class="col-md-4">
								<div class="form-group">
									<label for="projectinput1">Upload Surat Dokter</label>
									<div class="wrapper">
										<input class="d-none" type="file" id="surat_edit">
										<label class="mb-0 w-100 d-flex align-items-center btn btn-blue font-weight-bold justify-content-center" style="cursor: pointer;" for="surat_edit">
										<i class='fa fa-edit'></i> &nbsp;Pilih File
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<img src="{{asset('assets/img/no_image.png')}}" alt="" class="img-fluid" id="surat_preview_edit">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label for="projectinput3">Tanggal Izin</label>
								<input type="text" class="form-control" id="animate" data-dd-opt-format="mm" placeholder="Tanggal Izin">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label for="projectinput4">Durasi Izin</label>
								<input type="text" id="durasi_izin" class="form-control" placeholder="1 Jam" name="phone">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="">Alasan</label>
								<textarea id="alasan" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-success" onclick="ajaxEdit()">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- End modal edit -->
<script src="{{asset('assets/extends/page/pengajuan/ijin.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////--> @endsection