<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php if (in_groups('admin')) : ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-2">Orderan Sepatu</h1>
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
            </div>
        </div>
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
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($penjualan as $p) : ?>
                            <?php if ($p['status'] === 'belum dikonfirmasi') { ?>
                                <?php if ($p['status_bayar'] === 'sudah di bayar') { ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $p['nama_pembeli']; ?></td>
                                        <td><?= $p['alamat_pembeli']; ?></td>
                                        <td><?= $p['nama_sepatu']; ?></td>
                                        <td><?= $p['jumlah_sepatu']; ?></td>
                                        <td><?= number_to_currency($p['harga_sepatu'], 'IDR');  ?></td>
                                        <td><?= number_to_currency($p['total'], 'IDR');  ?></td>
                                        <form action="/order/update/<?= $p['id']; ?>" method="post" enctype="multipart/form-data">
                                            <td><?= $p['status']; ?></td>
                                            <td><input id="status" name="status" type="hidden" value="sudah dikonfirmasi">
                                                <?= csrf_field(); ?>
                                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                                <button type="submit" class="btn btn-warning">Konfirmasi</button>
                                                <!-- </form> -->
                                            </td>
                                        </form>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (in_groups('user')) : ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-2">Histori Pembelian</h1>
                <div class="col-4">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($penjualan as $p) : ?>
                            <?php if ($p['username'] === user()->username) { ?>
                                <?php if ($p['status_bayar'] === 'sudah di bayar') { ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $p['nama_pembeli']; ?></td>
                                        <td><?= $p['alamat_pembeli']; ?></td>
                                        <td><?= $p['nama_sepatu']; ?></td>
                                        <td><?= $p['jumlah_sepatu']; ?></td>
                                        <td><?= number_to_currency($p['harga_sepatu'], 'IDR');  ?></td>
                                        <td><?= number_to_currency($p['total'], 'IDR');  ?></td>
                                        <td><?= $p['status']; ?></td>
                                        <td>
                                            <?php if ($p['status'] === 'sudah dikonfirmasi') { ?>
                                                <a href="/order/kwitansi/<?= $p['id']; ?>"><button class="btn btn-info">Print</button></a>
                                            <?php } else { ?>
                                                <button class="btn btn-secondary">Print</button>
                                            <?php } ?>
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
<?php endif; ?>
<?= $this->endSection(); ?>