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
                <a href="#" class="btn btn-blue btn-sm mt-1" title="" data-toggle="modal" data-target="#tambah-user">Buat User</a>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">

                <table class="table table-striped table-bordered w-100" id="users-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Username</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
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
<div class="modal animated zoomIn text-left" id="tambah-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
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
                <label for="nama">Nama Karyawan</label>
                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="nama">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" name="username">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
      <button type="button" class="btn btn-outline-success" onclick="addUser()">Tambah</button>
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
        <input type="hidden" id="id_user">
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
                <label for="nama">Nama Karyawan</label>
                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="fname">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" name="email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="phone" value="12345678" readonly disabled>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
      <button type="button" class="btn btn-outline-success" id="btn-update">Update</button>
    </div>
  </div>
</div>
</div>
<!-- Modal Edit-->


<script src="{{asset('assets/extends/page/management-user.js')}}"></script>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection