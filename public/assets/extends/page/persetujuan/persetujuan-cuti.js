let id_data = "";
jQuery(document).ready(function() {
    showDataPersetujuan();
    $('#nav-persetujuan').addClass('open');
    $('#cuti-persetujuan').addClass('active');
});

function showDataPersetujuan() {
    $('#tb-persetujuan-cuti').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url:`${urlApi}persetujuan/show-cuti`,
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
				data: 'created_at',
				orderable: true, 
				searchable: true,
				render: function (data, type, row) {
					let res = data.split(':');
					let hasil = res[0].split('T');
					return hasil[0];

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

function viewPersetujuanCuti(id) {
    $('#viewcuti').modal('show');
	$.each(data,function (index,element) {
		if (element?.id == id) {
			$.each(data,function (index,element) {
                if (element?.id == id) {
                    $('#viewcuti #nama_karyawan').html(':&nbsp; '+element?.nama_karyawan);
                    $('#viewcuti #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
                    $('#viewcuti #tgl_izin').html(':&nbsp; '+element?.tgl_izin);
                    $('#viewcuti #durasi').html(':&nbsp; '+element?.lama_izin);
                    if (element?.status == 1) {
                        $('#viewcuti #status').html('<p class="badge badge-warning round">Menunggu</p>');
                        $('#btn-tolak').show();
                        $('#btn-setuju').show();
                    } else if(element?.status == 2){
                        $('#viewcuti #status').html('<p class="badge badge-success round">Disetujui</p>');
                        $('#btn-tolak').hide();
                        $('#btn-setuju').hide();
                    } else if (element?.status == 3) {
                        $('#viewcuti #status').html('<p class="badge badge-danger round">Ditolak</p>');
                        $('#btn-tolak').hide();
                        $('#btn-setuju').hide();
                    }
                    let res = element?.created_at.split(':');
                    let hasil = res[0].split('T');
                    $('#tgl_mengajukan').html(':&nbsp; '+hasil[0]);
                    $('#viewcuti #alasan').html(':&nbsp; '+element?.alasan);
                }
            })
		}
	});
    id_data = id;
}

function setuju() {
    Swal.fire({
		title: "Setujui Pengajuan Cuti?",
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
                        window.location = `${baseUrl}cuti-persetujuan`;
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
		title: "Tolak Pengajuan Cuti?",
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
                        window.location = `${baseUrl}cuti-persetujuan`;
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