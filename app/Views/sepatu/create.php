<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Sepatu</h2>
            <form action="/sepatu/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama_sepatu" class="col-sm-3 col-form-label">Nama Sepatu</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_sepatu')) ? 'is-invalid' : ''; ?>" id="nama_sepatu" name="nama_sepatu" autofocus value="<?= old('nama_sepatu'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_sepatu'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_sepatu" class="col-sm-3 col-form-label">Jenis Sepatu</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jenis_sepatu" name="jenis_sepatu" value="<?= old('jenis_sepatu'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_sepatu" class="col-sm-3 col-form-label">Harga Sepatu</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="harga_sepatu" name="harga_sepatu" value="<?= old('harga_sepatu'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah_sepatu" class="col-sm-3 col-form-label">Stok</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jumlah_sepatu" name="jumlah_sepatu" value="<?= old('jumlah_sepatu'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-3 col-form-label">Gambar Sepatu</label>
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