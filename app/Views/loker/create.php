<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form tambah data loker</h2>
            <form action="/loker/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama_loker" class="col-sm-3 col-form-label">Nama Loker</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_loker')) ? 'is-invalid' : ''; ?>" id="nama_loker" name="nama_loker" autofocus value="<?= old('nama_loker'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_loker'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_loker" class="col-sm-3 col-form-label">Jenis Loker</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jenis_loker" name="jenis_loker" value="<?= old('jenis_loker'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= old('nama_perusahaan'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-3 col-form-label">Foto Perusahaan</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" type="file" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                        </div>
                        <div class="colom-sm-2">
                            <img src="/img/default.jpg" class="img-thumbnail img-preview mt-3" style="width: 150px;">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary tambahData">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>