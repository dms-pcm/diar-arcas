// setuju-cuti
$('#setuju-cuti').on('click',function(){
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
			Swal.fire("Sukses!", "Pengajuan berhasil disetujui!", "success");
		} else {
			Swal.fire("Batal","Pengajuan tidak disetujui", "error");
		}
	});
});
	// setuju-cuti


	// tolak-cuti
$('#tolak-cuti').on('click',function(){
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
			Swal.fire("Sukses!", "Pengajuan berhasil ditolak!!", "success");
		} else {
			Swal.fire("Batal","Pengajuan tidak tolak","error");
		}
	});
});
	// tolak-cuti