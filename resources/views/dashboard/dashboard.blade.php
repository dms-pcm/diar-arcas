@extends('layout.app') @section('content') 
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
      <div class="row" id="three-card">
        <div class="col-xl-3 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media flex-row">
                  <div class="media-body text-left">
                    <h1 class="success" id="jumlah_izin_lainnya">0</h1>
                    <span>Total Pengajuan Izin <br> Lainnya</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="ft-file-text success font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media flex-row">
                  <div class="media-body text-left">
                    <h1 class="deep-orange" id="jumlah_izin_sakit">0</h1>
                    <span>Total Pengajuan Izin <br> Sakit</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="fa fa-user-md deep-orange font-large-2 float-right" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media flex-row">
                  <div class="media-body text-left">
                    <h1 class="info" id="jumlah_izin_cuti">0</h1>
                    <span>Total Pengajuan <br>Cuti</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="fa fa-calendar-times-o info font-large-2 float-right" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media flex-row">
                  <div class="media-body text-left">
                    <h1 class="purple" id="jumlah_izin_lembur">0</h1>
                    <span>Total Pengajuan <br>Lembur </span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="ft-users purple font-large-2 float-right"></i>
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
            <div class="card-header pb-0">
              <div class="box-head-absensi w-100">
                <h1 class="card-title">Statistik Absensi Karyawan Per Bulan</h1>
                <div class="box-filter d-flex">
                  <div class="d-flex align-items-center w-100">
                    <span class="month">Bulan</span>
                    <input type="text" id="monthpicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#monthpicker" autocomplete="off" />
                  </div>
                  <div class="d-flex align-items-center w-100">
                    <span class="year">Tahun</span>
                    <input type="text" id="yearpicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#yearpicker" autocomplete="off" />
                  </div>
                  <button type="button" id="show" class="btn btn-blue btn-sm">Tampilkan</button>
                </div>
              </div>
            </div>
            <div class="card-body" id="chart">
              <ul class="list-inline text-center mt-3">
                <li>
                  <h6>
                    <i class="ft-circle warning"></i> Sangat Baik
                  </h6>
                </li>
                <li>
                  <h6>
                    <i class="ft-circle warning pl-1"></i> Baik
                  </h6>
                </li>
                <li>
                  <h6>
                    <i class="ft-circle warning pl-1"></i> Kurang
                  </h6>
                </li>
                <li>
                  <h6>
                    <i class="ft-circle warning pl-1"></i> Tidak Masuk/Alpha
                  </h6>
                </li>
              </ul>
              <div class="chartjs">
                <canvas id="visitors-graph" height="275"></canvas>
              </div>
            </div>
            {{--<div id="initial" class="card-body img-notif-absen">
              <div class="row justify-content-center align-items-center flex-column">
                <img src="{{asset('img/calendar.png')}}" alt="" class="img-fluid">
                <h4 class="text-center">Silahkan pilih bulan dan tahun terlebih dahulu</h4>
              </div>
            </div>--}}
            <div id="nothing" class="card-body img-notif-absen">

            </div>
          </div>
        </div>
      </div>

      <!-- admin -->
      <!-- <div class="row" id="absen">
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
                  <button type="button" class="btn btn-blue d-none" id="masuk">Absen Masuk</button>
                  <button type="button" class="btn btn-grey disabled d-none" id="masuk_disabled" disabled>Absen Masuk</button>
                  <button type="button" class="btn btn-success d-none" id="pulang">Absen Pulang</button>
                  <button type="button" class="btn btn-grey disabled d-none" id="pulang_disabled" disabled>Absen Pulang</button>
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

                        <i class="fa fa-sticky-note pengajuan-icon text-white" aria-hidden="true"></i>
                        <h5 class=" m-0 head-mobile text-white">Pengajuan Izin</h5>
                      </div>
                      <div class="media-body d-flex align-items-center">
                        <h5 class="m-0 head-desktop">Pengajuan Izin</h5>
                      </div>
                      <div class="media-right  d-flex align-items-center">
                        <button type="" class="btn btn-info btn-pengajuan" data-toggle="modal" data-target="#tambah_izin">Ajukan Izin</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card border-indigo overflow-hidden badge-short">
                  <div class="card-content">
                    <div class="media align-items-stretch">
                      <div class="bg-indigo media-middle d-flex justify-content-center align-items-center">

                        <i class="fa fa-sticky-note pengajuan-icon text-white" aria-hidden="true"></i>
                        <h5 class=" m-0 head-mobile text-white">Pengajuan Cuti</h5>
                      </div>
                      <div class="media-body  d-flex align-items-center">
                        <h5 class="m-0 head-desktop">Pengajuan Cuti</h5>
                      </div>
                      <div class="media-right  d-flex align-items-center">
                        <button type="" class="btn btn-indigo btn-pengajuan" data-toggle="modal" data-target="#tambah_cuti">Ajukan Cuti</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card border-teal overflow-hidden badge-short">
                  <div class="card-content">
                    <div class="media align-items-stretch">
                      <div class="bg-teal  media-middle d-flex justify-content-center align-items-center">

                        <i class="fa fa-sticky-note pengajuan-icon text-white" aria-hidden="true"></i>
                        <h5 class=" m-0 head-mobile text-white">Pengajuan Lembur</h5>
                      </div>
                      <div class="media-body  d-flex align-items-center">
                        <h5 class="m-0 head-desktop">Pengajuan Lembur</h5>
                      </div>
                      <div class="media-right  d-flex align-items-center">
                        <button type="" class="btn btn-teal btn-pengajuan" data-toggle="modal" data-target="#tambah_lembur">Ajukan Lembur</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <div class="row" id="absen">
        <div class="card w-100">
          <div class="card-body">
            <label class="w-100 text-center text-uppercase text-header-absen mb-0">absensi karyawan</label>
            <div class="row time-attendance">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex align-items-center flex-column detail-jam">
                <label for="" class="mb-0">Jam Masuk</label>
                <span class="time-masuk" id="jam_masuk">-</span>
                
                <div class="btn-absen-desktop">
                 <button type="button" class="btn btn-masuk d-none" id="masuk">Absen Masuk</button>
                 <button type="button" class="btn btn-grey disabled d-none" id="masuk_disabled" disabled>Absen Masuk</button>
               </div>
             </div>
             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex align-items-center flex-column ">
              <label for="" class="mb-0">Jam Pulang</label>
              <span class="time-pulang" id="jam_pulang">-</span>
              
              <div class="btn-absen-desktop">
                <button type="button" class="btn btn-pulang d-none" id="pulang">Absen Pulang</button>
                <button type="button" class="btn btn-grey disabled d-none" id="pulang_disabled" disabled>Absen Pulang</button>
              </div>
            </div>
            <div class="w-100 btn-absen-mobile">
              <div class="d-flex flex-column align-items-center">
                <button type="button" class="btn btn-masuk">Absen Masuk</button>
                <button type="button" class="btn btn-pulang">Absen Pulang</button>
              </div>
            </div>
          </div>
          <div class="row justify-content-center attendance-action w-100 m-0">
            <button type="" class="btn btn-info" data-toggle="modal" data-target="#tambah_izin">Izin</button>
            <button type="" class="btn btn-indigo" data-toggle="modal" data-target="#tambah_cuti">Cuti</button>
            <button type="" class="btn btn-lembur" data-toggle="modal" data-target="#tambah_lembur">Lembur</button>
          </div> 
        </div>
      </div>
    </div>

  </div>
