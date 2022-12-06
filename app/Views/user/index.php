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
                        <th>Nama</th>
                        <th>email</th>
                        <th>status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $key => $x) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $x->nama; ?></td>
                            <td><?= $x->email; ?></td>
                            <td><?= $x->role; ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modelUbah<?= $x->iduser; ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a href="<?= base_url('/user/hapus/' . $x->iduser); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="modelTambah" tabindex="-1" aria-labelledby="modelTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('user/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group mb-0">
                        <label for="nama_kriteria">Nama</label>
                        <input type="text" name="nama" id="file" class="form-control" placeholder="Masukan file">
                    </div>
                    <div class="form-group mb-0">
                        <label for="nama_kriteria">email</label>
                        <input type="text" name="email" id="file" class="form-control" placeholder="Masukan file">
                    </div>
                    <div class="form-group mb-0">
                        <label for="nama_kriteria">Password</label>
                        <input type="text" name="password" id="file" class="form-control" placeholder="Masukan file">
                    </div>
                    <div class="form-group mb-0">
                        <label for="validationCustom04">State</label>
                        <select class="custom-select" name="idrole" id="validationCustom04">
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($role as $key => $x) : ?>
                                <option name="idrole" value="<?= $x->idrole; ?>"><?= $x->idrole; ?> <?= $x->role; ?></option>
                            <?php endforeach; ?>
                        </select>
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

<!-- Modal Ubah -->
<?php foreach ($user as $key => $x) : ?>
    <div class="modal fade" id="modelUbah<?= $x->iduser; ?>" tabindex="-1" aria-labelledby="modelUbahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/user/update/' . $x->iduser); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group mb-0">
                                <label for="nama_kriteria">Nama</label>
                                <input type="text" name="nama" value="<?= $x->nama; ?>" id="file" class="form-control" placeholder="Masukan file">
                            </div>
                            <div class="form-group mb-0">
                                <label for="nama_kriteria">email</label>
                                <input type="text" name="email" value="<?= $x->email; ?>" id="file" class="form-control" placeholder="Masukan file">
                            </div>
                            <div class="form-group mb-0">
                                <label for="nama_kriteria">Password</label>
                                <input type="text" name="password" value="<?= $x->password; ?>" id="file" class="form-control" placeholder="Masukan file">
                            </div>
                            <div class="form-group mb-0">
                                <label for="validationCustom04">State</label>
                                <select class="custom-select" name="idrole" id="validationCustom04">
                                    <option selected disabled value="">Choose...</option>
                                    <?php foreach ($role as $key => $z) : ?>
                                        <option name="idrole" value="<?= $z->idrole ?>" <?= $z->idrole == $x->idrole ? 'selected' : ''; ?>> <?= $z->role; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
    <!-- <div class="modal fade" id="modelHapus" tabindex="-1" aria-labelledby="modelHapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/kriteria/hapus/" class=" btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>  -->
    <?= $this->endSection(); ?>