let dataAbsen = "";
let month = '';
let year = '';
jQuery(document).ready(function() {
  $('#nav-dashboard').addClass('active');
  setInterval(displayTime, 1000);
  displayTime();
  if (localStorage.getItem("role_id") == 3) {
    showAbsen();
    presensi();
    show();
    showNama();
    preview();
  }else if(localStorage.getItem("role_id") == 2 || localStorage.getItem("role_id") == 1){
    jumlah();
    filter();
    chartMonth();
  }
});

function show() {
  $.ajax({
    url:`${urlApi}profile`,
    type:'GET',
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    success:function(response){

    },
    error:function(xhr){
      let code = xhr.status;
      if(code == 422) {
        Swal.fire({
          title: "Oopss...",
          icon: "warning",
          text: "Silahkan isi data diri terlebih dahulu",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Oke",
          allowOutsideClick: false,
        }).then((result) => {
          window.location = `${baseUrl}biodata`;
        });
      }
    }
  });
}

function displayTime() {
  const timeNow = new Date();
  let hoursOfDay = timeNow.getHours();
  let minutes = timeNow.getMinutes();
  let seconds = timeNow.getSeconds();
  let date = timeNow.getDate();
  let weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
  let today = weekDay[timeNow.getDay()];
  let months = timeNow.toLocaleString("default", {
    month: "long"
  });
  let year = timeNow.getFullYear();
  let period = "AM";
  if (hoursOfDay > 12) {
    hoursOfDay -= 12;
    period = "PM";
  }
  if (hoursOfDay === 0) {
    hoursOfDay = 12;
    period = "AM";
  }
  hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;
  let time = hoursOfDay + ":" + minutes + ":" + seconds + " " + period;
  document.getElementById('Clock').innerHTML = time;
  document.getElementById('date').innerHTML = today + ", " + date + " " + months + " " + year;
}

function showAbsen() {
  $.ajax({
    url:`${urlApi}presensi`,
    type:'GET',
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    success:function(response){
      if (localStorage.getItem("role_id") == 3) {
        const jam = new Date();
        let hari_ini = jam.getFullYear() + "-" + (jam.getMonth()+1) + "-" + jam.getDate();
        let pukul = jam.toLocaleTimeString(
          'en-US', {
            hour12: false,
          });

        let data = response?.data?.data_absen;
        dataAbsen = data;
        let tgl_lembur = '';
        let jam_lembur = '';
        $.each(response?.data?.data_lembur, function (index,element) {
          if (element?.tgl_izin == hari_ini) {
            tgl_lembur = element?.tgl_izin;
            jam_lembur = element?.selesai_lembur;
          }
        });
        
        if (response?.data.length == 0) {
          // if(pukul < "08:00:00"){
          //   $('#masuk_disabled').removeClass('d-none');
          //   $('#pulang_disabled').removeClass('d-none');
          // }else if (pukul == "08:45:00" || pukul <= "09:15:59") {
          //   $('#masuk').removeClass('d-none');
          //   $('#pulang_disabled').removeClass('d-none');
          // } else if(pukul == "09:16:00" || pukul <= "16:59:59"){
          //   absenTerlambat();
          //   $('#masuk_disabled').removeClass('d-none');
          //   $('#pulang_disabled').removeClass('d-none');
          // } else if(pukul >= "17:00:00" && pukul <= jam_lembur && hari_ini == tgl_lembur){
          //   $('#masuk_disabled').removeClass('d-none');
          //   $('#pulang_disabled').removeClass('d-none');
          // } else if (pukul >= "17:00:00") {
          //   $('#masuk_disabled').removeClass('d-none');
          //   $('#pulang').removeClass('d-none');
          // }

          if (pukul < "08:00:00") {
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          }else{
            $('#masuk').removeClass('d-none');
            $('#pulang').removeClass('d-none');
          }
          
        } else {
          // else {

          // if(pukul < "08:00:00"){
          //   $('#masuk_disabled').removeClass('d-none');
          //   $('#pulang_disabled').removeClass('d-none');
          // }else if (pukul == "08:45:00" || pukul <= "09:15:59") {
          //   $('#masuk').removeClass('d-none');
          //   $('#pulang_disabled').removeClass('d-none');
          // }
          // else if(pukul == "09:16:00" || pukul <= "16:59:59"){
          //   absenTerlambat();
          //   $('#masuk_disabled').removeClass('d-none');
          //   $('#pulang_disabled').removeClass('d-none');
          // } 
          // else if(pukul >= "17:00:00" && pukul <= jam_lembur && hari_ini == tgl_lembur){
          //   $('#masuk_disabled').removeClass('d-none');
          //   $('#pulang_disabled').removeClass('d-none');
          // }
          // else if (pukul >= "17:00:00") {
          //   $('#masuk_disabled').removeClass('d-none');
          //   $('#pulang').removeClass('d-none');
          // }

          // }
          if (pukul < "08:00:00") {
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          }else{
            $('#masuk').removeClass('d-none');
            $('#pulang').removeClass('d-none');
          }

          $.each(data, function (index,element) {
            if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Masuk" && element?.tanggal == hari_ini) { //&& pukul <= "09:15:59"
              // console.log('hai');
              $('#masuk_disabled').removeClass('d-none');
              // $('#pulang_disabled').removeClass('d-none');
              $('#masuk').addClass('d-none');
              // $('#pulang').addClass('d-none');
            }else if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Pulang" && element?.tanggal == hari_ini) {
              // console.log('halo');
              $('#masuk_disabled').removeClass('d-none');
              $('#pulang_disabled').removeClass('d-none');
              $('#masuk').addClass('d-none');
              $('#pulang').addClass('d-none');
            }else if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Tidak Masuk" && element?.tanggal == hari_ini) {
              // console.log('cek');
              $('#masuk_disabled').removeClass('d-none');
              $('#pulang_disabled').removeClass('d-none');
              $('#masuk').addClass('d-none');
              $('#pulang').addClass('d-none');
            }

            if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Masuk" && element?.tanggal == hari_ini) {
              $('#jam_masuk').text(element?.jam);
              $('#jam_pulang').text('-');
            } else if(element?.id_user == localStorage.getItem("user_id") && element?.status == "Pulang" && element?.tanggal == hari_ini){
              $('#jam_pulang').text(element?.jam);
            } else if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Tidak Masuk" && element?.tanggal == hari_ini) {
              $('#jam_masuk').text('-');
              $('#jam_pulang').text('-');
            }
          });
        }
      }
    },
    error:function(xhr){
        // AmagiLoader.hide();
      handleErrorSimpan(xhr);
    }
  });
}

