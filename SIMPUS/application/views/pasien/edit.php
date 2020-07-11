<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg">
            <form action="" method="post">
                <?= form_open_multipart('pasien/edit'); ?>
                <input type="hidden" name="id" value="<?= $pasien['id']; ?>">
                <div class="form-group row">
                    <label for="kode_psn" class="col-sm-2 col-form-label">Kode Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_psn" name="kode_psn" value="<?= $pasien['kode_psn']; ?>" readonly>
                        <?= form_error('kode_psn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_psn" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_psn" name="nama_psn" value="<?= $pasien['nama_psn']; ?>">
                        <?= form_error('nama_psn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pasien['alamat']; ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $pasien['no_hp']; ?>">
                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_klm" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jenis_klm" name="jenis_klm" value="<?= $pasien['jenis_klm']; ?>">
                        <?= form_error('jenis_klm', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" value="<?= $pasien['tgl_daftar']; ?>">
                        <?= form_error('tgl_daftar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->