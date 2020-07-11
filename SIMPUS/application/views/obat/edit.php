<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg">
            <form action="" method="post">
                <?= form_open_multipart('obat/edit'); ?>
                <input type="hidden" name="id" value="<?= $obat['id']; ?>">
                <div class="form-group row">
                    <label for="kode_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_obat" name="kode_obat" value="<?= $obat['kode_obat']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_periksa" class="col-sm-2 col-form-label">Kode Periksa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_periksa" name="kode_periksa" value="<?= $obat['kode_periksa']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $obat['nama_obat']; ?>">
                        <?= form_error('nama_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bentuk_obat" class="col-sm-2 col-form-label">Bentuk obat</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="bentuk_obat" name="bentuk_obat">
                            <option selected>Select One</option>
                            <option value="Serbuk">Serbuk</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Pil">Pil</option>
                            <option value="Kapsul">Kapsul</option>
                            <option value="Kaplet">Kaplet</option>
                            <option value="Larutan">Larutan</option>
                            <option value="Salep">Salep</option>
                            <option value="Obat Tetes">Obat Tetes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok_obat" class="col-sm-2 col-form-label">Stok Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="stok_obat" name="stok_obat" value="<?= $obat['stok_obat']; ?>">
                        <?= form_error('stok_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exp" class="col-sm-2 col-form-label">Expired</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="exp" name="exp" value="<?= $obat['exp']; ?>">
                        <?= form_error('exp', '<small class="text-danger pl-3">', '</small>'); ?>
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