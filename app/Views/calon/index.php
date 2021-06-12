<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Calon</h1>
            <div class="col">
                <form class="float-start" action="" method="post">
                    <div class="input-group mb-3 cari">
                        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </form>
                <a class="float-end" href="<?= base_url('calon/pdf') ?>"><button class="btn btn-info">PDF</button></a>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Foto Calon</th>
                        <th scope="col">Nama Calon</th>
                        <th scope="col">Alamat Calon</th>
                        <th scope="col">Nama Loker</th>
                        <th scope="col">Jenis Loker</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (7 * ($currentPage - 1)); ?>
                    <?php foreach ($calon as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $c['sampul']; ?>" alt="" class="sampul"></td>
                            <td><?= $c['nama_calon']; ?></td>
                            <td><?= $c['alamat_calon']; ?></td>
                            <td><?= $c['nama_loker']; ?></td>
                            <td><?= $c['jenis_loker']; ?></td>
                            <td><?= $c['nama_perusahaan']; ?></td>
                            <td>
                                <form action="/calon/<?= $c['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('loker', 'pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>