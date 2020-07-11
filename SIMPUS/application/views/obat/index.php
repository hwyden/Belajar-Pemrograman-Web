<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= form_error('obat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newObatModal">Tambah Data Obat</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Obat</th>
                        <th scope="col">Kode Periksa</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Bentuk Obat</th>
                        <th scope="col">Stok Obat</th>
                        <th scope="col">Expired</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($obat as $o) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $o['kode_obat']; ?></td>
                            <td><?= $o['kode_periksa']; ?></td>
                            <td><?= $o['nama_obat']; ?></td>
                            <td><?= $o['bentuk_obat']; ?></td>
                            <td><?= $o['stok_obat']; ?></td>
                            <td><?= $o['exp']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>obat/edit/<?= $o['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url(); ?>obat/hapusObat/<?= $o['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda yakin?');">hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newObatModal" tabindex="-1" role="dialog" aria-labelledby="newObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newObatModalLabel">Tambah Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('obat'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kodeObat">Kode Obat</label>
                        <input type="text" class="form-control" id="kode_obat" name="kode_obat" placeholder="Kode Obat">
                    </div>
                    <div class="form-group">
                        <label for="kodePeriksa">Kode Periksa</label>
                        <input type="text" class="form-control" id="kode_periksa" name="kode_periksa" placeholder="Kode Periksa">
                    </div>
                    <div class="form-group">
                        <label for="namaObat">Nama Obat</label>
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Nama Obat">
                    </div>
                    <div class="form-group">
                        <label for="bentukObat">Bentuk Obat</label>
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
                    <div class="form-group">
                        <label for="stokObat">Stok Obat</label>
                        <input type="text" class="form-control" id="stok_obat" name="stok_obat" placeholder="Stok Obat">

                    </div>
                    <div class="form-group">
                        <label for="expired">Expired</label>
                        <input type="date" class="form-control" id="exp" name="exp" placeholder="Expired">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>