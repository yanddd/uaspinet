<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-9" style="margin: auto;">
            <h1 class="mt-2 mb-3">Daftar Laporan</h1>
            <div class="col-4">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </form>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Laporan</th>
                        <th scope="col">Tanggal Laporan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (7 * ($currentPage - 1)); ?>
                    <?php foreach ($laporan as $l) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $l['laporan']; ?></td>
                            <td><?= $l['created_at']; ?></td>
                            <td><a href="/laporan/<?= $l['laporan']; ?>">
                                    <button type="button" class="btn btn-primary">Lihat</button>
                                </a>
                                <form action="/laporan/<?= $l['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('penjualan', 'pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>