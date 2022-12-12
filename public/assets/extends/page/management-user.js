let data = ``;
jQuery(document).ready(function () {
	showData();
	$('#nav-management').addClass('active');
});

function showData() {

	$('#users-table').DataTable({
		scrollX: "50vw",
		processing: true,
		serverSide: true,
		ajax: {
			url:`${urlApi}management-user`,
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
			data: 'name',
			name: 'name'
		},
		{
			data: 'username',
			name: 'username'
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

function addUser() {
	AmagiLoader.show();
	$.ajax({
		url:`${urlApi}management-user/tambah-user`,
		type:'POST',
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			Authorization: "Bearer " + localStorage.getItem("token"),
		},
		data:{
			name: $('#tambah-user #nama').val(),
			username: $('#tambah-user #username').val(), 
			password: $('#tambah-user #password').val()
		},
		success:function(response){
			AmagiLoader.hide();
			Swal.fire({
				title: "Berhasil!",
				text: response.status.message,
				icon: "success",
				allowOutsideClick: false,
			}).then((result) => {
				window.location = `${baseUrl}user`;
				$("#tambah-user").modal("hide");
			});
		},
		error:function(xhr){
			AmagiLoader.hide();
			handleErrorSimpan(xhr);
		}
	});
}

function editUser(id) {
	console.log(id);
	$('#edit').modal('show');
	$.each(data,function (index,element) {
		if (element?.id == id) {
			$('#edit #nama').val(element?.name);
			$('#edit #username').val(element?.username);
		}
	});
	
	$('#btn-update').on('click', function () {
		AmagiLoader.show();
		$.ajax({
			url:`${urlApi}management-user/update-user/${id}`,
			type:'POST',
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				Authorization: "Bearer " + localStorage.getItem("token"),
			},
			data:{
				name: $('#edit #nama').val(),
				username: $('#edit #username').val()
			},
			success:function(response){
				AmagiLoader.hide();
				Swal.fire({
					title: "Berhasil!",
					text: response.status.message,
					icon: "success",
					allowOutsideClick: false,
				}).then((result) => {
					window.location = `${baseUrl}user`;
					$("#edit").modal("hide");
				});
			},
			error:function(xhr){
				AmagiLoader.hide();
				handleErrorSimpan(xhr);
			}
		});
	})
}

function hapusUser(id) {
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: 'Data yang anda hapus tidak bisa dipulihkan kembali!',
		icon: 'warning',
		confirmButtonText: 'Ya, Hapus',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
			AmagiLoader.show();
			$.ajax({
				url:`${urlApi}management-user/delete-user/${id}`,
				type:'DELETE',
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
						window.location = `${baseUrl}user`;
					});
				},
				error:function(xhr){
					AmagiLoader.hide();
					handleErrorSimpan(xhr);
				}
			});
		}
	});
}