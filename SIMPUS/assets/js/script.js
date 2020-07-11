$(function() {

    $('.tombolTambahPasien').on('click', function() {

        $('#newPasienModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form')[0].reset();

    });


    $('.tampilModalEditPasien').on('click', function() {

        $('#newPasienModalLabel').html('Edit Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/PemrogramanWeb/SIMPUS/pasien/ubah');


        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/PemrogramanWeb/SIMPUS/pasien/getUbah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#kode_psn').val(data.kode_psn);
                $('#nama_psn').val(data.nama_psn);
                $('#alamat').val(data.alamat);
                $('#no_hp').val(data.no_hp);
                $('#jenis_klm').val(data.jenis_klm);
                $('#tgl_daftar').val(data.tgl_daftar);
                $('#id').val(data.id);

            }
        })


    });

});