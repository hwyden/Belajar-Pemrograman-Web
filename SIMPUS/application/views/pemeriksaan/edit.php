<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg">
            <form action="" method="post">
                <?= form_open_multipart('pemeriksaan/edit'); ?>
                <input type="hidden" name="id" value="<?= $pemeriksaan['id']; ?>">
                <div class="form-group row">
                    <label for="kode_periksa" class="col-sm-2 col-form-label">Kode Periksa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_periksa" name="kode_periksa" value="<?= $pemeriksaan['kode_periksa']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_psn" class="col-sm-2 col-form-label">Kode Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_psn" name="kode_psn" value="<?= $pemeriksaan['kode_psn']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_psn" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_psn" name="nama_psn" value="<?= $pemeriksaan['nama_psn']; ?>">
                        <?= form_error('nama_psn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_periksa" class="col-sm-2 col-form-label">Tanggal Pemeriksaan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa" value="<?= $pemeriksaan['tgl_periksa']; ?>">
                        <?= form_error('tgl_periksa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?= $pemeriksaan['keluhan']; ?>">
                        <?= form_error('keluhan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="<?= $pemeriksaan['diagnosa']; ?>">
                        <?= form_error('diagnosa', '<small class="text-danger pl-3">', '</small>'); ?>
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