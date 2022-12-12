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
			$('#viewlembur #nama_karyawan').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewlembur #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewlembur #tgl_izin').html(':&nbsp; '+hasil);
			$('#viewlembur #durasi').html(':&nbsp; '+element?.lama_izin);
			$('#viewlembur #selesai').html(':&nbsp; '+element?.selesai_lembur+' WIB');
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
		confirmButtonText: 'Setujui Pengajuan!',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
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
						allowOutsideClick: false,
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
			Swal.fire("Batal","Pengajuan batal disetujui", "error");
		}
	});
}

function tolak() {
	Swal.fire({
		title: "Tolak Pengajuan Lembur?",
		text: "Apakah anda yakin menolak pengajuan ini?",
		icon: "warning",
		confirmButtonText: 'Tolak Pengajuan!',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
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
						allowOutsideClick: false,
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
			Swal.fire("Batal","Pengajuan batal ditolak","error");
		}
	});
}