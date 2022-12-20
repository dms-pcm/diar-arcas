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
  <title>Absensi Karyawan - DiarArcas</title>
  <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
  <!-- <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico"> -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
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
              <img src="{{asset('img/logo-diararcas-new.png')}}" alt="" class="brand-logo">
              <h3 class="brand-text">DiarArcas</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
              <i class="fa fa-ellipsis-v"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content ">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <div class="row d-flex justify-content-between w-100 m-0">
            <ul class="nav navbar-nav">
              <li class="nav-item d-none d-md-block">
                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                  <i class="ft-menu"></i>
                </a>
              </li>
            </ul>
            <div class="row align-items-center real-time">
              <div id="Clock">00:00:00</div>&nbsp;|&nbsp;<div id="date"></div>
            </div>
            <ul class="nav navbar-nav">
              <li class="dropdown dropdown-notification nav-item">
                <a class="nav-link nav-link-label" href="javascript:void(0)" data-toggle="dropdown">
                  <i class="ficon ft-bell"></i>
                  <span class="badge badge-pill badge-default badge-danger badge-default badge-up" id="count-notify" >0</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0">
                      <span class="grey darken-2">Notifications</span>
                    </h6>
                    <span class="notification-tag badge badge-default badge-danger float-right m-0" id="count-new">0</span>
                  </li>
                  <li class="scrollable-container media-list w-100" id="notify">
                  </li>
                </ul>
              </li>
              <li class="dropdown dropdown-user nav-item">
                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <div class="avatar avatar-online" id="fotoprofile">

                    <i></i>
                  </div>
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
              <span class="menu-title" data-i18n="nav.templates.main">Riwayat Absen</span>
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

  <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

  <script>var hostUrl = "assets/";</script>
  <script src="{{asset('assets/js/core/app-menu.min.js')}}"></script>
  <script src="{{asset('assets/js/core/app.min.js')}}"></script>
  <script src="{{asset('assets/extends/page/login.js')}}"></script>
  <script src="{{asset('assets/extends/page/configuration.js')}}"></script>
  <script src="{{asset('assets/vendors/js/animation/loaders.js')}}"></script>
  <script>
    jQuery(document).ready(function () {
      notifikasi();
      displayTime();
      if (localStorage.getItem("role_id") == 3) {
        $('#nav-management').hide();
        $('#three-card').hide();
        $('#graph').hide();
        $('#tb-kehadiran').hide();
        $('#nav-persetujuan').hide();
        foto_profile();
      } else if (localStorage.getItem("role_id") == 2) {
        let htmlprofile = ``;
        htmlprofile += `<img src="{{asset('img/profile.png')}}" alt="">`;
        $('#fotoprofile').html(htmlprofile);
        $('#three-card').show();
        $('#graph').show();
        $('#tb-kehadiran').show();
        $('#absen').hide();
        $('#profile-karyawan').hide();
        $('#ijin-pengajuan').hide();
        $('#cuti-pengajuan').hide();
        
      }
      else if(localStorage.getItem("role_id") == 1 ){
       let htmlprofile = ``;
       htmlprofile += `<img src="{{asset('img/profile.png')}}" alt="">`;
       $('#fotoprofile').html(htmlprofile);
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
    function displayTime() {
      var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
      var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

      var newDate = new Date();
      newDate.setDate(newDate.getDate());
      $('#date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
      setInterval( function() {
        var hours = new Date().getHours();
        var minutes = new Date().getMinutes();
        var seconds = new Date().getSeconds();
        $("#Clock").html((( hours < 10 ? "0" : "" ) + hours) + ':' + (( minutes < 10 ? "0" : "" ) + minutes) + ':' + (( seconds < 10 ? "0" : "" ) + seconds));
      }, 1000);
    }
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

    function notifikasi() {
      let htmlNotifikasi = ``;
      let htmlNothing = ``;
      let mark = '';
      $.ajax({
        url:`${urlApi}notifications`,
        type:'GET',
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
          let dataNotif = response?.data?.notifications;
          $('#count-notify').text(`${response?.data?.count_notifikasi}`);
          if (response?.data?.count_notifikasi == 0) {
            $('#count-new').hide();
          }else{
            $('#count-new').text(`${response?.data?.count_notifikasi} New`);
          }
          if (dataNotif.length == 0) {
            htmlNothing+=`
            <div class="box-notif">
            <div class="notif-img">
            <img src="{{asset('img/notif.png')}}" alt="" class="img-fluid">
            </div>
            <span>Belum ada notifikasi!</span>
            </div>
            `;
            $('#notify').html(htmlNothing);
          } else{
            $.each(dataNotif,function (index,element) {
              mark = element?.id;
              let read = element?.read_at;
              let dataTanggal = element?.created_at;
              let split1 = dataTanggal.split('T');
              let split2 = split1[0].split('-');
              let bulan = '';
              let hasil = '';
              if (split2[1] == 1) {
                bulan = 'Januari';
              } else if (split2[1] == 2) {
                bulan = 'Februari';
              } else if (split2[1] == 3) {
                bulan = 'Maret';
              } else if (split2[1] == 4) {
                bulan = 'April';
              } else if (split2[1] == 5) {
                bulan = 'Mei';
              } else if (split2[1] == 6) {
                bulan = 'Juni';
              } else if (split2[1] == 7) {
                bulan = 'Juli';
              } else if (split2[1] == 8) {
                bulan = 'Agustus';
              } else if (split2[1] == 9) {
                bulan = 'September';
              } else if (split2[1] == 10) {
                bulan = 'Oktober';
              } else if (split2[1] == 11) {
                bulan = 'November';
              } else if (split2[1] == 12) {
                bulan = 'Desember';
              }
              hasil = split2[2]+' '+bulan+' '+split2[0];

              if (!read) {
                htmlNotifikasi+=`
                <a href="${element?.data?.url}" onclick="markAsRead('${mark}')">
                <div class="media">
                <div class="media-left align-self-center">
                <i class="ft-bell icon-bg-circle bg-cyan"></i>
                </div>
                <div class="media-body">
                <h6 class="media-heading">${element?.data?.status}</h6>
                <p class="notification-text font-small-3 text-muted">${element?.data?.description}</p>
                <small>
                <time class="media-meta text-muted" >${hasil}</time>
                </small>
                </div>
                </div>
                </a>
                `;
              }else{
                htmlNotifikasi+=`
                <a href="${element?.data?.url}">
                <div class="media">
                <div class="media-left align-self-center">
                <i class="ft-bell icon-bg-circle bg-grey"></i>
                </div>
                <div class="media-body">
                <h6 class="media-heading font-weight-normal">${element?.data?.status}</h6>
                <p class="notification-text font-small-3 text-muted">${element?.data?.description}</p>
                <small>
                <time class="media-meta text-muted" >${hasil}</time>
                </small>
                </div>
                </div>
                </a>
                `;
              }
              $('#notify').html(htmlNotifikasi);
            });
          }

        },
        error:function(xhr){
          handleErrorLogin(xhr);
        }
      });
    }

    function markAsRead(id) {
      $.ajax({
        type: "POST",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
        data: {
          id: id
        },
        url: `${urlApi}notifications/mark`,
        success: function (response) {
          notifikasi();
        },
        error: function (xhr) {
          handleErrorLogin(xhr);
        },
      });
    }
    
    function foto_profile() {
      $.ajax({
        url:`${urlApi}profile`,
        type:'GET',
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
          let res = response?.data?.data_profile?.attachment;
          let html = ``;
          if (res != null) {
            html+=`
            <img src="${baseUrl}storage/${res}" alt="">
            `;
          }
          
          $('#fotoprofile').html(html);
        },
        error:function(xhr){
          if (xhr.status==422) {
            let html = ``;
            html+=`<img src="${baseUrl}img/default-profile.jpg" alt="">`;
            $('#fotoprofile').html(html);
          };
          
        }
      });
    }
  </script>
</body>
</html>