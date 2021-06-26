<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Keranjang Belanja</h1>
            <div class="col-4">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </form>
            </div>
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
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Sepatu</th>
                        <th scope="col">Harga Sepatu</th>
                        <th scope="col">Jumlah Sepatu</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penjualan as $p) : ?>
                        <?php if ($p['username'] === user()->username) { ?>
                            <?php if ($p['status_bayar'] === 'belum di bayar') { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $p['nama_sepatu']; ?></td>
                                    <td><?= number_to_currency($p['harga_sepatu'], 'IDR');  ?></td>
                                    <td><?= $p['jumlah_sepatu']; ?></td>
                                    <td><?= $p['status_bayar']; ?></td>
                                    <td>
                                        <a href="/sepatu/beli/<?= $p['id']; ?>" class="btn btn-warning">Bayar</a>
                                        <form action="/cart/<?= $p['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>