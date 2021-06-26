<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-9" style="margin: auto;">
            <iframe src="/laporan/<?= $laporan['laporan']; ?>" frameborder="0"></iframe>
        </div>
    </div>
</div>