function absenTerlambat() {
  const telat = new Date();
  let day = telat.getDate();
  if (day == '1') {
    day = '01';
  } else if (day == '2') {
    day = '02';
  } else if (day == '3') {
    day = '03';
  } else if (day == '4') {
    day = '04';
  } else if (day == '5') {
    day = '05';
  } else if (day == '6') {
    day = '06';
  } else if (day == '7') {
    day = '07';
  } else if (day == '8') {
    day = '08';
  } else if (day == '9') {
    day = '09';
  }

  let jamTelat = telat.getHours() + ":" + telat.getMinutes() + ":" + telat.getSeconds();
  let tanggalTelat = telat.getFullYear() + "-" + (telat.getMonth()+1) + "-" + day;
  let pukul = telat.toLocaleTimeString(
    'en-US', {
      hour12: false,
    });

  if (dataAbsen == undefined) {
    if (localStorage.getItem("role_id") == 3) {
      if (localStorage.getItem("user_id") && pukul > "09:15:59") {
        $.ajax({
          url:`${urlApi}presensi/tambah-absen`,
          type:'POST',
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
          data:{
            jam: jamTelat,
            tanggal: tanggalTelat
          },
          success:function(response){

          },
          error:function(xhr){

          }
        });
      }
    }
  } else {
    //start | ketika user telat absen
    if (localStorage.getItem("role_id") == 3) {
      if (localStorage.getItem("user_id") && pukul > "09:15:59") {
        $.ajax({
          url:`${urlApi}presensi/tambah-absen`,
          type:'POST',
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
          data:{
            jam: jamTelat,
            tanggal: tanggalTelat
          },
          success:function(response){

          },
          error:function(xhr){

          }
        });
      }
    }
    //end | ketika user telat absen
  }
}

