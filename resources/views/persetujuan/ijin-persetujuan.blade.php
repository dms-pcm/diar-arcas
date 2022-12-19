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
								<h3 class="card-title mr-2">Persetujuan Izin Karyawan</h3>

							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body">

								<table class="table table-striped table-bordered w-100" id="tb-persetujuan">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Karyawan</th>
											<th>Jabatan</th>
											<th>Tgl. Izin</th>
											<th>Durasi Izin</th>
											<th>Alasan</th>
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
											<td>menikah</td>
											<td>
												<p class="badge badge-success round">Disetujui</p>
												<p class="badge badge-danger round">Ditolak</p>
												<p class="badge badge-warning round">Menunggu</p>
											</td>
											<td>
												<a href="#" title="" class="btn btn-sm btn-cyan text-white" data-toggle="modal" data-target="#viewpengajuan">
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
<div class="modal animated zoomIn text-left" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel69">Detail Data Lembur Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body height-400" style="overflow-x: hidden;">
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
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
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
				<h4 class="modal-title" id="myModalLabel69">Detail Persetujuan Izin Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body height-400" style="overflow-x: hidden;">
				<div class="card bg-grey bg-lighten-4">
					<div class="card-body">
						<table  class="w-100">
							<tbody>
								<tr>
									<td><p>Nama Karyawan</p></td>
									<td><p id="nama_karyawan">-</p></td>
								</tr>
								<tr>
									<td><p>Jabatan</p></td>
									<td><p id="jabatan">-</p></td>
								</tr>
								<tr>
									<td><p>Tanggal Izin</p></td>
									<td><p id="tgl_izin">-</p></td>
								</tr>
								<tr>
									<td><p>Durasi Izin</p></td>
									<td><p id="durasi">-</p></td>
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

						<div class="row justify-content-center">
							<div id="bukti_surat" class="box-izin-img d-flex justify-content-center flex-column">


							</div>
						</div>
						{{--<div class="row mt-2 justify-content-center	">

							<a href="javascript:void(0)" id="btn-tolak" class="btn btn-danger mr-1 text-white" onclick="tolak()">
								<span>Tolak <i class="fa fa-times" aria-hidden="true"></i></span>
							</a>
							<a href="javascript:void(0)" id="btn-setuju" class="btn btn-success text-white mr-1" onclick="setuju()">
								<span>Setuju <i class="fa fa-check" aria-hidden="true"></i></span>
							</a>

						</div>--}}
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button> -->
				<a href="javascript:void(0)" id="btn-tolak" class="btn btn-danger mr-1 text-white" onclick="tolak()">
					<span>Tolak <i class="fa fa-times" aria-hidden="true"></i></span>
				</a>
				<a href="javascript:void(0)" id="btn-setuju" class="btn btn-success text-white mr-1" onclick="setuju()">
					<span>Setuju <i class="fa fa-check" aria-hidden="true"></i></span>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal view pengajuan-->
<script src="{{asset('assets/extends/page/persetujuan/persetujuan-ijin.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection