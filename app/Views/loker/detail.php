<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Detail Loker</h1>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $loker['sampul']; ?>" alt="..." style="width: 150px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $loker['nama_loker']; ?></h5>
                            <p class="card-text"><b>Jenis Loker : </b> <?= $loker['jenis_loker']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Nama Perusahaan : </b> <?= $loker['nama_perusahaan']; ?></small></p>

                            <a href="/loker/edit/<?= $loker['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/loker/<?= $loker['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                            </form>
                            <br><br>
                            <a href="/loker">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>