function presensi() {
  const waktu = new Date();
  let jamAbsen = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
  let tanggalAbsen = waktu.getFullYear() + "-" + (waktu.getMonth()+1) + "-" + waktu.getDate();

  $('#masuk').on('click',function () {
    AmagiLoader.show();
    $.ajax({
      url:`${urlApi}presensi/tambah-absen`,
      type:'POST',
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        Authorization: "Bearer " + localStorage.getItem("token"),
      },
      data:{
       jam: jamAbsen,
       tanggal: tanggalAbsen
     },
     success:function(response){
      AmagiLoader.hide();
      Swal.fire({
        title: "Berhasil!",
        text: response.status.message,
        icon: "success",
        allowOutsideClick: false,
      }).then((result) => {
        window.location = `${baseUrl}dashboard`;
      });
    },
    error:function(xhr){
      AmagiLoader.hide();
      handleErrorSimpan(xhr);
    }
  });

  });

  $('#pulang').on('click',function () {
    AmagiLoader.show();
    $.ajax({
      url:`${urlApi}presensi/tambah-absen`,
      type:'POST',
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        Authorization: "Bearer " + localStorage.getItem("token"),
      },
      data:{
       jam: jamAbsen,
       tanggal: tanggalAbsen
     },
     success:function(response){
      AmagiLoader.hide();
      Swal.fire({
        title: "Berhasil!",
        text: response.status.message,
        icon: "success",
        allowOutsideClick: false,
      }).then((result) => {
        window.location = `${baseUrl}dashboard`;
                // $('#pulang_disabled').removeClass('d-none');
                // $('#pulang').addClass('d-none');
      });
    },
    error:function(xhr){
      AmagiLoader.hide();
      handleErrorSimpan(xhr);
    }
  });

  });
}
// pengajuan izin
function showDiv(select){
  if(select.value==1){
    document.getElementById('sakit').style.display = "flex";
  } else{
    document.getElementById('sakit').style.display = "none";
  }
}

function preview() {
  surat_dokter.onchange = evt => {
    const [file] = surat_dokter.files
    if (file) {
      surat_preview.src = URL.createObjectURL(file)
    }
  }
}


function simpanIzin() {
  var formData = new FormData(document.getElementById('data_izin'));
  // let tanggal =  $('#animate').val();
  // let split = tanggal.split('/');
  // let hasil = split[2] + '-' + split[0] + '-' + split[1];
  // if (hasil == 'undefined--undefined') {
  //   hasil = '';
  // }else {
  //   hasil;
  // }
  if ($('#jenis_izin').val() == 0) {//izin lainnya
    formData.append('nama_karyawan', $('#tambah_izin #nama').val());
    formData.append('jabatan_karyawan', $('#tambah_izin #jabatan').val());
    formData.append('jenis_izin', $('#tambah_izin #jenis_izin').val());
    formData.append('tgl_izin', $('#animate').val());
    formData.append('lama_izin', $('#tambah_izin #durasi_izin').val());
    formData.append('alasan', $('#tambah_izin #alasan').val());
  } else if($('input[type="file"]')[0].files[0] == undefined && $('#jenis_izin').val() == 1){
    formData.append('nama_karyawan', $('#tambah_izin #nama').val());
    formData.append('jabatan_karyawan', $('#tambah_izin #jabatan').val());
    formData.append('jenis_izin', $('#tambah_izin #jenis_izin').val());
    formData.append('tgl_izin', $('#animate').val());
    formData.append('lama_izin', $('#tambah_izin #durasi_izin').val());
    formData.append('alasan', $('#tambah_izin #alasan').val());
    formData.append('draft', '1');
  } else{
    formData.append('attachment', $('#tambah_izin input[type="file"]')[0].files[0]);
    formData.append('nama_karyawan', $('#tambah_izin #nama').val());
    formData.append('jabatan_karyawan', $('#tambah_izin #jabatan').val());
    formData.append('jenis_izin', $('#tambah_izin #jenis_izin').val());
    formData.append('tgl_izin', $('#animate').val());
    formData.append('lama_izin', $('#tambah_izin #durasi_izin').val());
    formData.append('alasan', $('#tambah_izin #alasan').val());
  }

  AmagiLoader.show();
  $.ajax({
    url:`${urlApi}pengajuan/tambah-izin`,
    type:'POST',
    data: formData,
    processData: false,
    contentType: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    success:function(response){
      AmagiLoader.hide();
      Swal.fire({
        title: "Berhasil!",
        text: response.status.message,
        icon: "success",
        allowOutsideClick: false,
      }).then((result) => {
        window.location = `${baseUrl}ijin`;
      });
    },
    error:function(xhr){
      AmagiLoader.hide();
      handleErrorSimpan(xhr);
    }
  });
}
// pengajuan izin

