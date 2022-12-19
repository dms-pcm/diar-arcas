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
                <h1 class="card-title mr-2">Pengajuan Cuti Karyawan</h1>
                <a href="#" class="btn btn-blue btn-sm mt-1" title="" data-toggle="modal" data-target="#tambah_cuti" id="btn-cuti">Ajukan Cuti</a>
              </div>
            </div>
            <div class="card-content">
              <div class="card-body">

                <table class="table table-striped table-bordered display nowrap" style="width: 100%;" id="tb-cuti">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Jabatan</th>
                      <th>Tgl. Cuti</th>
                      <th>Durasi Cuti</th>
                      <th>Tgl. Mengajukan</th>            
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
                      <td></td>
                      <td>
                      	<p class="badge badge-success round">Disetujui</p>
                        <p class="badge badge-danger round">Ditolak</p>
                        <p class="badge badge-warning round">Menunggu</p>
                      </td>
                      <td>
                        <a href="#" title="" class="btn btn-sm btn-cyan text-white" data-toggle="modal" data-target="#viewcuti">
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
<div class="modal animated zoomIn text-left" id="viewcuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel69">Detail Data Cuti</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card bg-grey bg-lighten-4">
          <div class="card-body">
            <table class="w-100" style="white-space:nowrap;">
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
                  <td><p>Tanggal Cuti</p></td>
                  <td><p id="tgl_izin">-</p></td>
                </tr>
                <tr>
                  <td><p>Durasi Cuti</p></td>
                  <td><p id="durasi">-</p></td>
                </tr>
                <tr>
                  <td><p>Tanggal Mengajukan</p></td>
                  <td><p id="tgl_mengajukan">-</p></td>
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
        <!-- <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button> -->
      </div>
    </div>
  </div>
</div>
<!-- Modal view-->


<!-- Modal tambah -->
<div class="modal animated zoomIn text-left" id="tambah_cuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel69">Ajukan Cuti</h4>
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
                  <label for="projectinput1">Nama Karyawan<span class="text-danger">*</span></label>
                  <div class="wrapper">
                    <input type="text" id="nama_karyawan" class="form-control" value placeholder="Masukkan Nama Karyawan">
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="projectinput1">Jabatan Karyawan<span class="text-danger">*</span></label>
                  <div class="wrapper">
                    <input type="text" id="jabatan" class="form-control" value placeholder="Masukkan Jabatan Karyawan">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="projectinput3">Tanggal Cuti<span class="text-danger">*</span></label>
                  <input type="text" class="form-control tgl-izin" id="animate" placeholder="Tanggal Cuti" placeholder="Masukkan Tanggal Cuti">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="projectinput4">Durasi Cuti<span class="text-danger">*</span> <small class="text-danger">(Contoh: 1 hari)</small></label>
                  <input type="text" id="durasi" class="form-control" placeholder="Masukkan Durasi Cuti" name="phone">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Alasan<span class="text-danger">*</span></label>
                  <textarea id="alasan" class="form-control" placeholder="Masukkan Alasan Cuti"></textarea>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" onclick="simpanCuti()">Kirim</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal tambah-->
<script src="{{asset('assets/extends/page/pengajuan/cuti.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection