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
                <h3 class="card-title mr-2">Management User</h3>
                <a href="#" class="btn btn-blue btn-sm mt-1" title="" data-toggle="modal" data-target="#tambah">Buat User</a>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">

                <table class="table table-striped table-bordered display nowrap zero-configuration w-100" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Jabatan</th>
                      <th>Username</th>
                      <th>aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Tiger Nixon</td>
                      <td>Nix</td>
                      <td></td>
                      <td>
                        <div class="d-flex">
                          <a href="#" title="" class="btn btn-sm btn-warning text-white mr-1" data-toggle="modal" data-target="#edit">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                          </a>
                          <a href="#" title="" class="btn btn-sm btn-danger text-white mr-1" id="hapus-data">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </div>
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

<!-- Modal Tambah -->
<div class="modal animated zoomIn text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel69">Tambah Data User</h4>
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
                <input type="text" id="projectinput1" class="form-control" placeholder="Nama Lengkap" name="fname">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="projectinput1">Jabatan</label>
                <input type="text" id="projectinput1" class="form-control" placeholder="Nama Lengkap" name="fname">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectinput3">Username</label>
                <input type="text" id="projectinput3" class="form-control" placeholder="Username" name="email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectinput4">Password</label>
                <input type="text" id="projectinput4" class="form-control" placeholder="Password" name="phone">
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
<!-- Modal Tambah-->


<!-- Modal Edit -->
<div class="modal animated zoomIn text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel69">Edit Data User</h4>
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
                <input type="text" id="projectinput1" class="form-control" placeholder="Nama Lengkap" name="fname">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="projectinput1">Jabatan</label>
                <input type="text" id="projectinput1" class="form-control" placeholder="Nama Lengkap" name="fname">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectinput3">Username</label>
                <input type="text" id="projectinput3" class="form-control" placeholder="Username" name="email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="projectinput4">Password</label>
                <input type="text" id="projectinput4" class="form-control" placeholder="Password" name="phone">
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
<!-- Modal Edit-->


<script src="{{asset('assets/extends/page/management-user.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection