let data = '';
let id_edit = '';
let data_admin = '';
jQuery(document).ready(function() {
	preview();
	
	previewEdit();
	$('#nav-pengajuan').addClass('open');
	$('#ijin-pengajuan').addClass('active');
	if (localStorage.getItem("role_id") == 1 ) {
		showDataAdmin();
		$('#btn-izin').hide();
	}
	else if (localStorage.getItem("role_id") == 3 ) {
		showData();
	}
});


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
		scrollX: "50vw",
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
			render: function (data, type, row) {
				let bulan = '';
				let hasil = '';
				let tanggal = data;
				let pecah = tanggal.split('-');
				if (pecah[1] == 1) {
					bulan = 'Januari';
				} else if (pecah[1] == 2) {
					bulan = 'Februari';
				} else if (pecah[1] == 3) {
					bulan = 'Maret';
				} else if (pecah[1] == 4) {
					bulan = 'April';
				} else if (pecah[1] == 5) {
					bulan = 'Mei';
				} else if (pecah[1] == 6) {
					bulan = 'Juni';
				} else if (pecah[1] == 7) {
					bulan = 'Juli';
				} else if (pecah[1] == 8) {
					bulan = 'Agustus';
				} else if (pecah[1] == 9) {
					bulan = 'September';
				} else if (pecah[1] == 10) {
					bulan = 'Oktober';
				} else if (pecah[1] == 11) {
					bulan = 'November';
				} else if (pecah[1] == 12) {
					bulan = 'Desember';
				}
				hasil = pecah[2]+' '+bulan+' '+pecah[0];
				return hasil;
			}
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

function showDataAdmin() {
	$('#tb-ijin').DataTable({
		scrollX: "50vw",
		processing: true,
		serverSide: true,
		ajax: {
			url:`${urlApi}pengajuan/show-izin-admin`,
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				Authorization: "Bearer " + localStorage.getItem("token"),
			},
			async: true,
			dataSrc: function ( json ) {
				data_admin = json?.data;
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
			render: function (data, type, row) {
				let bulan = '';
				let hasil = '';
				let tanggal = data;
				let pecah = tanggal.split('-');
				if (pecah[1] == 1) {
					bulan = 'Januari';
				} else if (pecah[1] == 2) {
					bulan = 'Februari';
				} else if (pecah[1] == 3) {
					bulan = 'Maret';
				} else if (pecah[1] == 4) {
					bulan = 'April';
				} else if (pecah[1] == 5) {
					bulan = 'Mei';
				} else if (pecah[1] == 6) {
					bulan = 'Juni';
				} else if (pecah[1] == 7) {
					bulan = 'Juli';
				} else if (pecah[1] == 8) {
					bulan = 'Agustus';
				} else if (pecah[1] == 9) {
					bulan = 'September';
				} else if (pecah[1] == 10) {
					bulan = 'Oktober';
				} else if (pecah[1] == 11) {
					bulan = 'November';
				} else if (pecah[1] == 12) {
					bulan = 'Desember';
				}
				hasil = pecah[2]+' '+bulan+' '+pecah[0];
				return hasil;
			}
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
	// let tanggal =  $('#animate').val();
	// let split = tanggal.split('/');
	// let hasil = split[2] + '-' + split[0] + '-' + split[1];
	// if (hasil == 'undefined--undefined') {
	// 	hasil = '';
	// }else {
	// 	hasil;
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

function viewPengajuan(id) {
	$('#viewpengajuan').modal('show');
	$.each(data,function (index,element) {
		if (element?.id == id) {
			let bulan = '';
			let hasil = '';
			let tanggal = element?.tgl_izin;
			let pecah = tanggal.split('-');
			if (pecah[1] == 1) {
				bulan = 'Januari';
			} else if (pecah[1] == 2) {
				bulan = 'Februari';
			} else if (pecah[1] == 3) {
				bulan = 'Maret';
			} else if (pecah[1] == 4) {
				bulan = 'April';
			} else if (pecah[1] == 5) {
				bulan = 'Mei';
			} else if (pecah[1] == 6) {
				bulan = 'Juni';
			} else if (pecah[1] == 7) {
				bulan = 'Juli';
			} else if (pecah[1] == 8) {
				bulan = 'Agustus';
			} else if (pecah[1] == 9) {
				bulan = 'September';
			} else if (pecah[1] == 10) {
				bulan = 'Oktober';
			} else if (pecah[1] == 11) {
				bulan = 'November';
			} else if (pecah[1] == 12) {
				bulan = 'Desember';
			}
			hasil = pecah[2]+' '+bulan+' '+pecah[0];
			$('#viewpengajuan #nama_karyawan').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewpengajuan #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewpengajuan #tgl_izin').html(':&nbsp; '+hasil);
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
				$('#viewpengajuan #bukti_surat').html(`<span class="text-center mb-1">Klik gambar untuk melihat surat dokter!</span><a href="${baseUrl}storage/${element?.attachment}" title="Surat Dokter" data-fancybox="gallery"
					data-caption="Surat Dokter"><img src="${baseUrl}storage/${element?.attachment}" class="img-izin" alt="Surat dokter"></img></a>`);

			} else {
				$('#viewpengajuan #bukti_surat').html('');
			}
		}
	})
}

function viewIzinAdmin(id) {
	$('#viewpengajuan').modal('show');
	$.each(data_admin,function (index,element) {
		if (element?.id == id) {
			let bulan = '';
			let hasil = '';
			let tanggal = element?.tgl_izin;
			let pecah = tanggal.split('-');
			if (pecah[1] == 1) {
				bulan = 'Januari';
			} else if (pecah[1] == 2) {
				bulan = 'Februari';
			} else if (pecah[1] == 3) {
				bulan = 'Maret';
			} else if (pecah[1] == 4) {
				bulan = 'April';
			} else if (pecah[1] == 5) {
				bulan = 'Mei';
			} else if (pecah[1] == 6) {
				bulan = 'Juni';
			} else if (pecah[1] == 7) {
				bulan = 'Juli';
			} else if (pecah[1] == 8) {
				bulan = 'Agustus';
			} else if (pecah[1] == 9) {
				bulan = 'September';
			} else if (pecah[1] == 10) {
				bulan = 'Oktober';
			} else if (pecah[1] == 11) {
				bulan = 'November';
			} else if (pecah[1] == 12) {
				bulan = 'Desember';
			}
			hasil = pecah[2]+' '+bulan+' '+pecah[0];
			$('#viewpengajuan #nama_karyawan').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewpengajuan #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewpengajuan #tgl_izin').html(':&nbsp; '+hasil);
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
				$('#viewpengajuan #bukti_surat').html(`<span class="text-center mb-1">Klik gambar untuk melihat surat dokter!</span><a href="${baseUrl}storage/${element?.attachment}" title="Surat Dokter" data-fancybox="gallery"
					data-caption="Surat Dokter"><img src="${baseUrl}storage/${element?.attachment}" class="img-izin" alt="Surat dokter"></img></a>`);

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

// function selectJenisIzin(select){
// 	if(select.value==1){
// 	  document.getElementById('wk').style.display = "block";
// 	} else{
// 	  document.getElementById('wk').style.display = "none";
// 	}
// }