<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= form_error('pemeriksaan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPemeriksaanModal">Tambah Data Pemeriksaan</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Periksa</th>
                        <th scope="col">Kode Pasien</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Tanggal periksa</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pemeriksaan as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['kode_periksa']; ?></td>
                            <td><?= $p['kode_psn']; ?></td>
                            <td><?= $p['nama_psn']; ?></td>
                            <td><?= $p['tgl_periksa']; ?></td>
                            <td><?= $p['keluhan']; ?></td>
                            <td><?= $p['diagnosa']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>pemeriksaan/edit/<?= $p['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url(); ?>Pemeriksaan/hapusPemeriksaan/<?= $p['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda yakin?');">hapus</a>
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
<div class="modal fade" id="newPemeriksaanModal" tabindex="-1" role="dialog" aria-labelledby="newPemeriksaanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPemeriksaanModalLabel">Tambah Data Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pemeriksaan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_periksa">Kode Periksa</label>
                        <input type="text" class="form-control" id="kode_periksa" name="kode_periksa" placeholder="Kode Periksa">
                    </div>
                    <div class="form-group">
                        <label for="kode_psn">Kode Pasien</label>
                        <input type="text" class="form-control" id="kode_psn" name="kode_psn" placeholder="Kode Pasien">
                    </div>
                    <div class="form-group">
                        <label for="nama_psn">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_psn" name="nama_psn" placeholder="Nama Pasien">
                    </div>
                    <div class="form-group">
                        <label for="tgl_periksa">Tanggal Periksa</label>
                        <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa" placeholder="Tanggal Periksa">
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Keluhan">
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="Diagnosa">
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