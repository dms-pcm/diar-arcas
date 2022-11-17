let dataAbsen = "";
jQuery(document).ready(function() {
  $('#nav-dashboard').addClass('active');
  setInterval(displayTime, 1000);
  displayTime();
  presensi();
  showAbsen();
});

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

        let data = response?.data;
        dataAbsen = data;
        if (response?.data.length == 0) {
          if(pukul < "08:00:00"){
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          }else if (pukul == "08:45:00" || pukul <= "09:15:00") {
            $('#masuk').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          } else if(pukul == "09:15:01" || pukul <= "16:59:59"){
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
          } else if (pukul >= "17:00:00") {
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang').removeClass('d-none');
          }
        } else {
          $.each(data, function (index,element) {
            if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Masuk" && element?.tanggal == hari_ini && pukul <= "09:15:00") {
              $('#masuk_disabled').removeClass('d-none');
              $('#pulang_disabled').removeClass('d-none');
            }else if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Pulang" && element?.tanggal == hari_ini) {
              $('#masuk_disabled').removeClass('d-none');
              $('#pulang_disabled').removeClass('d-none');
              $('#pulang').addClass('d-none');
            }else if (element?.id_user == localStorage.getItem("user_id") && element?.status == "Tidak Masuk" && element?.tanggal == hari_ini) {
              $('#masuk_disabled').removeClass('d-none');
              $('#pulang_disabled').removeClass('d-none');
              $('#pulang').addClass('d-none');
            }
            else {
              if(pukul < "08:00:00"){
                $('#masuk_disabled').removeClass('d-none');
                $('#pulang_disabled').removeClass('d-none');
              }else if (pukul == "08:45:00" || pukul <= "09:15:00") {
                $('#masuk').removeClass('d-none');
                $('#pulang_disabled').removeClass('d-none');
              }else if(pukul == "09:15:01" || pukul <= "16:59:59"){
                $('#masuk_disabled').removeClass('d-none');
                $('#pulang_disabled').removeClass('d-none');
              } 
              else if (pukul >= "17:00:00") {
                $('#masuk_disabled').removeClass('d-none');
                $('#pulang').removeClass('d-none');
              }
            }
          });
        }
        absenTerlambat();
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
      if (localStorage.getItem("user_id") && pukul > "09:15:00") {
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
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
            $('#pulang').addClass('d-none');
          },
          error:function(xhr){
              
          }
        });
      }
    }
  } else {
    //start | ketika user telat absen
    if (localStorage.getItem("role_id") == 3) {
      if (localStorage.getItem("user_id") && pukul > "09:15:00") {
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
            $('#masuk_disabled').removeClass('d-none');
            $('#pulang_disabled').removeClass('d-none');
            $('#pulang').addClass('d-none');
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
                $('#pulang_disabled').removeClass('d-none');
                $('#pulang').addClass('d-none');
            });
        },
        error:function(xhr){
            AmagiLoader.hide();
            handleErrorSimpan(xhr);
        }
    });

  });
}