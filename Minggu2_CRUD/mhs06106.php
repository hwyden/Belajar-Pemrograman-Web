<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mhs");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD 06106</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
  <div class="container">

    <h1 class="text-center">DAFTAR MAHASISWA</h1>
    <h1 class="text-center">UNIVERSITAS DIAN NUSWANTORO</h1>

    <div class="row mt-3">
      <div class="col-lg-6">
        <a class="btn btn-primary" href="tambah.php" role="button">Tambah Data Mahasiswa</a>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-lg-6">
        <form action="" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari Mahasiswa..." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="cari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Awal Card Tabel -->
    <div class="card mt-3">
      <div class="card-header bg-success text-white">
        Daftar Mahasiswa
      </div>
      <div class="card-body">

        <table class="table table-bordered table-striped">
          <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>E-mail</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
          <?php $i = 1; ?>
          <?php foreach ($mahasiswa as $row) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $row["nim"]; ?></td>
              <td><?= $row["nama"]; ?></td>
              <td><?= $row["email"]; ?></td>
              <td><img src="foto/<?= $row["foto"]; ?>" width="60"></td>
              <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>" class=" btn btn-warning">Edit</a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?');" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </table>

      </div>
    </div>
    <!--Akhir Card Tabel -->

  </div>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>