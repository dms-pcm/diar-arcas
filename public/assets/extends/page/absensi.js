let month = '';
let year = '';
jQuery(document).ready(function() {
    filter();
    $('#nav-absensi').addClass('active');
});

function filter() {
    if (!$('#monthpicker').val()) {
        $('#yearpicker').attr('disabled','true');
        $('#show').attr('disabled','true');
        $('#absensi-table').hide();
        $('#row_jumlah').hide();
        $('#monthpicker').on('input', function() {
            $('#yearpicker').removeAttr('disabled','true');
        });
        $('#yearpicker').on('input', function() {
            $('#show').removeAttr('disabled','true');
        });
    }
    $('#show').on('click',function () {
        $('#initial').hide();
        month = $('#monthpicker').val();
        year = $('#yearpicker').val();
        if (month == "January") {
            month = 1;
        } else if (month == "February") {
            month = 2;
        } else if (month == "March") {
            month = 3;
        } else if (month == "April") {
            month = 4;
        } else if (month == "May") {
            month = 5;
        } else if (month == "June") {
            month = 6;
        } else if (month == "July") {
            month = 7;
        } else if (month == "August") {
            month = 8;
        } else if (month == "September") {
            month = 9;
        } else if (month == "October") {
            month = 10;
        } else if (month == "November") {
            month = 11;
        } else if (month == "December") {
            month = 12;
        }
        if (localStorage.getItem("role_id") == 2) {
            tableShowAdmin();
        }else if(localStorage.getItem("role_id") == 3){
            tableShow();
        }
    });
}

function tableShow() {
    $('#absensi-table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: {
         url:`${urlApi}presensi/show-perId`,
         headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        async: true,
        dataSrc: function ( json ) {
            let hasil = '';
            let html = ``;
            let jumlah_hadir = '';
            let jumlah_telat = '';
            $.each(json?.data,function (index,element) {
                let data = element?.tanggal;
                hasil = data.split('-');
                jumlah_hadir = element?.jumlah_hadir;
                jumlah_telat = element?.jumlah_telat;
            });
            if (month == hasil[1] && year == hasil[0]) {
                $('#absensi-table').show();
                $('#row_jumlah').show();
                $('#nothing').hide();
                $('#hadir').text(jumlah_hadir);
                $('#telat').text(jumlah_telat);
                return json.data;
            }else{
                $('#nothing').show();
                $('#absensi-table_wrapper').hide();
                $('#row_jumlah').hide();
                html += `
                <div class="row justify-content-center align-items-center flex-column">
                <img src="${baseUrl}img/empty-state.png" alt="" class="img-fluid">
                
                <h4>Data tidak ditemukan</h4>
                <span>Silahkan pilih bulan atau tahun yang sesuai</span>
                </div>
                `;
                $('#nothing').html(html);
            }
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
        data: 'tanggal',
        name: 'tanggal',
        render: function (data, type, row) {
            let tgl = data;
            let p1 = tgl.split('-');
            let bulan = '';
            if (p1[1] == 1) {
                bulan = 'Januari';
            } else if (p1[1] == 2) {
                bulan = 'Februari';
            } else if (p1[1] == 3) {
                bulan = 'Maret';
            } else if (p1[1] == 4) {
                bulan = 'April';
            } else if (p1[1] == 5) {
                bulan = 'Mei';
            } else if (p1[1] == 6) {
                bulan = 'Juni';
            } else if (p1[1] == 7) {
                bulan = 'Juli';
            } else if (p1[1] == 8) {
                bulan = 'Agustus';
            } else if (p1[1] == 9) {
                bulan = 'September';
            } else if (p1[1] == 10) {
                bulan = 'Oktober';
            } else if (p1[1] == 11) {
                bulan = 'November';
            } else if (p1[1] == 12) {
                bulan = 'Desember';
            }

            return p1[2]+' '+bulan+' '+p1[0];
        }
    },
    {
        data: 'user.name',
        name: 'name'
    },
    {
        data: 'jam',
        orderable: true, 
        searchable: true,
        render: function (data, type, row) {
            if (row?.status == "Tidak Masuk") {
                return '-';
            } else{
                return data;
            }
        }
    },
    {
        data: 'status',
        name: 'status'
    },
    {
        data: 'keterangan',  
        orderable: true, 
        searchable: true,
        render: function (data, type, row) {
            if (row?.keterangan == "Sangat Baik") {
                return '<p class="badge badge-success round">Sangat baik</p>';
            } else if(row?.keterangan == "Baik"){
                return '<p class="badge bg-blue badge-blue round">Baik</p>';
            } else if (row?.keterangan == "Kurang") {
                return '<p class="badge badge-warning round">Kurang</p>';
            } else if (row?.keterangan == "Tidak Masuk/Alpha") {
                return '<p class="badge badge-danger round">Tidak Masuk</p>';
            } else if (row?.keterangan == "Pulang") {
                return '<p class="badge badge-grey bg-grey round">Pulang</p>';
            }
        }
    },
    ]
});
}

