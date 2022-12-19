let foto_profile = '';
jQuery(document).ready(function() {
    preview();
    show();
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

function preview() {
    img_input.onchange = evt => {
        const [file] = img_input.files
        if (file) {
          blah.src = URL.createObjectURL(file)
      }
  }
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
        },
        error:function(xhr){
            handleErrorSimpan(xhr);
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