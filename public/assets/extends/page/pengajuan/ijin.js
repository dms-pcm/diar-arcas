let data = '';
let id_edit = '';
jQuery(document).ready(function() {
	preview();
	showData();
	previewEdit();
	$('#nav-pengajuan').addClass('open');
	$('#ijin-pengajuan').addClass('active');
});

function showDiv(select){
	if(select.value==1){
	  document.getElementById('sakit').style.display = "block";
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

function previewEdit() {
    surat_edit.onchange = evt => {
        const [file] = surat_edit.files
        if (file) {
			surat_preview_edit.src = URL.createObjectURL(file)
      }
  }
}

function showData() {
	$('#tb-ijin').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url:`${urlApi}pengajuan`,
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				Authorization: "Bearer " + localStorage.getItem("token"),
			},
			async: true,
			dataSrc: function ( json ) {
				data = json?.data;
                return json.data;
            },
			error: function (xhr, error, code) {
				handleErrorSimpan(xhr);
			}
		},
		columns: [
			{
				data: 'DT_RowIndex',
				name: 'DT_RowIndex'
			},
			{
				data: 'nama_karyawan',
				name: 'nama_karyawan'
			},
			{
				data: 'jabatan_karyawan',
				name: 'jabatan_karyawan'
			},
			{
				data: 'tgl_izin',
				name: 'tgl_izin'
			},
			{
				data: 'lama_izin',
				name: 'lama_izin'
			},
			{
				data: 'status',
				orderable: true, 
				searchable: true,
				render: function (data, type, row) {
					if (data == 1 && row?.draft == 0) {
						return '<p class="badge badge-warning round">Menunggu</p>';
					} else if(data == 2){
						return '<p class="badge badge-success round">Disetujui</p>';
					} else if(data == 3){
						return '<p class="badge badge-danger round">Ditolak</p>';
					} else if(data == 1 && row?.draft == 1){
						return '<p class="badge badge-grey bg-grey round">Draft</p>';
					}
				}
			},
			{
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
		]
	});
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

function viewPengajuan(id) {
	$('#viewpengajuan').modal('show');
	$.each(data,function (index,element) {
		if (element?.id == id) {
			$('#viewpengajuan #nama_karyawan').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewpengajuan #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewpengajuan #tgl_izin').html(':&nbsp; '+element?.tgl_izin);
			$('#viewpengajuan #durasi').html(':&nbsp; '+element?.lama_izin);
			if (element?.status == 1) {
				$('#viewpengajuan #status').html('<p class="badge badge-warning round">Menunggu</p>');
			} else if(element?.status == 2){
				$('#viewpengajuan #status').html('<p class="badge badge-success round">Disetujui</p>');
			} else if (element?.status == 3) {
				$('#viewpengajuan #status').html('<p class="badge badge-danger round">Ditolak</p>');
			}
			$('#viewpengajuan #alasan').html(':&nbsp; '+element?.alasan);
			
			if (element?.attachment != null) {
				$('#viewpengajuan #bukti_surat').html(`<img src="${baseUrl}storage/${element?.attachment}" width="80" alt="Surat dokter"></img>`);
			} else {
				$('#viewpengajuan #bukti_surat').html('');
			}
		}
	})
}

function editUser(id) {
	$('#edit_izin').modal('show');
	$.each(data,function (index,element) {
		if (element?.id == id) {
			$('#edit_izin #nama').val(element?.nama_karyawan);
			$('#edit_izin #jabatan').val(element?.jabatan_karyawan);
			$('#edit_izin #jenis_izin').val(element?.jenis_izin);
			$('#edit_izin #animate').val(element?.tgl_izin);
			$('#edit_izin #durasi_izin').val(element?.lama_izin);
			$('#edit_izin #alasan').val(element?.alasan);
		}
	});
	id_edit = id;
}

function ajaxEdit() {
	var formData = new FormData();
	formData.append('attachment', $('#edit_izin input[type="file"]')[0].files[0]);
	formData.append('nama_karyawan', $('#edit_izin #nama').val());
	formData.append('jabatan_karyawan', $('#edit_izin #jabatan').val());
	formData.append('jenis_izin', $('#edit_izin #jenis_izin').val());
	formData.append('tgl_izin', $('#edit_izin #animate').val());
	formData.append('lama_izin', $('#edit_izin #durasi_izin').val());
	formData.append('alasan', $('#edit_izin #alasan').val());

	AmagiLoader.show();
    $.ajax({
        url:`${urlApi}pengajuan/edit-izin/${id_edit}`,
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

// function selectJenisIzin(select){
// 	if(select.value==1){
// 	  document.getElementById('wk').style.display = "block";
// 	} else{
// 	  document.getElementById('wk').style.display = "none";
// 	}
// }