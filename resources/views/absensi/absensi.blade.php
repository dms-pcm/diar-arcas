@extends('layout.app') @section('content')

<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row"></div>
		<div class="content-body">

			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="card">
						<div class="card-header d-flex align-items-center">
							<div class="box-head-absensi w-100">
								<h1 class="card-title">Riwayat Absen</h1>
								<div class="box-filter d-flex">
									<div class="d-flex align-items-center w-100">
										<span class="month">Bulan</span>
										<!-- <select class="select2 form-control " style="width: 100%">
											<option value="AK">-- Pilih Bulan --</option>
											<option value="HI">Hawaii</option>
										</select> -->
										<input type="text" id="monthpicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#monthpicker" autocomplete="off" />
									</div>
									<div class="d-flex align-items-center w-100">
										<span class="year">Tahun</span>
										<!-- <select class="select2 form-control"  style="width: 100%">
											<option value="AK">-- Pilih Tahun --</option>
											<option value="HI">Hawaii</option>
										</select> -->
										<input type="text" id="yearpicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#yearpicker" autocomplete="off" />
									</div>
									<button type="button" id="show" class="btn btn-blue btn-sm">Tampilkan</button>
								</div>
							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body">
								<div id="initial">
									<h1>Silahkan pilih bulan dan tahun terlebih dahulu</h1>
								</div>
								<div id="nothing">

								</div>

								<table class="table table-striped table-bordered w-100" id="absensi-table">
									<thead>
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>Nama Karyawan</th>
											<th>Jam Absen</th>
											<th>Status</th>
											<th>Keterangan</th>

										</tr>
									</thead>
									{{--<tbody>
										<tr>
											<td>1</td>
											<td>11-10-2022</td>
											<td></td>
											<td>manajer</td>
											<td></td>
											
											<td></td>
											<td>
												<p class="badge badge-success round">Sangat baik</p>
												<p class="badge bg-blue badge-blue round">Baik</p>
												<p class="badge badge-warning round">Kurang</p>
												<p class="badge badge-danger round">Tidak Masuk</p>
											</td>

										</tr>
									</tbody>--}}
								</table>

								<div class="row justify-content-center w-100" id="row_jumlah">
									<div class="col-6 col-sm-3 col-xl-3 col-lg-3 col-md-3">
										<label>
											Hadir : <span class="badge bg-teal bg-accent-4 badge-pill text-white" id="hadir">0</span>
										</label>
									</div>
									<div class="col-6 col-sm-3 col-xl-3 col-lg-3 col-md-3">
										<label>
											Telat : <span class="badge bg-red badge-pill text-white" id="telat">0</span>
										</label>
									</div>
									<div class="col-6 col-sm-3 col-xl-3 col-lg-3 col-md-3">
										<label>
											Izin Sakit : <span class="badge bg-amber badge-pill text-white">0</span>
										</label>
									</div>
									<div class="col-6 col-sm-3 col-xl-3 col-lg-3 col-md-3">
										<label>
											Izin Lainnya : <span class="badge bg-purple bg-darken-1 badge-pill text-white">0</span>
										</label>
									</div>
								</div>
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
								<p>Selesai</p>
								<p>Alasan</p>
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

<!-- Modal tambah -->
<div class="modal animated zoomIn text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel69">Ajukan Izin</h4>
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
										<!-- <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected" name="traditional[single]">
											<option>Amsterdam</option>
											<option>Antwerp</option>

										</select> -->
										<input type="text" name="" class="form-control" value>
									</div>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="projectinput1">Jabatan Karyawan</label>
									<div class="wrapper">
										<!-- <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected" name="traditional[single]">
											<option>Amsterdam</option>
											<option>Antwerp</option>
											
										</select> -->
										<input type="text" name="" class="form-control" value>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="projectinput3">Tanggal Izin</label>
									<input type="text" class="form-control" id="animate" placeholder="Tanggal Izin">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="projectinput4">Durasi Izin</label>
									<input type="text" id="projectinput4" class="form-control" placeholder="2 hari" name="phone">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Alasan</label>
									<textarea name="" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-success">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal tambah-->
<script src="{{asset('assets/extends/page/absensi.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection