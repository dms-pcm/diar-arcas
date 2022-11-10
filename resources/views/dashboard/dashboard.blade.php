@extends('layout.app') @section('content') 
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
      <div class="row" id="three-card">
        <div class="col-xl-4 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media">
                  <div class="media-body text-left">
                    <h1 class="success">80</h1>
                    <span>Total Pengajuan Izin Lainnya</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="ft-award success font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media">
                  <div class="media-body text-left">
                    <h1 class="deep-orange">70</h1>
                    <span>Total Pengajuan Izin Sakit</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="ft-package deep-orange font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media">
                  <div class="media-body text-left">
                    <h1 class="info">6</h1>
                    <span>Total Pengajuan Cuti</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="ft-users info font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="graph">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-body">
              <ul class="list-inline text-center mt-3">
                <li>
                  <h6>
                    <i class="ft-circle danger"></i> Page Views
                  </h6>
                </li>
                <li>
                  <h6>
                    <i class="ft-circle success pl-1"></i> Total Visit
                  </h6>
                </li>
                <li>
                  <h6>
                    <i class="ft-circle warning pl-1"></i> Unique Visitor
                  </h6>
                </li>
              </ul>
              <div class="chartjs">
                <canvas id="visitors-graph" height="275"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="tb-kehadiran">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Kehadiran Karyawan Per Hari</h3>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <table class="table table-striped table-bordered display nowrap zero-configuration" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                    </tr>
                    <tr>
                      <td>Brielle Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                    </tr>
                    <tr>
                      <td>Herrod Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>59</td>
                      <td>2012/08/06</td>
                      <td>$137,500</td>
                    </tr>
                    <tr>
                      <td>Rhona Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010/10/14</td>
                      <td>$327,900</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- admin -->
      <div class="row">
        <div class="col-xl-5 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header head-dashboard">
              <h4>Absensi</h4>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="row time-attendance">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 d-flex align-items-center flex-column">
                    <label for="">Jam Masuk</label>
                    <span>09:00 AM</span>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 d-flex align-items-center flex-column">
                    <label for="">Jam Pulang</label>
                    <span>5:00 PM</span>
                  </div>
                </div>
                <div class="row align-items-center flex-column real-time">
                  <div id="Clock">00:00:00</div>
                  <div id="date"></div>
                </div>
                <div class="row justify-content-center aksi-btn">
                  <button type="" class="btn btn-blue">Absen Masuk</button>
                  <button type="" class="btn btn-success">Absen Pulang</button>
                  <!-- <button type="" class="btn btn-grey disabled"></button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-7 col-lg-12 col-md-12">
          <div class="card badge-box">
            <div class="card-header head-dashboard">
              <h4>Permintaan Pengajuan</h4>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card border-info overflow-hidden badge-short">
                  <div class="card-content ">
                    <div class="media align-items-stretch">
                      <div class="bg-info media-middle d-flex justify-content-center align-items-center">
                        <!-- <i class="icon-pencil font-large-2 text-white"></i> -->
                        <i class="fa fa-sticky-note pengajuan-icon text-white" aria-hidden="true"></i>
                        <h5 class=" m-0 head-mobile text-white">Pengajuan Ijin</h5>
                      </div>
                      <div class="media-body d-flex align-items-center">
                        <h5 class="m-0 head-desktop">Pengajuan Ijin</h5>
                      </div>
                      <div class="media-right  d-flex align-items-center">
                        <button type="" class="btn btn-info btn-pengajuan">Ajukan Ijin</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card border-indigo overflow-hidden badge-short">
                  <div class="card-content">
                    <div class="media align-items-stretch">
                      <div class="bg-indigo media-middle d-flex justify-content-center align-items-center">
                        <!-- <i class="icon-pencil font-large-2 text-white"></i> -->
                        <i class="fa fa-sticky-note pengajuan-icon text-white" aria-hidden="true"></i>
                        <h5 class=" m-0 head-mobile text-white">Pengajuan Cuti</h5>
                      </div>
                      <div class="media-body  d-flex align-items-center">
                        <h5 class="m-0 head-desktop">Pengajuan Cuti</h5>
                      </div>
                      <div class="media-right  d-flex align-items-center">
                        <button type="" class="btn btn-indigo btn-pengajuan">Ajukan Cuti</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card border-teal overflow-hidden badge-short">
                  <div class="card-content">
                    <div class="media align-items-stretch">
                      <div class="bg-teal  media-middle d-flex justify-content-center align-items-center">
                        <!-- <i class="icon-pencil font-large-2 text-white"></i> -->
                        <i class="fa fa-sticky-note pengajuan-icon text-white" aria-hidden="true"></i>
                        <h5 class=" m-0 head-mobile text-white">Pengajuan Lembur</h5>
                      </div>
                      <div class="media-body  d-flex align-items-center">
                        <h5 class="m-0 head-desktop">Pengajuan Lembur</h5>
                      </div>
                      <div class="media-right  d-flex align-items-center">
                        <button type="" class="btn btn-teal btn-pengajuan">Ajukan Lembur</button>
                      </div>
                    </div>
                  </div>
                </div>
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
                <h3 class="card-title mr-2">Pengajuan Ijin</h3>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <table class="table table-striped table-bordered zero-configuration display nowrap" style="width:100%;">
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
                        <!-- <div class="d-flex"><a href="#" title="" class="btn btn-sm btn-success text-white mr-1" data-toggle="modal" data-target="#edit" id="setuju-lembur"><i class="fa fa-check" aria-hidden="true"></i></a><a href="#" title="" class="btn btn-sm btn-danger text-white" id="hapus-data" id="tolak-lembur"><i class="fa fa-times" aria-hidden="true"></i></a></div> -->
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
                <h3 class="card-title mr-2">Pengajuan Cuti</h3>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <table class="table table-striped table-bordered display nowrap zero-configuration" style="width:100%;">
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
                <h3 class="card-title mr-2">Pengajuan Lembur Karyawan</h3>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <table class="table table-striped table-bordered zero-configuration" style="width:100%;">
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
                        <!-- <div class="d-flex"><a href="#" title="" class="btn btn-sm btn-success text-white mr-1" data-toggle="modal" data-target="#edit" id="setuju-lembur"><i class="fa fa-check" aria-hidden="true"></i></a><a href="#" title="" class="btn btn-sm btn-danger text-white" id="hapus-data" id="tolak-lembur"><i class="fa fa-times" aria-hidden="true"></i></a></div> -->
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

<!-- modal ubah pass -->
<div class="modal animated zoomIn text-left" id="pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel69">Ubah Password</h4>
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
                <label for="projectinput1">Password Lama</label>
                <input type="password" id="currentpassword" class="form-control" placeholder="Password Lama" name="fname">
                <i class="fa fa-eye eye-pass" aria-hidden="true" onclick="currentpass()"></i>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="projectinput1">Password baru</label>
                <input type="password" id="newpassword" class="form-control" placeholder="Password Baru" name="fname">
                <i class="fa fa-eye eye-pass" aria-hidden="true" onclick="newpass()"></i>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="projectinput3">Konfirmasi Password</label>
                <input type="password" id="confirmpassword" class="form-control" placeholder="Konfirmasi Password" name="email">
                <i class="fa fa-eye eye-pass" aria-hidden="true" onclick="confirmpass()"></i>

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
<!-- modal pass -->

<script src="{{asset('assets/extends/page/dashboard.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////--> @endsection