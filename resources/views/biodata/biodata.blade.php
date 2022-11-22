@extends('layout.app') @section('content') <div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
      <div class="card">
        <div class="card-body">
          <form class="form" enctype="multipart/form-data" id="data_profile">
            @csrf
            <div class="row box-profile">
              <div class="col-xl-4 col-lg-12 col-md-12">
                <div class="box-img-outside">
                  <div class="box-img">
                    <img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" id="blah">
                    <!-- <div class="box-set d-flex align-items-center justify-content-center"><i class="fa fa-camera" aria-hidden="true"></i></div> -->
                    <div class="dropdown">
                      <a href="#" role="button" data-toggle="dropdown" class=" btn box-set d-flex align-items-center justify-content-center">
                        <i class="fa fa-camera mr-0" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" wire:ignore.self>
                        <a class="dropdown-item" href="#">
                          <input class="d-none" type="file" id="img_input">
                          <label class="mb-0 w-100 d-flex align-items-center" style="cursor: pointer;" for="img_input">
                            <i class='fa fa-edit'></i> &nbsp;Ubah </label>
                          </a>
                        </div>
                      </div>
                    </div>
                    <h4 class="text-center text-uppercase" id="nama_lengkap">-</h4>
                  </div>
                </div>
                <div class="col-xl-8 col-lg-12 col-md-12">
                  <h2 class="mb-2" style="border-bottom: 1px solid #ccc; padding:0 0 6px 0 ;">
                    <i class="fa fa-user"></i>&nbsp;Profile
                  </h2>
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-2" >
                      <div class="input-box font-weight-bold">
                        <label>Nama Lengkap</label>
                        <input type="text" id="nama" class="form-control d-block" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-2" >
                      <div class="input-box font-weight-bold">
                        <label>Jabatan</label>
                        <input type="text" id="nama" class="form-control d-block" placeholder="Jabatan">
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-6 mb-2">
                      <div class="input-box font-weight-bold">
                        <label>Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" class="form-control d-block" placeholder="Tempat Lahir">
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-6 mb-2">
                      <div class="input-box font-weight-bold">
                        <label>Tanggal Lahir</label>
                        <input type="text" id="tgl_lahir" class="form-control d-block" placeholder="Format: yyyy-mm-dd">
                      </div>
                    </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                      <div class="input-box font-weight-bold">
                        <label>Alamat</label>
                        <textarea id="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                    </div>


                    <div class="col-xl-6 col-lg-12 col-md-6 mb-2">
                      <div class="input-box font-weight-bold">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control d-block" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-6 mb-2">
                      <div class="input-box font-weight-bold">
                        <label>Nomor Handphone</label>
                        <input type="text" id="no_hp" class="form-control d-block" placeholder="Nomor Handphone">
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-blue" id="btn-simpan">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('assets/extends/page/biodata.js')}}"></script>
  <!-- ////////////////////////////////////////////////////////////////////////////--> 
  @endsection