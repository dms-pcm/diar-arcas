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

								<table class="table table-striped table-bordered w-100" id="tb-persetujuan-lembur">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Karyawan</th>
											<th>Tanggal Lembur</th>
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


	<!-- Modal view pengajuan -->
	<div class="modal animated zoomIn text-left" id="viewlembur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
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
							<div class="row justify-content-center	">
								
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
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal view pengajuan-->



	<script src="{{asset('assets/extends/page/persetujuan/persetujuan-lembur.js')}}"></script>
	<!-- ////////////////////////////////////////////////////////////////////////////-->
	@endsection