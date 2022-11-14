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
                <h3 class="card-title mr-2">Persetujuan Cuti Karyawan</h3>
                
              </div>
            </div>
            <div class="card-content">
              <div class="card-body">

               <table class="table table-striped table-bordered zero-configuration display nowrap" style="width: 100%;">
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
                <tbody>
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

<!-- Modal view pengajuan -->
<div class="modal animated zoomIn text-left" id="viewcuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel69">Detail Persetujuan Cuti Karyawan</h4>
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
                <p>Tanggal Cuti</p>
                <p>Durasi Cuti</p>
                <p>Status</p>
                <p>Deskripsi</p>
              </div>
              <div class="col-xl-8 col-lg-12 col-md-12">
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
            <div class="row justify-content-center  ">

              <a href="#" title="" class="btn btn-danger mr-1 text-white" id="tolak-cuti">
                <span>Tolak <i class="fa fa-times" aria-hidden="true"></i></span>
              </a>
              <a href="#" title="" class="btn btn-success text-white mr-1" data-toggle="modal" data-target="#edit" id="setuju-cuti">
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
<script src="{{asset('assets/extends/page/persetujuan/persetujuan-cuti.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection