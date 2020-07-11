<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= form_error('pasien', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3 tombolTambahPasien" data-toggle="modal" data-target="#newPasienModal">Tambah Data Pasien</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Pasien</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Handphone</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Daftar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pasien as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['kode_psn']; ?></td>
                            <td><?= $s['nama_psn']; ?></td>
                            <td><?= $s['alamat']; ?></td>
                            <td><?= $s['no_hp']; ?></td>
                            <td><?= $s['jenis_klm']; ?></td>
                            <td><?= $s['tgl_daftar']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>pasien/edit/<?= $s['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url(); ?>pasien/hapusPasien/<?= $s['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda yakin?');">hapus</a>
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
<div class="modal fade" id="newPasienModal" tabindex="-1" role="dialog" aria-labelledby="newPasienModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPasienModalLabel">Tambah Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pasien'); ?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kodePasien">Kode Pasien</label>
                        <input type="text" class="form-control" id="kode_psn" name="kode_psn">
                    </div>
                    <div class="form-group">
                        <label for="namaPasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_psn" name="nama_psn">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <p>Jenis Kelamin</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="jenis_klm" name="jenis_klm" value="Perempuan">
                            <label class="form-check-label" for="jenis_klm">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="jenis_klm" name="jenis_klm" value="Laki-laki">
                            <label class="form-check-label" for="jenis_klm">L</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_daftar">Tanggal Daftar</label>
                        <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar">
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