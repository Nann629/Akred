<?= $this->extend('index'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i>Tambah Data
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">FORM <?= $judul; ?></h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('sub/tambah') ?>" method="post">
                            <div class="mb-3 row">
                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                            </div>
                            <div class="mb-3 row">
                                <label for="validationCustom04" class="col-sm-2 col-form-label">Kriteria</label>
                                <select class="custom-select" name="idkriteria" id="validationCustom04">
                                    <option selected disabled value="">Choose...</option>
                                    <?php foreach ($kriteria->getResultArray() as $row) : ?>
                                        <option name="idkriteria" value="<?= $row['idkriteria']; ?>"><?= $row['idkriteria']; ?> <?= $row['nama_kriteria']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tombol-tutup" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--tutup modal-->
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sub as $key => $x) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $x->deskripsi; ?></td>
                            <td><?= $x->idkriteria; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modelUbah" id="btn-edit-sub" class="btn btn-sm btn-warning" data-id="<?= $row['idsub']; ?>" data-deskripsi="<?= $row['deskripsi']; ?>"><i class="fa fa-edit"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modelHapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>