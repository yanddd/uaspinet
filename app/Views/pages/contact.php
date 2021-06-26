<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8 about">
            <h2 align="center">Contact Us</h2>
            <h4>Informasi Kontak</h4>
            <h5>Pekanbaru</h5>
            <p>No Telp : 082287111743 (Adyah)</p>
            <p>Email : adyah@gmail.com</p>
            <h5>Alamat Kami</h5>
            <p>Pekanbaru</p>
        </div>
        <hr>
        <div class="iconC">
            <ul>
                <li><a href=""><img src="/img/facebook.png"></a></li>
                <li><a href=""><img src="/img/twitter.png"></a></li>
                <li><a href=""><img src="/img/instagram.png"></a></li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>