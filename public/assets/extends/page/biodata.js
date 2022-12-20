let foto_profile = '';
jQuery(document).ready(function() {
    preview();
    displayTime();
    notifikasi();
    $('#app').addClass('d-none');
    $('#bio').removeClass('d-none');
    show();
    displayTime();
    $('#btn-simpan').on('click',function () {
        simpanData();
    });

    if (localStorage.getItem("role_id") == 3) {
        $('#nav-management').hide();
        $('#three-card').hide();
        $('#graph').hide();
        $('#tb-kehadiran').hide();
        $('#nav-persetujuan').hide();
    }
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
function preview() {
    img_input.onchange = evt => {
        const [file] = img_input.files
        if (file) {
          blah.src = URL.createObjectURL(file)
      }
  }
}

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

function show() {
    $.ajax({
        url:`${urlApi}profile`,
        type:'GET',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
            let data = response?.data?.data_profile;
            foto_profile = data?.attachment;
            $('#nama_lengkap').text(data?.nama_lengkap);
            $('#blah').attr('src',`${baseUrl}storage/${data?.attachment}`);
            $('#nama').val(data?.nama_lengkap);
            $('#tempat_lahir').val(data?.tempat_lahir);
            let tanggal =  data?.tgl_lahir;
            let split = tanggal.split('-');
            let hasil = split[2] + '/' + split[1] + '/' + split[0];
            $('#tgl_lahir').val(hasil);
            $('#alamat').val(data?.alamat);
            $('#email').val(data?.email);
            $('#no_hp').val(data?.no_hp);

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
            handleErrorLogin(xhr);
        }
    });
}

function simpanData() {
    var formData = new FormData(document.getElementById('data_profile'));
    let isData = `${baseUrl}storage/${foto_profile}`;
    let b = $('#blah').attr('src');
    let tanggal =  $('#tgl_lahir').val();
    let split = tanggal.split('/');
    let hasil = split[2] + '-' + split[1] + '-' + split[0];
    if (b == isData) {//profile tidak diganti
        formData.append('nama_lengkap', $('#nama').val());
        formData.append('tempat_lahir', $('#tempat_lahir').val());
        formData.append('tgl_lahir', hasil);
        formData.append('alamat', $('#alamat').val());
        formData.append('email', $('#email').val());
        formData.append('no_hp', $('#no_hp').val());
    } else {
        formData.append('attachment', $('input[type="file"]')[0].files[0]);
        formData.append('nama_lengkap', $('#nama').val());
        formData.append('tempat_lahir', $('#tempat_lahir').val());
        formData.append('tgl_lahir', hasil);
        formData.append('alamat', $('#alamat').val());
        formData.append('email', $('#email').val());
        formData.append('no_hp', $('#no_hp').val());   
    }

    AmagiLoader.show();
    $.ajax({
        url:`${urlApi}profile/tambah-data`,
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
            // Get the existing data
            var existing = localStorage.getItem('nama_user');
            var data = existing ? $('#nama').val() : existing;
            localStorage.setItem('nama_user', data);
            Swal.fire({
                title: "Berhasil!",
                text: response.status.message,
                icon: "success",
                allowOutsideClick: false,
            }).then((result) => {
                window.location = `${baseUrl}biodata`;
            });
        },
        error:function(xhr){
            AmagiLoader.hide();
            handleErrorSimpan(xhr);
        }
    });
}
