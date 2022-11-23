let data = "";
jQuery(document).ready(function() {
	showData();
	$('#nav-pengajuan').addClass('open');
	$('#cuti-pengajuan').addClass('active');
});

function showData() {
	$('#tb-cuti').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url:`${urlApi}pengajuan/show-cuti`,
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

function viewCuti(id) {
	$('#viewcuti').modal('show');
	$.each(data,function (index,element) {
		if (element?.id == id) {
			$('#viewcuti #nama_karyawan').html(':&nbsp; '+element?.nama_karyawan);
			$('#viewcuti #jabatan').html(':&nbsp; '+element?.jabatan_karyawan);
			$('#viewcuti #tgl_izin').html(':&nbsp; '+element?.tgl_izin);
			$('#viewcuti #durasi').html(':&nbsp; '+element?.lama_izin);
			if (element?.status == 1) {
				$('#viewcuti #status').html('<p class="badge badge-warning round">Menunggu</p>');
			} else if(element?.status == 2){
				$('#viewcuti #status').html('<p class="badge badge-success round">Disetujui</p>');
			} else if (element?.status == 3) {
				$('#viewcuti #status').html('<p class="badge badge-danger round">Ditolak</p>');
			}
			let res = element?.created_at.split(':');
			let hasil = res[0].split('T');
			$('#tgl_mengajukan').html(':&nbsp; '+hasil[0]);
			$('#viewcuti #alasan').html(':&nbsp; '+element?.alasan);
		}
	})
}

function simpanCuti() {
	let tanggal =  $('#tambah_cuti #animate').val();
    let split = tanggal.split('/');
    let hasil = split[2] + '-' + split[0] + '-' + split[1];
	AmagiLoader.show();
    $.ajax({
        url:`${urlApi}pengajuan/tambah-cuti`,
        type:'POST',
        data: {
			nama_karyawan: $('#tambah_cuti #nama_karyawan').val(),
			jabatan_karyawan: $('#tambah_cuti #jabatan').val(),
			tgl_izin: hasil,
			lama_izin: $('#tambah_cuti #durasi').val(),
			alasan: $('#tambah_cuti #alasan').val()
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
                window.location = `${baseUrl}cuti`;
            });
        },
        error:function(xhr){
            AmagiLoader.hide();
            handleErrorSimpan(xhr);
        }
    });
}