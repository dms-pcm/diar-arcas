let userid = '';
let data = '';
let data_admin = '';
jQuery(document).ready(function() {
	showNama();
	if (localStorage.getItem("role_id") == 2) {
		showDataAdmin();
	}else if(localStorage.getItem("role_id") == 3){
		showData();
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
			id_user: $('#tambah_lembur #nama_karyawan').val(),
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

function showData() {
	$('#tb-lembur').DataTable({
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
			name: 'tgl_izin'
		},
		{
			data: 'lama_izin',
			name: 'lama_izin'
		},
		{
			data: 'selesai_lembur',
			name: 'selesai_lembur'
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
			$('#viewlembur #nama').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewlembur #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewlembur #tgl_izin').html(':&nbsp; '+element?.tgl_izin);
			$('#viewlembur #durasi').html(':&nbsp; '+element?.lama_izin);
			$('#viewlembur #selesai').html(':&nbsp; '+element?.selesai_lembur);
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
			name: 'tgl_izin'
		},
		{
			data: 'lama_izin',
			name: 'lama_izin'
		},
		{
			data: 'selesai_lembur',
			name: 'selesai_lembur'
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
			$('#viewlembur #nama').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewlembur #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewlembur #tgl_izin').html(':&nbsp; '+element?.tgl_izin);
			$('#viewlembur #durasi').html(':&nbsp; '+element?.lama_izin);
			$('#viewlembur #selesai').html(':&nbsp; '+element?.selesai_lembur);
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