// pengajuan cuti
function simpanCuti() {
  // let tanggal =  $('#tambah_cuti #animate').val();
  // let split = tanggal.split('/');
  // let hasil = split[2] + '-' + split[0] + '-' + split[1];
  // if (hasil == 'undefined--undefined') {
  //   hasil = '';
  // }else {
  //   hasil;
  // }
  AmagiLoader.show();
  $.ajax({
    url:`${urlApi}pengajuan/tambah-cuti`,
    type:'POST',
    data: {
      nama_karyawan: $('#tambah_cuti #nama_karyawan').val(),
      jabatan_karyawan: $('#tambah_cuti #jabatan').val(),
      tgl_izin: $('#tambah_cuti #animate').val(),
      lama_izin: $('#tambah_cuti #durasi').val(),
      alasan: $('#tambah_cuti #alasan').val()
    },
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    success:function(response){
      AmagiLoader.hide();
      Swal.fire({
        title: "Berhasil!",
        text: response.status.message,
        icon: "success",
        allowOutsideClick: false,
      }).then((result) => {
        window.location = `${baseUrl}cuti`;
      });
    },
    error:function(xhr){
      AmagiLoader.hide();
      handleErrorSimpan(xhr);
    }
  });
}
// pengajuan cuti

// pengajuan lembur
function showNama() {
  $.ajax({
    url:`${urlApi}profile/nama`,
    type:'GET',
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    success:function(response){
      let data = response?.data?.data_profile;
      userid = data;
      var select = document.getElementById('nama_pegawai');
      $.each(data,function (index,element) {
        $(select).append("<option value="+element?.id_user+">" + element?.nama_lengkap + "</option>");
      });
    },
    error:function(xhr){

    }
  });
}

function simpanLembur() {
  let nama = '';
  $.each(userid,function (index,element) {
    if (element?.id_user == $('#tambah_lembur #nama_pegawai').val()) {
      nama = element?.nama_lengkap;
    }
  });

  // let tanggal =  $('#tambah_lembur #animate').val();
  // let split = tanggal.split('/');
  // let hasil = split[2] + '-' + split[0] + '-' + split[1];
  // if (hasil == "undefined--undefined") {
  //   hasil = '';
  // } else {
  //   hasil;
  // }

  let jam = $('#tambah_lembur #timeformat').val();
  let split2 = jam.split(' ');
  let hasilJam = split2[0];
  AmagiLoader.show();
  $.ajax({
    url:`${urlApi}pengajuan/tambah-lembur`,
    type:'POST',
    data: {
      id_user: $('#tambah_lembur #nama_pegawai').val(),
      nama_karyawan: nama,
      jabatan_karyawan: $('#tambah_lembur #jabatan').val(),
      tgl_izin: $('#tambah_lembur #animate').val(),
      lama_izin: $('#tambah_lembur #lama_lembur').val(),
      selesai_lembur: hasilJam,
      alasan: $('#tambah_lembur #alasan').val()
    },
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    success:function(response){
      AmagiLoader.hide();
      Swal.fire({
        title: "Berhasil!",
        text: response.status.message,
        icon: "success",
        allowOutsideClick: false,
      }).then((result) => {
        window.location = `${baseUrl}lembur`;
      });
    },
    error:function(xhr){
      AmagiLoader.hide();
      handleErrorSimpan(xhr);
    }
  });
}
// pengajuan lembur

function jumlah() {
  $.ajax({
    url:`${urlApi}dashboard`,
    type:'GET',
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    success:function(response){
      let res = response?.data;
      $('#jumlah_izin_lainnya').text(res?.jumlah_lainnya);
      $('#jumlah_izin_sakit').text(res?.jumlah_sakit);
      $('#jumlah_izin_cuti').text(res?.jumlah_cuti);
      $('#jumlah_izin_lembur').text(res?.jumlah_lembur);
    },
    error:function(xhr){
      handleErrorLogin(xhr);
    }
  });
}

function filter() {
  if (!$('#monthpicker').val()) {
    $('#yearpicker').attr('disabled','true');
    $('#show').attr('disabled','true');
    // $('#chart').hide();
    // $('#row_jumlah').hide();
    $('#monthpicker').on('input', function() {
      $('#yearpicker').removeAttr('disabled','true');
    });
    $('#yearpicker').on('input', function() {
      $('#show').removeAttr('disabled','true');
    });
  }
  $('#show').on('click',function () {
    // $('#initial').hide();
    month = $('#monthpicker').val();
    year = $('#yearpicker').val();
    if (month == "January") {
      month = 1;
    } else if (month == "February") {
      month = 2;
    } else if (month == "March") {
      month = 3;
    } else if (month == "April") {
      month = 4;
    } else if (month == "May") {
      month = 5;
    } else if (month == "June") {
      month = 6;
    } else if (month == "July") {
      month = 7;
    } else if (month == "August") {
      month = 8;
    } else if (month == "September") {
      month = 9;
    } else if (month == "October") {
      month = 10;
    } else if (month == "November") {
      month = 11;
    } else if (month == "December") {
      month = 12;
    }
    if (localStorage.getItem("role_id") == 2 || localStorage.getItem("role_id") == 1) {
      chart();
    }
  });
}

