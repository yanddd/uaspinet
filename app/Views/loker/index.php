<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <h1 class="mt-2">Daftar Loker</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (in_groups('admin')) : ?>
                <a href="/loker/create" class="btn btn-primary mb-3 float-end tambah">Tambah Data Loker</a>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Foto Perusahaan</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Nama Loker</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                        <?php foreach ($loker as $l) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $l['sampul']; ?>" alt="" class="sampul2"></td>
                                <td><?= $l['nama_perusahaan']; ?></td>
                                <td><?= $l['nama_loker']; ?></td>
                                <td>
                                    <a href="/loker/<?= $l['slug']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('loker', 'pagination'); ?>
            <?php endif; ?>
            <?php if (in_groups('user')) : ?>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success alert" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('pesan_gagal')) : ?>
                    <div class="alert alert-danger alert" role="alert">
                        <?= session()->getFlashdata('pesan_gagal'); ?>
                    </div>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php foreach ($loker as $l) : ?>
                    <div class="loker">
                        <a href="/form/<?= $l['id']; ?>">
                            <div class="card m-1 float-start loker1" style="max-width: 540px; height: 132px; width: 500px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/img/<?= $l['sampul']; ?>" alt="" class="sampul" style="height: 130px; width: 180px;">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $l['nama_loker']; ?></h5>
                                            <p class="card-text">Jenis Loker: <?= $l['jenis_loker']; ?></p>
                                            <p class="card-text">Nama Perusahaan: <small class="text-muted"><?= $l['nama_perusahaan']; ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                <?= $pager->links('loker', 'pagination'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>