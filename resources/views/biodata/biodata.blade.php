@extends('layout.app') @section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-xl-4 col-lg-12 col-md-12">
              <div class="box-img-outside">
                <div class="box-img">
                  <img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid">
                  <!-- <div class="box-set d-flex align-items-center justify-content-center">
                    <i class="fa fa-camera" aria-hidden="true"></i>
                  </div> -->
                  <div class="dropdown">
                    <a href="#" role="button" data-toggle="dropdown"class=" btn box-set d-flex align-items-center justify-content-center"><i class="fa fa-camera mr-0" aria-hidden="true"></i></a>
                    <div class="dropdown-menu" wire:ignore.self>
                      <a class="dropdown-item" href="#">
                        <input class="d-none" type="file" id="file" >
                        <label class="mb-0 w-100 d-flex align-items-center" style="cursor: pointer;" for="file"><i class='fa fa-edit'></i> &nbsp;Ubah</label>
                      </a>
                    </div>
                  </div>
                </div>
                <h4 class="text-center">Ariel Tatum Hamidah Barimba</h4>
              </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12">
              <h2 class="mb-2" style="border-bottom: 1px solid #ccc; padding:0 0 6px 0 ;">
                <i class="fa fa-user"></i>&nbsp;Profile</h2>
                <div class="row mb-2">
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="input-box font-weight-bold">
                      <label>Nama Lengkap</label>
                      <input type="" class="form-control d-block" name="" placeholder="Nama Lengkap">
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="input-box font-weight-bold">
                      <label>Tempat Lahir</label>
                      <input type="" class="form-control d-block" name="" placeholder="Tempat Lahir">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="input-box font-weight-bold">
                      <label>Tanggal Lahir</label>
                      <input type="" class="form-control d-block" name="" placeholder="Tanggal Lahir">
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="input-box font-weight-bold">
                      <label>Alamat</label>
                      <textarea name="" class="form-control" placeholder="Alamat"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="input-box font-weight-bold">
                      <label>Email</label>
                      <input type="email" class="form-control d-block" name="" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="input-box font-weight-bold">
                      <label>Nomor Handphone</label>
                      <input type="email" class="form-control d-block" name="" placeholder="Nomor Handphone">
                    </div>
                  </div>
                </div>
                <button class="btn btn-blue">Simpan</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @endsection