<?= $this->extend('index'); ?>
<?= $this->section('content'); ?>


<div class="alert alert-success" role="alert">
    <h4 class="alert-heading text-danger"><i class="fa fa-info-circle"></i> Guest Mode</h4>
    <p>Aww yeah, Beberapa dokumen tidak bisa kamu download ya karena kamu sekarang sedang berada pada <b class="text-danger">Mode Tamu</b>. <br>Silakan masukkan token anda untuk beralih ke Mode ALIM (hak akses penuh)</p>
    <hr>
    <p class="mb-0">Jangan khawatir !. <a href="https://wa.me/qr/2IHSXIWLC5R3H1" target="_blank">Hubungi admin</a> untuk mendapatkan token mu. Terima Kasih</p>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" name="idtoken" id="idtoken" placeholder="Input your token here">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="btnRestricted">Submit</button>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>