function chart() {
  $.ajax({
    url:`${urlApi}dashboard/graph`,
    type:'GET',
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    data: {
      bulan: month
    },
    success:function(response){
      let res = response?.data;
      let label  = '';
      let value1 = 0;
      let value2 = 0;
      let value3 = 0;
      let value4 = 0;
      let data = res?.data_all;
      let hasil = '';
      for (let i = 0; i < data.length; i++) {
        let tanggal = data[i].tanggal;
        hasil = tanggal.split('-');
        if (data[i].keterangan == 'Sangat Baik' && hasil[0] == year && hasil[1] == month) {
          value1++;
        } else if (data[i].keterangan == 'Baik' && hasil[0] == year && hasil[1] == month) {
          value2++;
        } else if (data[i].keterangan == 'Kurang' && hasil[0] == year && hasil[1] == month) {
          value3++;
        } else if (data[i].keterangan == 'Tidak Masuk/Alpha' && hasil[0] == year && hasil[1] == month) {
          value4++;
        }
        
      }
      
      if (month == hasil[1] && year == hasil[0]) {
        $('#nothing').hide();
        // $('#chart').show();
        new Chart($('#visitors-graph'), {
          type: "line",
          options: {
            responsive: !0,
            maintainAspectRatio: !1,
            legend: {
              display: !1
            },
            hover: {
              mode: "label"
            },
            scales: {
              xAxes: [{
                display: !0,
                gridLines: {
                  color: "#f3f3f3",
                  drawTicks: !1
                }
              }],
              yAxes: [{
                display: !0,
                gridLines: {
                  color: "#f3f3f3",
                  drawTicks: !1
                },
                ticks: {
                  display: !0,
                  maxTicksLimit: 5
                }
              }]
            },
            title: {
              display: !1
            },
          },
          data: {
            labels: [res?.label[0],res?.label[1],res?.label[2],res?.label[3]],
            datasets: [{
              label: ' ',
              data: [value1,value2,value3,value4],
              fill: !1,
              borderColor: "rgb(0, 0, 255)",
              pointBorderColor: "#fcba03",
              pointBackgroundColor: "#FFF",
              pointBorderWidth: 2,
              pointHoverBorderWidth: 2,
              pointRadius: 4
            }]
          }
        });
      }
      else {
        $('#chart').hide();
        $('#nothing').show();
        let html = ``;
        html += `
        <div class="row justify-content-center align-items-center flex-column">
        <img src="${baseUrl}img/empty-state.png" alt="" class="img-fluid">
        
        <h4>Data tidak ditemukan</h4>
        <span>Silahkan pilih bulan atau tahun yang sesuai</span>
        </div>
        `;
        $('#nothing').html(html);
      }
    },
    error:function(xhr){
      handleErrorLogin(xhr);
    }
  });
}

function chartMonth() {
  $.ajax({
    url:`${urlApi}dashboard/graph-month`,
    type:'GET',
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      Authorization: "Bearer " + localStorage.getItem("token"),
    },
    success:function(response){
      let res = response?.data;
      let value1 = response?.data?.data_graph?.SangatBaik;
      let value2 = response?.data?.data_graph?.Baik;
      let value3 = response?.data?.data_graph?.Kurang;
      let value4 = response?.data?.data_graph?.TidakMasuk;
        new Chart($('#visitors-graph'), {
          type: "line",
          options: {
            responsive: !0,
            maintainAspectRatio: !1,
            legend: {
              display: !1
            },
            hover: {
              mode: "label"
            },
            scales: {
              xAxes: [{
                display: !0,
                gridLines: {
                  color: "#f3f3f3",
                  drawTicks: !1
                }
              }],
              yAxes: [{
                display: !0,
                gridLines: {
                  color: "#f3f3f3",
                  drawTicks: !1
                },
                ticks: {
                  display: !0,
                  maxTicksLimit: 5
                }
              }]
            },
            title: {
              display: !1
            },
          },
          data: {
            labels: [res?.label[0],res?.label[1],res?.label[2],res?.label[3]],
            datasets: [{
              label: ' ',
              data: [value1,value2,value3,value4],
              fill: !1,
              borderColor: "rgb(0, 0, 255)",
              pointBorderColor: "#fcba03",
              pointBackgroundColor: "#FFF",
              pointBorderWidth: 2,
              pointHoverBorderWidth: 2,
              pointRadius: 4
            }]
          }
        });
    },
    error:function(xhr){
      handleErrorLogin(xhr);
    }
  });
}