let data = ``;
jQuery(document).ready(function () {
    showData();
	$('#nav-management').addClass('active');
});

function showData() {
	AmagiLoader.show();
    $.ajax({
        url:`${urlApi}management-user`,
        type:'GET',
		headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        success:function(response){
            AmagiLoader.hide();
			let res =  response?.data?.data_users;
			data = res;
			let html = ``;
			$.each(res,function (index,element) {
				html+=`
				<tr>
					<td>${index+1}</td>
					<td>${element?.name}</td>
					<td>${element?.username}</td>
					<td>
						<div class="d-flex">
							<a class="btn btn-sm btn-warning text-white mr-1" onclick="editUser(${element?.id})">
							<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a class="btn btn-sm btn-danger text-white mr-1" onclick="hapusUser(${element?.id})">
							<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
						</div>
					</td>
				</tr>
				`;
			});
			$('#tbl-user #data-user').html(html);
        },
        error:function(xhr){
            AmagiLoader.hide();
            handleErrorSimpan(xhr);
        }
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