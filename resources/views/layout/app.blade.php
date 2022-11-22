<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Feb 2019 05:58:43 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Dashboard eCommerce - Robust - Responsive Bootstrap 4 Admin Dashboard Template for Web Application</title>
  <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
  <!-- <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico"> -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link href="{{asset('assets/css/vendors.min.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/selects/selectivity-full.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/selectivity/selectivity.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/selects/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/datedropper.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/timedropper.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/tempusdominus-bootstrap-4.min.css')}}">
  <link href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/vendors/css/charts/morris.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/vendors/css/extensions/unslider.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/vendors/css/weather-icons/climacons.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/css.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/core/menu/menu-types/vertical-menu.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/core/colors/palette-gradient.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/core/colors/palette-gradient.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/plugins/calendars/clndr.min.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/animate/animate.min.css')}}">
  <!-- <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/meteocons/style.min.css"> -->
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- END Custom CSS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="{{asset('assets/vendors/js/animation/loaders.js')}}"></script>
  <script>
    let baseUrl = "{{url('/')}}/";
    let urlApi = "{{url('/api')}}/";
  </script>
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- navbar fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row d-flex justify-content-center">
          <li class="nav-item mobile-menu d-md-none mr-auto">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
              <i class="ft-menu font-large-1"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="{{url('/dashboard')}}">
              <img src="{{asset('img/logo-diararcas.png')}}" alt="" class="brand-logo">
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
              <i class="fa fa-ellipsis-v"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                <i class="ft-menu"></i>
              </a>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                <i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                </li>
                <li class="scrollable-container media-list w-100">
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center">
                        <i class="ft-plus-square icon-bg-circle bg-cyan"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">You have new order!</h6>
                        <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center">
                        <i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading red darken-1">99% Server load</h6>
                        <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center">
                        <i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                        <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center">
                        <i class="ft-check-circle icon-bg-circle bg-cyan"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Complete the task</h6>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center">
                        <i class="ft-file icon-bg-circle bg-teal"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Generate monthly report</h6>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer">
                  <a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a>
                </li>
              </ul>
            </li>
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="{{asset('img/profile.png')}}" alt="">

                  <i></i>
                </span>
                <span class="user-name" id="nama_user"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="{{url('/biodata')}}" class="dropdown-item" id="profile-karyawan">
                  <i class="ft-user"></i> Profile
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pass">
                  <i class="ft-lock"></i> Ubah Password</a>
                  <a class="dropdown-item" id="logout" onclick="logout()">
                    <i class="ft-power"></i> Logout 
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- navbar ////////////////////////////////////////////////////////////////////////////-->
    <!-- sidebar -->
    <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" navigation-header">
            <span data-i18n="nav.category.layouts">Menu</span>
            <!-- <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Menu"></i> -->
          </li>
          <li class=" nav-item" id="nav-dashboard">
            <a href="{{url('/dashboard')}}">
              <i class="icon-home"></i>
              <span class="menu-title" data-i18n="nav.changelog.main">Dashboard</span>
              <!-- <span class="badge badge badge-pill badge-danger float-right mr-2">2.1</span> -->
            </a>
          </li>
          <li class=" nav-item" id="nav-management">
            <a href="{{url('/user')}}">
              <i class="icon-people"></i>
              <span class="menu-title" data-i18n="nav.changelog.main">Management User</span>
              <!-- <span class="badge badge badge-pill badge-danger float-right mr-2">2.1</span> -->
            </a>
          </li>
          <li class="nav-item" id="nav-persetujuan">
            <a href="#">
              <i class="icon-book-open"></i>
              <span class="menu-title" data-i18n="nav.dash.main">Persetujuan</span>
              <span class="badge badge badge-info badge-pill float-right mr-2">5</span>
            </a>
            <ul class="menu-content">
              <li class="" id="ijin-persetujuan">
                <a class="menu-item" href="{{url('/ijin-persetujuan')}}" data-i18n="nav.dash.ecommerce">Izin</a>
              </li>
              <li class="" id="cuti-persetujuan">
                <a class="menu-item" href="{{url('/cuti-persetujuan')}}" data-i18n="nav.dash.project">Cuti</a>
              </li>
              <li class="" id="lembur-persetujuan">
                <a class="menu-item" href="{{url('/lembur-persetujuan')}}" data-i18n="nav.dash.analytics">Lembur</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="nav-pengajuan">
            <a href="#">
              <i class="icon-notebook"></i>
              <span class="menu-title" data-i18n="nav.dash.main">Pengajuan</span>
            </a>
            <ul class="menu-content">
              <li class="" id="ijin-pengajuan">
                <a class="menu-item" href="{{url('/ijin')}}" data-i18n="nav.dash.ecommerce">Izin</a>
              </li>
              <li class="" id="cuti-pengajuan">
                <a class="menu-item" href="{{url('/cuti')}}" data-i18n="nav.dash.project">Cuti</a>
              </li>
              <li class="" id="lembur-pengajuan">
                <a class="menu-item" href="{{url('/lembur')}}" data-i18n="nav.dash.analytics">Lembur</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="nav-absensi">
            <a href="{{url('/absensi')}}">
              <i class="icon-check"></i>
              <span class="menu-title" data-i18n="nav.templates.main">Absensi</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- sidebar -->

    @yield('content') 


    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2022 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">Dimas & Arya </a>, All rights reserved. </span></p>
    </footer>

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
                    <input type="password" id="current_password" class="form-control" placeholder="Password Lama" name="current_password">
                    <i class="fa fa-eye eye-pass" aria-hidden="true" id="toggleCurrent"  id="show"></i>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="projectinput1">Password baru</label>
                    <input type="password" id="new_password" class="form-control" placeholder="Password Baru" name="new_password">
                    <i class="fa fa-eye eye-pass" aria-hidden="true" id="toggleNew"  id="show"></i>

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="projectinput3">Konfirmasi Password</label>
                    <input type="password" id="new_confirm_password" class="form-control" placeholder="Konfirmasi Password" name="new_confirm_password">
                    <i class="fa fa-eye eye-pass" aria-hidden="true" id="toggleConfirm"  id="show"></i>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" onclick="changePassword()">Simpan</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal pass -->

  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('assets/vendors/js/extensions/jquery.knob.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts/extensions/knob.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/charts/raphael-min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/charts/morris.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"></script>
  <script src="{{asset('assets/data/jvector/visitor-data.js')}}"></script>
  <script src="{{asset('assets/vendors/js/charts/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/extensions/unslider-min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/tables/buttons.colVis.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/tables/datatable/dataTables.colReorder.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts/tables/datatables-extensions/datatable-responsive.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts/tables/datatables/datatable-basic.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts/tables/datatables/datatable-api.js')}}"></script>
  <script src="{{asset('assets/js/scripts/modal/components-modal.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/extensions/sweetalert2.all.js')}}"></script>
  <script src="{{asset('assets/js/scripts/extensions/sweet-alerts.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/extensions/datedropper.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/extensions/timedropper.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts/extensions/date-time-dropper.min.js')}}"></script>
  <script src="{{asset('assets/vendors/js/forms/select/selectivity-full.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts/forms/select/form-selectivity.min.js')}}"></script>
  <script src="{{asset('assets/libraries/moment/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <script src="{{asset('assets/libraries/custom.js')}}"></script>
  <script src="{{asset('assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts/forms/select/form-select2.min.js')}}"></script>

  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script>var hostUrl = "assets/";</script>
  <script src="{{asset('assets/js/core/app-menu.min.js')}}"></script>
  <script src="{{asset('assets/js/core/app.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts/pages/dashboard-analytics.min.js')}}"></script>
  <script src="{{asset('assets/extends/page/login.js')}}"></script>
  <script src="{{asset('assets/extends/page/configuration.js')}}"></script>
  <script src="{{asset('assets/vendors/js/animation/loaders.js')}}"></script>
  <script>
    jQuery(document).ready(function () {
      if (localStorage.getItem("role_id") == 3) {
        $('#nav-management').hide();
        $('#three-card').hide();
        $('#graph').hide();
        $('#tb-kehadiran').hide();
        $('#nav-persetujuan').hide();
      } else if (localStorage.getItem("role_id") == 1 || localStorage.getItem("role_id") == 2) {
        $('#three-card').show();
        $('#graph').show();
        $('#tb-kehadiran').show();
        $('#absen').hide();
        $('#profile-karyawan').hide();
      }
      setDatePicker("#datepicker")
      setDateRangePicker("#startdate", "#enddate")
      setMonthPicker("#monthpicker")
      setYearPicker("#yearpicker")
      setYearRangePicker("#startyear", "#endyear")
    });
    
    const toggleCurrent = document.querySelector('#toggleCurrent');
    const toggleNew = document.querySelector('#toggleNew');
    const toggleConfirm = document.querySelector('#toggleConfirm');
    const currentpassword = document.querySelector('#current_password');
    const newpassword = document.querySelector('#new_password');
    const confirmpassword = document.querySelector('#new_confirm_password');

    toggleCurrent.addEventListener('click', function (e) {
      const type = currentpassword.getAttribute('type') === 'password' ? 'text' : 'password';
      currentpassword.setAttribute('type', type);

      this.classList.toggle('fa-eye-slash');
    });
    toggleNew.addEventListener('click', function (e) {
      const type = newpassword.getAttribute('type') === 'password' ? 'text' : 'password';
      newpassword.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
    toggleConfirm.addEventListener('click', function (e) {
      const type = confirmpassword.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmpassword.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
    
    function changePassword() {
      AmagiLoader.show();
      $.ajax({
        url:`${urlApi}change-password`,
        type:'POST',
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
        data:{
          current_password: $('#pass #current_password').val(),
          new_password: $('#pass #new_password').val(), 
          new_confirm_password: $('#pass #new_confirm_password').val()
        },
        success:function(response){
          AmagiLoader.hide();
          Swal.fire({
            title: "Berhasil!",
            text: response.status.message,
            icon: "success",
          }).then((result) => {
            location.reload(); 
            $("#pass").modal("hide");
          });
        },
        error:function(xhr){
          AmagiLoader.hide();
          handleErrorSimpan(xhr);
        }
      });
    }
  </script>
  <!-- END PAGE LEVEL JS-->
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->

  <!-- END PAGE LEVEL JS-->
</body>

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Feb 2019 06:15:05 GMT -->
</html>