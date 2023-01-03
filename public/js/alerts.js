    function toast(tipe, pesan) {
        if (tipe == 'success') {
            Swal.fire({
                title: pesan,
                icon: 'success',
                timer: 2000
            })
        } else if (tipe == 'error') {
            Swal.fire({
                icon: 'error',
                title: 'Ada Sesuatu yang Salah!',
                // text: 'Data Berhasil Disimpan!',
                timer: 2000
            });
        } else if (tipe == 'info') {
            Swal.fire({
                icon: 'info',
                title: 'Info data!',
                // text: 'Data Berhasil Disimpan!',
                timer: 1500
            });
        } else if (tipe == 'hapus') {
            Swal.fire({
                icon: 'warning',
                html: 'Apa Kamu Yakin? <br> Ingin Menghapus <strong>' + pesan + '</strong> ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            });
        } else if (tipe == 'warning') {
            Swal.fire({
                icon: 'question',
                title: 'Apa Kamu Akan Menghapus Data ini ' + nama,
                // text: 'Data Berhasil Disimpan!',
                timer: 1500
            });
        } else if (tipe == 'errors') {
            var pesans = '';
            $.each(pesan, function (key, value) {
                pesans += '<li>' + value + '</li>';
            });
            Swal.fire({
                icon: 'error',
                html: pesans,
            });
        } else {
            return 0;
        }

    }
