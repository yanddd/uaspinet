<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Data Penjualan</h1>
            <div class="col-4">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </form>
            </div>
            <?php if (in_groups('admin')) : ?>
                <form action="/penjualan/save" method="post" enctype="multipart/form-data">
                    <div class="col-6">
                        <div class="custom-file col-8">
                            <input class="form-control" type="file" id="laporan" name="laporan">
                        </div>
                        <button type="submit" class="btn btn-primary float-end mb-3">Kirim Laporan</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <?php if (in_groups('admin')) : ?>
        <div class="row">
            <div class="col">
                <a class="mb-3 float-end tambah" href="<?= base_url('penjualan/pdf') ?>"><button class="btn btn-info">PDF</button></a>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Alamat Pembeli</th>
                            <th scope="col">Nama Sepatu</th>
                            <th scope="col">Jumlah Sepatu</th>
                            <th scope="col">Harga Sepatu</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (7 * ($currentPage - 1)); ?>
                        <?php foreach ($penjualan as $p) : ?>
                            <?php if ($p['status'] === 'sudah dikonfirmasi') { ?>
                                <?php if ($p['status_bayar'] === 'sudah di bayar') { ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $p['nama_pembeli']; ?></td>
                                        <td><?= $p['alamat_pembeli']; ?></td>
                                        <td><?= $p['nama_sepatu']; ?></td>
                                        <td><?= $p['jumlah_sepatu']; ?></td>
                                        <td><?= number_to_currency($p['harga_sepatu'], 'IDR');  ?></td>
                                        <td><?= number_to_currency($p['total'], 'IDR');  ?></td>
                                        <td>
                                            <form action="/penjualan/<?= $p['id']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('penjualan', 'pagination'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (in_groups('manajer')) : ?>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Alamat Pembeli</th>
                            <th scope="col">Nama Sepatu</th>
                            <th scope="col">Jumlah Sepatu</th>
                            <th scope="col">Harga Sepatu</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (7 * ($currentPage - 1)); ?>
                        <?php foreach ($penjualan as $p) : ?>
                            <?php if ($p['status'] === 'sudah dikonfirmasi') { ?>
                                <?php if ($p['status_bayar'] === 'sudah di bayar') { ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $p['nama_pembeli']; ?></td>
                                        <td><?= $p['alamat_pembeli']; ?></td>
                                        <td><?= $p['nama_sepatu']; ?></td>
                                        <td><?= $p['jumlah_sepatu']; ?></td>
                                        <td><?= number_to_currency($p['harga_sepatu'], 'IDR');  ?></td>
                                        <td><?= number_to_currency($p['total'], 'IDR');  ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('penjualan', 'pagination'); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>