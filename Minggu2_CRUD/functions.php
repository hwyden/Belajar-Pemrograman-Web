<?php
//koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbpwl");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);

    //upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO mhs VALUES ('', '$nim', '$nama', '$email', '$foto')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cek apakah tidak ada gambar diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
                </script>";
        return false;
    }

    //cek apakah yang diupload gambar
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensiFoto = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('Yang Anda upload bukan foto!');
            </scipt>";
        return false;
    }
    //cek ukuran foto
    $ekstensiFile = ['>1000000'];
    if (in_array($ukuranFile, $ekstensiFile)) {
        echo "<script>
                alert('Ukuran foto terlalu besar!');
            </script>";
        return false;
    }

    //upload gambar yang sudah verif
    move_uploaded_file($tmpName, 'foto/' . $namaFile);

    return $namaFile;
}

function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mhs WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
    global $koneksi;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $fotoLama = $data["fotoLama"];

    //cek apakah user upload gambar baru
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE mhs SET
                nim = '$nim',
                nama = '$nama',
                email = '$email',
                foto = '$foto'
            WHERE id = $id
            ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function cari($keyword)
{
    $query = "SELECT * FROM mhs 
                WHERE
                nama LIKE '%$keyword' OR
                nim LIKE '%$keyword' OR
                email LIKE '%$keyword' 
            ";

    return query($query);
}
