<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <?php if (in_groups('admin')) : ?>
            <?php foreach ($sepatu as $s) : ?>
                <?php if ($s['jumlah_sepatu'] === '0') { ?>
                    <p style="color: red;"><b>Stok sepatu <?= $s['nama_sepatu']; ?> kosong</b></p>
                <?php } ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="col-4">
            <h1 class="mt-2">Daftar Sepatu</h1>
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
                <a href="/sepatu/create" class="btn btn-primary mb-3 float-end tambah">Tambah Data Sepatu</a>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Gambar Sepatu</th>
                            <th scope="col">Nama Sepatu</th>
                            <th scope="col">Harga Sepatu</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                        <?php foreach ($sepatu as $s) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $s['sampul']; ?>" alt="" class="sampul2"></td>
                                <td><?= $s['nama_sepatu']; ?></td>
                                <td><?= number_to_currency($s['harga_sepatu'], 'IDR');  ?></td>
                                <td>
                                    <a href="/sepatu/<?= $s['slug']; ?>" class="btn btn-success">Detail</a>
                                    <form action="/sepatu/<?= $s['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('sepatu', 'pagination'); ?>
            <?php endif; ?>
            <?php if (in_groups('manajer')) : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Gambar Sepatu</th>
                            <th scope="col">Nama Sepatu</th>
                            <th scope="col">Jenis Sepatu</th>
                            <th scope="col">Harga Sepatu</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                        <?php foreach ($sepatu as $s) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $s['sampul']; ?>" alt="" class="sampul2"></td>
                                <td><?= $s['nama_sepatu']; ?></td>
                                <td><?= $s['jenis_sepatu']; ?></td>
                                <td><?= number_to_currency($s['harga_sepatu'], 'IDR');  ?></td>
                                <td><?= $s['jumlah_sepatu']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('sepatu', 'pagination'); ?>
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
                <?php foreach ($sepatu as $s) : ?>
                    <?php if ($s['jumlah_sepatu'] === '0') { ?>
                        <div class="loker">
                            <div class="card m-2 float-start loker1" style="max-width: 540px; height: 132px; width: 450px;">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="/img/<?= $s['sampul']; ?>" alt="" class="sampul" style="height: 130px; width: 180px;">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $s['nama_sepatu']; ?></h5>
                                            <p class="card-text">Jenis sepatu: <?= $s['jenis_sepatu']; ?> <br>
                                                Harga Sepatu: <small class="text-muted"><?= number_to_currency($s['harga_sepatu'], 'IDR');  ?></small>
                                            </p>
                                            <p class="stokred">Stok Habis</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="loker">
                            <a href="/sepatu/<?= $s['slug']; ?>">
                                <div class="card m-2 float-start loker1" style="max-width: 540px; height: 132px; width: 450px;">
                                    <div class="row g-0">
                                        <div class="col-md-5">
                                            <img src="/img/<?= $s['sampul']; ?>" alt="" class="sampul" style="height: 130px; width: 180px;">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $s['nama_sepatu']; ?></h5>
                                                <p class="card-text">Jenis sepatu: <?= $s['jenis_sepatu']; ?></p>
                                                <p class="card-text">Harga Sepatu: <small class="text-muted"><?= number_to_currency($s['harga_sepatu'], 'IDR');  ?></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
                <?= $pager->links('sepatu', 'pagination'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>