function tableShowAdmin() {
    $('#absensi-table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: {
         url:`${urlApi}presensi/show-all`,
         headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
        async: true,
        dataSrc: function ( json ) {
            let hasil = '';
            let html = ``;
            let jumlah_hadir = '';
            let jumlah_telat = '';
            $.each(json?.data,function (index,element) {
                let data = element?.tanggal;
                hasil = data.split('-');
                jumlah_hadir = element?.jumlah_hadir;
                jumlah_telat = element?.jumlah_telat;
            });
            if (month == hasil[1] && year == hasil[0]) {
                $('#absensi-table').show();
                $('#row_jumlah').show();
                $('#nothing').hide();
                $('#hadir').text(jumlah_hadir);
                $('#telat').text(jumlah_telat);
                return json.data;
            }else{
                $('#nothing').show();
                $('#absensi-table_wrapper').hide();
                $('#row_jumlah').hide();
                html += `
                <div class="row justify-content-center align-items-center flex-column">
                <img src="${baseUrl}img/empty-state.png" alt="" class="img-fluid">
                
                <h4>Data tidak ditemukan</h4>
                <span>Silahkan pilih bulan atau tahun yang sesuai</span>
                </div>
                `;
                $('#nothing').html(html);
            }
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
        data: 'tanggal',
        name: 'tanggal',
        render: function (data, type, row) {
            let tgl = data;
            let p1 = tgl.split('-');
            let bulan = '';
            if (p1[1] == 1) {
                bulan = 'Januari';
            } else if (p1[1] == 2) {
                bulan = 'Februari';
            } else if (p1[1] == 3) {
                bulan = 'Maret';
            } else if (p1[1] == 4) {
                bulan = 'April';
            } else if (p1[1] == 5) {
                bulan = 'Mei';
            } else if (p1[1] == 6) {
                bulan = 'Juni';
            } else if (p1[1] == 7) {
                bulan = 'Juli';
            } else if (p1[1] == 8) {
                bulan = 'Agustus';
            } else if (p1[1] == 9) {
                bulan = 'September';
            } else if (p1[1] == 10) {
                bulan = 'Oktober';
            } else if (p1[1] == 11) {
                bulan = 'November';
            } else if (p1[1] == 12) {
                bulan = 'Desember';
            }

            return p1[2]+' '+bulan+' '+p1[0];
        }
    },
    {
        data: 'user.name',
        name: 'name'
    },
    {
        data: 'jam',
        orderable: true, 
        searchable: true,
        render: function (data, type, row) {
            if (row?.status == "Tidak Masuk") {
                return '-';
            } else{
                return data;
            }
        }
    },
    {
        data: 'status',
        name: 'status'
    },
    {
        data: 'keterangan',  
        orderable: true, 
        searchable: true,
        render: function (data, type, row) {
            if (row?.keterangan == "Sangat Baik") {
                return '<p class="badge badge-success round">Sangat baik</p>';
            } else if(row?.keterangan == "Baik"){
                return '<p class="badge bg-blue badge-blue round">Baik</p>';
            } else if (row?.keterangan == "Kurang") {
                return '<p class="badge badge-warning round">Kurang</p>';
            } else if (row?.keterangan == "Tidak Masuk/Alpha") {
                return '<p class="badge badge-danger round">Tidak Masuk</p>';
            } else if (row?.keterangan == "Pulang") {
                return '<p class="badge badge-grey bg-grey round">Pulang</p>';
            }
        }
    },
    ]
});
}