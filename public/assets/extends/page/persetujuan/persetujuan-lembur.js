let id_data = "";
let data = "";
jQuery(document).ready(function() {
	showPersetujuanLembur();
	$('#nav-persetujuan').addClass('open');
	$('#lembur-persetujuan').addClass('active');
	if (localStorage.getItem("role_id") == 3 || localStorage.getItem("role_id") == 1) {
		$('#btn-tolak').addClass('d-none');
		$('#btn-setuju').addClass('d-none');	
	}
});

function showPersetujuanLembur() {
	$('#tb-persetujuan-lembur').DataTable({
		scrollX: "50vw",
		processing: true,
		serverSide: true,
		ajax: {
			url:`${urlApi}persetujuan/show-lembur`,
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

function viewPersetujuanLembur(id) {
	$('#viewlembur').modal('show');
	$.each(data,function (index,element) {
		if (element?.id == id) {
			$('#viewlembur #nama_karyawan').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewlembur #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewlembur #tgl_izin').html(':&nbsp; '+element?.tgl_izin);
			$('#viewlembur #durasi').html(':&nbsp; '+element?.lama_izin);
			$('#viewlembur #selesai').html(':&nbsp; '+element?.selesai_lembur);
			if (element?.status == 1) {
				$('#viewlembur #status').html('<p class="badge badge-warning round">Menunggu</p>');
				$('#btn-tolak').show();
				$('#btn-setuju').show();
			} else if(element?.status == 2){
				$('#viewlembur #status').html('<p class="badge badge-success round">Disetujui</p>');
				$('#btn-tolak').hide();
				$('#btn-setuju').hide();
			} else if (element?.status == 3) {
				$('#viewlembur #status').html('<p class="badge badge-danger round">Ditolak</p>');
				$('#btn-tolak').hide();
				$('#btn-setuju').hide();
			}
			$('#viewlembur #alasan').html(':&nbsp; '+element?.alasan);
		}
	})
	id_data = id;
}

function setuju() {
	Swal.fire({
		title: "Setujui Pengajuan Lembur?",
		text: "Apakah anda yakin menyetujui pengajuan ini?",
		icon: "warning",
		buttons: {
			cancel: {
				text: "Batalkan",
				value: null,
				visible: true,
				className: "",
				closeModal: false,
			},
			confirm: {
				text: "Setujui Pengajuan!",
				value: true,
				visible: true,
				className: "",
				closeModal: false
			}
		}
	}).then(isConfirm => {
		if (isConfirm) {
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
						window.location = `${baseUrl}lembur-persetujuan`;
					});
				},
				error:function(xhr){
					AmagiLoader.hide();
					handleErrorSimpan(xhr);
				}
			});
			// Swal.fire("Sukses!", "Pengajuan berhasil disetujui!", "success");
		} else {
			Swal.fire("Batal","Pengajuan tidak disetujui", "error");
		}
	});
}

function tolak() {
	Swal.fire({
		title: "Tolak Pengajuan Lembur?",
		text: "Apakah anda yakin menolak pengajuan ini?",
		icon: "warning",
		buttons: {
			cancel: {
				text: "Batalkan",
				value: null,
				visible: true,
				className: "",
				closeModal: false,
			},
			confirm: {
				text: "Tolak Pengajuan!",
				value: true,
				visible: true,
				className: "",
				closeModal: false
			}
		}
	}).then(isConfirm => {
		if (isConfirm) {
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
						window.location = `${baseUrl}lembur-persetujuan`;
					});
				},
				error:function(xhr){
					AmagiLoader.hide();
					handleErrorSimpan(xhr);
				}
			});
			// Swal.fire("Sukses!", "Pengajuan berhasil ditolak!!", "success");
		} else {
			Swal.fire("Batal","Pengajuan tidak tolak","error");
		}
	});
}