jQuery(document).ready(function () {
    showData();
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
			let html = ``;
			$.each(res,function (index,element) {
				html+=`
				<tr>
					<td>${index+1}</td>
					<td>${element?.name}</td>
					<td>${element?.username}</td>
					<td>
						<div class="d-flex">
							<a href="#" title="" class="btn btn-sm btn-warning text-white mr-1" data-toggle="modal" data-target="#edit">
							<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a href="#" title="" class="btn btn-sm btn-danger text-white mr-1" id="hapus-data">
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

$('#hapus-data').on('click',function(){
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Data yang anda hapus tidak bisa dipulihkan kembali!",
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
				text: "Hapus Data!",
				value: true,
				visible: true,
				className: "",
				closeModal: false
			}
		}
	}).then(isConfirm => {
		if (isConfirm) {
			Swal.fire("Sukses!", "Data anda berhasil terhapus!!", "success");
		} else {
			Swal.fire("Batal", "Data anda tidak terhapus.", "error");
		}
	});
});