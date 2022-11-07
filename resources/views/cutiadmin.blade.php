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
                <h3 class="card-title mr-2">Daftar Pengajuan Cuti</h3>
                
              </div>
              <a class="heading-elements-toggle">
                <i class="fa fa-ellipsis-v font-medium-3"></i>
              </a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <a data-action="collapse">
                      <i class="ft-minus"></i>
                    </a>
                  </li>
                  <li>
                    <a data-action="reload">
                      <i class="ft-rotate-cw"></i>
                    </a>
                  </li>
                  <li>
                    <a data-action="expand">
                      <i class="ft-maximize"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">

                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Jabatan</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Tgl Mengajukan</th>
                      <th>Alasan</th>
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
                      	<p class="badge badge-warning round">Menunggu</p>
                      </td>
                      <td>
                 
                          <a href="#" title="" class="btn btn-sm btn-success text-white mr-1" id="setuju-cuti" data-toggle="modal" data-target="#edit">
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </a>
                          <a href="#" title="" class="btn btn-sm btn-danger text-white mr-1" id="tolak-cuti">
                            <i class="fa fa-times" aria-hidden="true"></i>
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

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <div class="d-flex align-items-center">
                <h3 class="card-title mr-2">Riwayat Pengajuan Cuti</h3>
                
              </div>
              <a class="heading-elements-toggle">
                <i class="fa fa-ellipsis-v font-medium-3"></i>
              </a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <a data-action="collapse">
                      <i class="ft-minus"></i>
                    </a>
                  </li>
                  <li>
                    <a data-action="reload">
                      <i class="ft-rotate-cw"></i>
                    </a>
                  </li>
                  <li>
                    <a data-action="expand">
                      <i class="ft-maximize"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">

                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Jabatan</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Tgl Mengajukan</th>
                      <th>Alasan</th>
                      <th>Status</th>
                   
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


<script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}"></script>
<!-- sweetalert ada disini -->
  <script src="{{asset('assets/js/scripts/extensions/sweet-alerts.min.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection