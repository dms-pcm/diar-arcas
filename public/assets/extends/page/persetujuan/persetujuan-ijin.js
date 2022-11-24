let data = '';
let id_data = '';
jQuery(document).ready(function() {
	showDataPersetujuan();
	$('#nav-persetujuan').addClass('open');
	$('#ijin-persetujuan').addClass('active');
});

function showDataPersetujuan() {
	$('#tb-persetujuan').DataTable({
		scrollX: "50vw",
		processing: true,
		serverSide: true,
		ajax: {
			url:`${urlApi}persetujuan`,
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
			data: 'alasan',
			name: 'alasan'
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

function viewPersetujuan(id) {
	$('#viewpengajuan').modal('show');
	$.each(data,function (index,element) {
		if (element?.id == id) {
			$('#viewpengajuan #nama_karyawan').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewpengajuan #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewpengajuan #tgl_izin').html(':&nbsp; '+element?.tgl_izin);
			$('#viewpengajuan #durasi').html(':&nbsp; '+element?.lama_izin);
			if (element?.status == 1) {
				$('#viewpengajuan #status').html('<p class="badge badge-warning round">Menunggu</p>');
				$('#btn-tolak').show();
				$('#btn-setuju').show();
			} else if(element?.status == 2){
				$('#viewpengajuan #status').html('<p class="badge badge-success round">Disetujui</p>');
				$('#btn-tolak').hide();
				$('#btn-setuju').hide();
			} else if (element?.status == 3) {
				$('#viewpengajuan #status').html('<p class="badge badge-danger round">Ditolak</p>');
				$('#btn-tolak').hide();
				$('#btn-setuju').hide();
			}
			$('#viewpengajuan #alasan').html(':&nbsp; '+element?.alasan);
			
			if (element?.attachment != null) {
				$('#viewpengajuan #bukti_surat').html(`<span class="text-center mb-1">Klik gambar untuk melihat surat dokter!</span><a href="${baseUrl}storage/${element?.attachment}" title="Surat Dokter" target="_blank"><img src="${baseUrl}storage/${element?.attachment}" class="img-izin" alt="Surat dokter"></img></a>`);
			} else {
				$('#viewpengajuan #bukti_surat').html('');
			}
		}
	});
	id_data = id;
}

function setuju() {
	AmagiLoader.show();
	$.ajax({
		url:`${urlApi}persetujuan/accept/${id_data}`,
		type:'POST',
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
				window.location = `${baseUrl}ijin-persetujuan`;
			});
		},
		error:function(xhr){
			AmagiLoader.hide();
			handleErrorSimpan(xhr);
		}
	});
}

function tolak() {
	AmagiLoader.show();
	$.ajax({
		url:`${urlApi}persetujuan/direct/${id_data}`,
		type:'POST',
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
				window.location = `${baseUrl}ijin-persetujuan`;
			});
		},
		error:function(xhr){
			AmagiLoader.hide();
			handleErrorSimpan(xhr);
		}
	});
}