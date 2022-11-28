let dataAbsen = "";
jQuery(document).ready(function() {
  $('#nav-dashboard').addClass('active');
  setInterval(displayTime, 1000);
  displayTime();
  if (localStorage.getItem("role_id") == 3) {
    showAbsen();
    presensi();
    show();
    showNama();
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
        console.log(tgl_lembur,jam_lembur);
        if (response?.data.length == 0) {
          if(pukul < "08:00:00"){
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          }else if (pukul == "08:45:00" || pukul <= "09:15:59") {
            $('#masuk').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          } else if(pukul == "09:16:00" || pukul <= "16:59:59"){
            absenTerlambat();
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          } else if(pukul >= "17:00:00" && pukul <= jam_lembur && hari_ini == tgl_lembur){
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          } else if (pukul >= "17:00:00") {
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang').removeClass('d-none');
          }
        } else {
          // else {
          if(pukul < "08:00:00"){
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          }else if (pukul == "08:45:00" || pukul <= "09:15:59") {
            $('#masuk').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          }
          else if(pukul == "09:16:00" || pukul <= "16:59:59"){
            absenTerlambat();
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          } 
          else if(pukul >= "17:00:00" && pukul <= jam_lembur && hari_ini == tgl_lembur){
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          }
          else if (pukul >= "17:00:00") {
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang').removeClass('d-none');
          }
          // }
          $.each(data, function (index,element) {
            if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Masuk" && element?.tanggal == hari_ini && pukul <= "09:15:59") {
              $('#masuk_disabled').removeClass('d-none');
              $('#pulang_disabled').removeClass('d-none');
              $('#masuk').addClass('d-none');
            }else if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Pulang" && element?.tanggal == hari_ini) {
              $('#masuk_disabled').removeClass('d-none');
              $('#pulang_disabled').removeClass('d-none');
              $('#pulang').addClass('d-none');
            }else if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Tidak Masuk" && element?.tanggal == hari_ini) {
              $('#masuk_disabled').removeClass('d-none');
              $('#pulang_disabled').removeClass('d-none');
              $('#pulang').addClass('d-none');
            }
          });
        }
        // if (pukul == "09:16:00" || pukul <= "16:59:59") {
        //   absenTerlambat();
        // }
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
  let jamTelat = telat.getHours() + ":" + telat.getMinutes() + ":" + telat.getSeconds();
  let tanggalTelat = telat.getFullYear() + "-" + (telat.getMonth()+1) + "-" + telat.getDate();
  let pukul = telat.toLocaleTimeString(
    'en-US', {
      hour12: false,
    });

  if (dataAbsen.length == 0) {
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
  let tanggal =  $('#animate').val();
  let split = tanggal.split('/');
  let hasil = split[2] + '-' + split[0] + '-' + split[1];
  if ($('#jenis_izin').val() == 0) {//izin lainnya
    formData.append('nama_karyawan', $('#tambah_izin #nama').val());
    formData.append('jabatan_karyawan', $('#tambah_izin #jabatan').val());
    formData.append('jenis_izin', $('#tambah_izin #jenis_izin').val());
    formData.append('tgl_izin', hasil);
    formData.append('lama_izin', $('#tambah_izin #durasi_izin').val());
    formData.append('alasan', $('#tambah_izin #alasan').val());
  } else if($('input[type="file"]')[0].files[0] == undefined && $('#jenis_izin').val() == 1){
    formData.append('nama_karyawan', $('#tambah_izin #nama').val());
    formData.append('jabatan_karyawan', $('#tambah_izin #jabatan').val());
    formData.append('jenis_izin', $('#tambah_izin #jenis_izin').val());
    formData.append('tgl_izin', hasil);
    formData.append('lama_izin', $('#tambah_izin #durasi_izin').val());
    formData.append('alasan', $('#tambah_izin #alasan').val());
    formData.append('draft', '1');
  } else{
    formData.append('attachment', $('#tambah_izin input[type="file"]')[0].files[0]);
    formData.append('nama_karyawan', $('#tambah_izin #nama').val());
    formData.append('jabatan_karyawan', $('#tambah_izin #jabatan').val());
    formData.append('jenis_izin', $('#tambah_izin #jenis_izin').val());
    formData.append('tgl_izin', hasil);
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
  let tanggal =  $('#tambah_cuti #animate').val();
  let split = tanggal.split('/');
  let hasil = split[2] + '-' + split[0] + '-' + split[1];
  AmagiLoader.show();
  $.ajax({
    url:`${urlApi}pengajuan/tambah-cuti`,
    type:'POST',
    data: {
      nama_karyawan: $('#tambah_cuti #nama_karyawan').val(),
      jabatan_karyawan: $('#tambah_cuti #jabatan').val(),
      tgl_izin: hasil,
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

  let tanggal =  $('#tambah_lembur #animate').val();
  let split = tanggal.split('/');
  let hasil = split[2] + '-' + split[0] + '-' + split[1];
  if (hasil == "undefined--undefined") {
    hasil = '';
  } else {
    hasil;
  }

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
      tgl_izin: hasil,
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