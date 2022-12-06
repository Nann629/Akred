<?= $this->extend('index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelTambah">
                <i class="fa fa-plus"></i>Tambah Data
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kriteria->getResultArray() as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['nama_kriteria']; ?></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modelUbah<?= $row['idkriteria']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modelHapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Tambah-->
<div class="modal fade" id="modelTambah" tabindex="-1" aria-labelledby="modelTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kriteria/tambah') ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="nama_kriteria">nama kriteria</label>
                        <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" placeholder="Masukan nama_kriteria">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan deskripsi">
                    </div>
            </div>
            <div class="modal-footer mb-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Ubah-->
<?php foreach ($kriteria->getResultArray() as $row) : ?>
    <div class="modal fade" id="modelUbah<?= $row['idkriteria']; ?>" tabindex="-1" aria-labelledby="modelUbahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/kriteria/ubah/' . $row['idkriteria']); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group mb-0">
                            <label for="nama_kriteria">nama_kriteria</label>
                            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" placeholder="Masukan nama_kriteria" value="<?= $row['nama_kriteria']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="deskripsi">deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan deskripsi" value="<?= $row['deskripsi']; ?>">
                        </div>
                </div>
                <div class=" modal-footer mb-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Modal Hapus -->
<div class="modal fade" id="modelHapus" tabindex="-1" aria-labelledby="modelHapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/kriteria/hapus/<?= $row['idkriteria']; ?>" class=" btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>