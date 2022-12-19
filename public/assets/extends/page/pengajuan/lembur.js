let userid = '';
let data = '';
let data_admin = '';
let data_hrd = '';
jQuery(document).ready(function() {
	showNama();
	if (localStorage.getItem("role_id") == 2) {
		showDataHRD();
	}else if(localStorage.getItem("role_id") == 3){
		showData();
	} else if (localStorage.getItem("role_id") == 1) {
		showDataAdmin();
		$('#btn-ajukan-lembur').hide();
	}
	$('#nav-pengajuan').addClass('open');
	$('#lembur-pengajuan').addClass('active');
});

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
			var select = document.getElementById('nama_karyawan');
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
		if (element?.id_user == $('#tambah_lembur #nama_karyawan').val()) {
			nama = element?.nama_lengkap;
		}
	});

	// let tanggal =  $('#tambah_lembur #animate').val();
	// let split = tanggal.split('/');
	// let hasil = split[2] + '-' + split[0] + '-' + split[1];
	// if (hasil == "undefined--undefined") {
	// 	hasil = '';
	// } else {
	// 	hasil;
	// }

	let jam = $('#tambah_lembur #timeformat').val();
	let split2 = jam.split(' ');
	let hasilJam = split2[0];
	AmagiLoader.show();
	$.ajax({
		url:`${urlApi}pengajuan/tambah-lembur`,
		type:'POST',
		data: {
			id_user: $('#tambah_lembur #nama_karyawan').val(),
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

function showData() {
	$('#tb-lembur').DataTable({
		scrollX: "50vw",
		processing: true,
		serverSide: true,
		ajax: {
			url:`${urlApi}pengajuan/show-lembur`,
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
			data: 'selesai_lembur',
			render: function (data, type, row) {
				return data+' WIB';
			}
		},
		{
			data: 'status',
			orderable: true, 
			searchable: true,
			render: function (data, type, row) {
				if (data == 1) {
					return '<p class="badge badge-warning round">Menunggu</p>';
				} else if(data == 2){
					return '<p class="badge badge-success round">Disetujui</p>';
				} else if(data == 3){
					return '<p class="badge badge-danger round">Ditolak</p>';
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

function viewLembur(id) {
	$('#viewlembur').modal('show');
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
			$('#viewlembur #nama').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewlembur #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewlembur #tgl_izin').html(':&nbsp; '+hasil);
			$('#viewlembur #durasi').html(':&nbsp; '+element?.lama_izin);
			$('#viewlembur #selesai').html(':&nbsp; '+element?.selesai_lembur+' WIB');
			if (element?.status == 1) {
				$('#viewlembur #status').html('<p class="badge badge-warning round">Menunggu</p>');
			} else if(element?.status == 2){
				$('#viewlembur #status').html('<p class="badge badge-success round">Disetujui</p>');
			} else if (element?.status == 3) {
				$('#viewlembur #status').html('<p class="badge badge-danger round">Ditolak</p>');
			}
			$('#viewlembur #alasan').html(':&nbsp; '+element?.alasan);
		}
	})
}

function showDataAdmin() {
	$('#tb-lembur').DataTable({
		processing: true,
		serverSide: true,
		scrollX: "50vw",
		ajax: {
			url:`${urlApi}pengajuan/show-lembur-admin`,
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
			data: 'selesai_lembur',
			render: function (data, type, row) {
				return data+' WIB';
			}
		},
		{
			data: 'status',
			orderable: true, 
			searchable: true,
			render: function (data, type, row) {
				if (data == 1) {
					return '<p class="badge badge-warning round">Menunggu</p>';
				} else if(data == 2){
					return '<p class="badge badge-success round">Disetujui</p>';
				} else if(data == 3){
					return '<p class="badge badge-danger round">Ditolak</p>';
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

function viewLemburAdmin(id) {
	$('#viewlembur').modal('show');
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
			$('#viewlembur #nama').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewlembur #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewlembur #tgl_izin').html(':&nbsp; '+hasil);
			$('#viewlembur #durasi').html(':&nbsp; '+element?.lama_izin);
			$('#viewlembur #selesai').html(':&nbsp; '+element?.selesai_lembur+' WIB');
			if (element?.status == 1) {
				$('#viewlembur #status').html('<p class="badge badge-warning round">Menunggu</p>');
			} else if(element?.status == 2){
				$('#viewlembur #status').html('<p class="badge badge-success round">Disetujui</p>');
			} else if (element?.status == 3) {
				$('#viewlembur #status').html('<p class="badge badge-danger round">Ditolak</p>');
			}
			$('#viewlembur #alasan').html(':&nbsp; '+element?.alasan);
		}
	})
}

function showDataHRD() {
	$('#tb-lembur').DataTable({
		processing: true,
		serverSide: true,
		scrollX: "50vw",
		ajax: {
			url:`${urlApi}pengajuan/show-lembur-hrd`,
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				Authorization: "Bearer " + localStorage.getItem("token"),
			},
			async: true,
			dataSrc: function ( json ) {
				data_hrd = json?.data;
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
			data: 'selesai_lembur',
			render: function (data, type, row) {
				return data+' WIB';
			}
		},
		{
			data: 'status',
			orderable: true, 
			searchable: true,
			render: function (data, type, row) {
				if (data == 1) {
					return '<p class="badge badge-warning round">Menunggu</p>';
				} else if(data == 2){
					return '<p class="badge badge-success round">Disetujui</p>';
				} else if(data == 3){
					return '<p class="badge badge-danger round">Ditolak</p>';
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

function viewLemburHRD(id) {
	$('#viewlembur').modal('show');
	$.each(data_hrd,function (index,element) {
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
			$('#viewlembur #nama').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewlembur #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewlembur #tgl_izin').html(':&nbsp; '+hasil);
			$('#viewlembur #durasi').html(':&nbsp; '+element?.lama_izin);
			$('#viewlembur #selesai').html(':&nbsp; '+element?.selesai_lembur+' WIB');
			if (element?.status == 1) {
				$('#viewlembur #status').html('<p class="badge badge-warning round">Menunggu</p>');
			} else if(element?.status == 2){
				$('#viewlembur #status').html('<p class="badge badge-success round">Disetujui</p>');
			} else if (element?.status == 3) {
				$('#viewlembur #status').html('<p class="badge badge-danger round">Ditolak</p>');
			}
			$('#viewlembur #alasan').html(':&nbsp; '+element?.alasan);
		}
	})
}