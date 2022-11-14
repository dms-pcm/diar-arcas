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
                <div class="media flex-row">
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
                <div class="media flex-row">
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
                <div class="media flex-row">
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
      <div class="row" id="absen">
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
                  <button type="" class="btn btn-blue d-none" id="masuk">Absen Masuk</button>
                  <button type="" class="btn btn-grey disabled d-none" id="masuk_disabled">Absen Masuk</button>
                  <button type="" class="btn btn-success d-none" id="pulang">Absen Pulang</button>
                  <button type="" class="btn btn-grey disabled d-none" id="pulang_disabled">Absen Pulang</button>
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
                        <button type="" class="btn btn-info btn-pengajuan" data-toggle="modal" data-target="#tambahijin">Ajukan Ijin</button>
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
                        <button type="" class="btn btn-indigo btn-pengajuan" data-toggle="modal" data-target="#tambahcuti">Ajukan Cuti</button>
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
                        <button type="" class="btn btn-teal btn-pengajuan" data-toggle="modal" data-target="#tambahlembur">Ajukan Lembur</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      {{--<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <div class="d-flex align-items-start flex-column">
                <h1 class="card-title mr-2">Pengajuan Izin</h1>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">

                <table class="table table-striped table-bordered zero-configuration w-100">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Jabatan</th>
                      <th>Tgl. Izin</th>
                      <th>Durasi Izin</th>
                      
                      <th>Status</th>
                      

                    </tr>
                  </thead>
                  <tbody>
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
                <h3 class="card-title mr-2">Pengajuan Lembur</h3>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <table class="table table-striped table-bordered zero-configuration w-100">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Tgl. Lembur</th>
                      <th>Durasi Lembur</th>
                      <th>Selesai</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Tiger Nixon</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>--}}
    </div>
  </div>
</div>


<!-- modal pengajuan ijin -->
<div class="modal animated zoomIn text-left" id="tambahijin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
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
                  <input type="text" class="form-control" id="yearsRange" placeholder="Tanggal Izin">
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
<!-- modal pengajuan ijin -->

<!-- modal pengajuan cuti -->
<div class="modal animated zoomIn text-left" id="tambahcuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
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
                  <label for="projectinput1">Nama Karyawan</label>
                  <div class="wrapper">
                   <!--  <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected" name="traditional[single]">
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
                  <label for="projectinput3">Tanggal Cuti</label>
                  <input type="text" class="form-control" id="minYear" placeholder="Tanggal Izin">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="projectinput4">Durasi Cuti</label>
                  <input type="text" id="projectinput4" class="form-control" placeholder="2 Hari" name="phone">
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
<!-- modal pengajuan cuti -->

<!-- Modal pengajuan lembur -->
<div class="modal animated zoomIn text-left" id="tambahlembur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel69">Ajukan Lembur</h4>
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
                      <!--  <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected" name="traditional[single]">
                      <option>Amsterdam</option>
                      <option>Antwerp</option>

                    </select> -->
                    <input type="text" name="" class="form-control">
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="projectinput1">Jabatan Karyawan</label>
                  <div class="wrapper">
                       <!--  <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected" name="traditional[single]">
                      <option>Amsterdam</option>
                      <option>Antwerp</option>

                    </select> -->
                    <input type="text" name="" class="form-control">
                  </div>
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
                  <label for="projectinput4">Durasi Lembur</label>
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
<!-- Modal tambah lembur-->
<script src="{{asset('assets/extends/page/dashboard.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////--> @endsection