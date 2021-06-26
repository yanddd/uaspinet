<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <h2 class="my-3">Detail Sepatu</h2>
        <div class="col-6 dt">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="row mb-3 sd">
                <img src="/img/<?= $sepatu['sampul']; ?>" class="img-fluid">
            </div>
            <div class="row mb-3">
                <label for="nama_sepatu" class="col-sm-3 col-form-label">Nama Sepatu</label>
                <div class="col-sm-8">
                    <h5 class="card-text">: <?= $sepatu['nama_sepatu']; ?></h5>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jenis_sepatu" class="col-sm-3 col-form-label">Jenis Sepatu</label>
                <div class="col-sm-8">
                    <h5 class="card-text">: <?= $sepatu['jenis_sepatu']; ?></h5>
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga_sepatu" class="col-sm-3 col-form-label">Harga Sepatu</label>
                <div class="col-sm-8">
                    <h5 class="card-text">: <?= number_to_currency($sepatu['harga_sepatu'], 'IDR');  ?></h5>
                </div>
            </div>
            <?php if (in_groups('admin')) : ?>
                <div class="row mb-3">
                    <label for="jumlah_sepatu" class="col-sm-3 col-form-label">Stok</label>
                    <div class="col-sm-8">
                        <h5 class="card-text">: <?= $sepatu['jumlah_sepatu']; ?></h5>
                    </div>
                </div>
            <?php endif; ?>
            <div class="tombolD">
                <?php if (in_groups('admin')) : ?>
                    <a href="/sepatu/edit/<?= $sepatu['slug']; ?>" class="btn btn-warning float-right">Edit</a>
                <?php endif; ?>
                <?php if (in_groups('user')) : ?>
                    <form action="/sepatu/saveK/<?= $sepatu['id']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="id_sepatu" name="id_sepatu" value="<?= $sepatu['id']; ?>">
                        <input id="nama_sepatu" name="nama_sepatu" type="hidden" value="<?= $sepatu['nama_sepatu']; ?>">
                        <input id="username" name="username" type="hidden" value="<?= user()->username; ?>">
                        <input id="harga_sepatu" name="harga_sepatu" type="hidden" value="<?= $sepatu['harga_sepatu']; ?>">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-primary float-end"><i class="fab fa-shopify"></i> Beli</button>
                        <input type="number" class="form-control col-2 float-end mr-2" id="jumlah_sepatu" name="jumlah_sepatu" placeholder="Jumlah" autofocus>
                        <!-- </form> -->
                    </form>
                <?php endif; ?>
            </div>
            <div class="back">
                <a href="/sepatu">
                    <h1 class="fas fa-backspace"></h1>
                </a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>