</div>
</div>


<!-- modal pengajuan ijin -->
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
                  <label for="projectinput1">Nama Karyawan<span class="text-danger">*</span></label>
                  <div class="wrapper">
                    <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama Karyawan">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="projectinput1">Jabatan Karyawan<span class="text-danger">*</span></label>
                  <div class="wrapper">
                    <!-- <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected" name="traditional[single]"><option>Amsterdam</option><option>Antwerp</option></select> -->
                    <input type="text" id="jabatan" class="form-control" placeholder="Masukkan Jabatan Karyawan">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="projectinput1">Jenis Izin<span class="text-danger">*</span></label>
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="projectinput1">Upload Surat Dokter</label>
                  <div class="wrapper">
                    <input class="d-none" type="file" id="surat_dokter">
                    <label class="mb-0 w-100 d-flex align-items-center btn btn-blue font-weight-bold justify-content-center" style="cursor: pointer;" for="surat_dokter">
                      <i class='fa fa-edit'></i> &nbsp;Pilih File
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <img src="{{asset('assets/img/no_image.png')}}" alt="" class="img-fluid" id="surat_preview" style="border-radius: 4px;">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput3">Tanggal Izin<span class="text-danger">*</span></label>
                    <input type="text" class="form-control tgl-izin" id="animate" data-dd-opt-format="mm" placeholder="Masukkan Tanggal Izin">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput4">Durasi Izin<span class="text-danger">*</span>  <small class="text-danger">(Contoh: 1 hari)</small></label>
                    <input type="text" id="durasi_izin" class="form-control" placeholder="Masukkan Durasi Izin" name="phone">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Alasan<span class="text-danger">*</span></label>
                    <textarea id="alasan" class="form-control" placeholder="Masukkan Alasan Izin"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" onclick="simpanIzin()">Kirim</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal pengajuan ijin -->

  <!-- modal pengajuan cuti -->
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
                    <input type="text" class="form-control tgl-cuti" id="animate" placeholder="Tanggal Cuti" placeholder="Masukkan Tanggal Cuti">
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
  <!-- modal pengajuan cuti -->

  <!-- Modal pengajuan lembur -->
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
                    <label for="projectinput1">Nama Karyawan<span class="text-danger">*</span></label>
                    <div class="wrapper">

                      <select id="nama_pegawai" class="hide-search form-control">
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
                    <label for="projectinput1">Jabatan Karyawan<span class="text-danger">*</span></label>
                    <input type="text" id="jabatan" class="form-control" placeholder="Masukkan Jabatan Karyawan">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput3">Tanggal Lembur<span class="text-danger">*</span></label>
                    <input type="text" class="form-control tgl-lembur" id="animate" placeholder="Masukkan Tanggal Lembur">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput4">Durasi Lembur<span class="text-danger">*</span> <small class="text-danger">(Contoh: 1 jam)</small></label>
                    <input type="text" id="lama_lembur" class="form-control" placeholder="Masukkan Durasi Lembur" name="phone">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput4">Selesai Lembur<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="timeformat" placeholder="Masukkan Waktu Selesai Lembur">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Deskripsi<span class="text-danger">*</span></label>
                    <textarea id="alasan" class="form-control" placeholder="Masukkan Deskripsi Lembur"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-outline-success" onclick="simpanLembur()">Kirim</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal tambah lembur-->
  <script src="{{asset('assets/extends/page/dashboard.js')}}"></script>
  <!-- ////////////////////////////////////////////////////////////////////////////--> @endsection