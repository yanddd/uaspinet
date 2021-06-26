<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col-12 home">

    <h1 class="h3 mb-4 text-white"></h1>
    <div class="selamat">
        <h1 class="h3 mb-4 text-white">Selamat Datang di Adyawid Shop</h1>
        <p><b></b></p>
    </div>
    <?php if (in_groups('user')) : ?>
        <a href="/sepatu" class="btn btn-primary btnHome">Yuk Belanja</a>
    <?php endif; ?>
    <?php if (!logged_in()) : ?>
        <a href="/sepatu" class="btn btn-primary btnHome">Yuk Belanja</a>
    <?php endif; ?>

</div>
<?= $this->endSection(); ?>