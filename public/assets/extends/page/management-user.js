// hapus data modal
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
	// hapus data modal