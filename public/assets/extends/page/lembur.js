
// setuju-lembur
$('#setuju-lembur').on('click',function(){
	swal({
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
			swal("Sukses!", "Pengajuan berhasil disetujui!", "success");
		} else {
			swal("Batal","Pengajuan tidak disetujui", "error");
		}
	});
});
	// setuju-lembur


	// tolak-lembur
	$('#tolak-lembur').on('click',function(){
		swal({
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
				swal("Sukses!", "Pengajuan berhasil ditolak!!", "success");
			} else {
				swal("Batal","Pengajuan tidak tolak","error");
			}
		});
	});
	// tolak-lembur