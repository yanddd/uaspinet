<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Calon</h1>
            <table class="table" border="1" cellpadding="10" cellspacing="0">>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Calon</th>
                        <th scope="col">Alamat Calon</th>
                        <th scope="col">Nama Loker</th>
                        <th scope="col">Jenis Loker</th>
                        <th scope="col">Nama Perusahaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($calon as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $c['nama_calon']; ?></td>
                            <td><?= $c['alamat_calon']; ?></td>
                            <td><?= $c['nama_loker']; ?></td>
                            <td><?= $c['jenis_loker']; ?></td>
                            <td><?= $c['nama_perusahaan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>