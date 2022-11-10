jQuery(document).ready(function () {
    
});

function addUser() {
	// AmagiLoader.show();
    $.ajax({
        url:`${urlApi}management-user`,
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
            // AmagiLoader.hide();
            let res = response?.data;
            // window.location = `${baseUrl}user`;
        },
        error:function(xhr){
            // AmagiLoader.hide();
            handleErrorSimpan(xhr);
        }
    });
}

$('#hapus-data').on('click',function(){
	swal({
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
			swal("Sukses!", "Data anda berhasil terhapus!!", "success");
		} else {
			swal("Batal", "Data anda tidak terhapus.", "error");
		}
	});
});