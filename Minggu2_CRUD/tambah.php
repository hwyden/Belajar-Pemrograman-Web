<?php
require 'functions.php';
//cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'mhs06106.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'tambah.php';
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<htm>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data Mahasiswa</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>

    <body>

        <!-- Awal Card Form -->
        <div class="container">
            <div class="card mt-5">
                <div class="card-header bg-primary text-white">
                    Form Input Data Mahasiswa
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" id="nim" class="form-control" placeholder="Input NIM Anda disini!" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Input nama Anda disini!" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Input E-mail Anda disini!" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" name="foto" id="foto">
                        </div>
                        <button type="submit" class="btn btn-success" name="submit">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Card Form -->

        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</htm>