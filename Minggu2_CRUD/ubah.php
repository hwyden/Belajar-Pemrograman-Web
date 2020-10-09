<?php
require 'functions.php';

//ambil data di URL
$id = $_GET["id"];
//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mhs WHERE id = $id")[0];

//cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'mhs06106.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
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
        <title>Edit Data Mahasiswa</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header bg-primary text-white">
                    Form Edit Data Mahasiswa
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                        <input type="hidden" name="fotoLama" value="<?= $mhs["foto"]; ?>">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" id="nim" class="form-control" placeholder="input nim anda disini!" required value="<?= $mhs["nim"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="input nama anda disini!" required value="<?= $mhs["nama"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="input email anda disini!" required value="<?= $mhs["email"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <img src="foto/<?= $mhs['foto']; ?>" width="50">
                            <input type="file" class="form-control-file" name="foto" id="foto">
                        </div>
                        <button type="submit" class="btn btn-success" name="submit">Simpan Data</button>
                    </form>
                </div>
                <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</htm>