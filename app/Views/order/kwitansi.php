<div class="kw">
    <table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
        <tr>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>TOKO ADYAWID SHOP</b></span><br>
                Jl. Soekarno-Hatta <br>
                Pekanbaru <br>
                Telp : 0889-7878-9800
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:12pt'>KWITANSI PEMBELIAN</span></b>
                </br><br>
                No Pembelian : <?= $penjualan['id']; ?></br><br>
                Tanggal : <?= $penjualan['created_at']; ?></br><br>
                Nama Pelanggan : <?= $penjualan['nama_pembeli']; ?></br><br>
            </td>
        </tr>
    </table>
    <br>
    <table cellspacing='0' style='width:100%; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
        <tr align='center'>
            <th style="width:50px;">No</th>
            <th>Nama Pembeli</th>
            <th>Alamat Pembeli</th>
            <th>Nama Sepatu</th>
            <th>Jumlah Sepatu</th>
            <th>Harga Sepatu</th>
            <th>Total Pembelian</th>
        </tr>
        <?php $i = 1;
        $total = 0;
        ?>
        <tr>
            <td style="text-align:center;"><?= $i; ?></td>
            <td><?= $penjualan['nama_pembeli']; ?></td>
            <td><?= $penjualan['alamat_pembeli']; ?></td>
            <td><?= $penjualan['nama_sepatu']; ?></td>
            <td style="text-align:center;"><?= $penjualan['jumlah_sepatu']; ?></td>
            <td style="text-align:center;"><?= number_to_currency($penjualan['harga_sepatu'], 'IDR');  ?></td>
            <td style="text-align:right;"><?= number_to_currency($penjualan['total'], 'IDR');  ?></td>
        </tr>
        <?php $total += $penjualan['total']; ?>
        <tr>
            <td colspan="6" style="text-align:right;"><b>Total :</b></td>
            <td style="text-align:right;"><b><?= number_to_currency($total, 'IDR'); ?></b></td>
        </tr>
    </table>
    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
            <td></td>
    </table>
    <br><br>
    <table style='width:100%; font-size:7pt;' cellspacing='2'>
        <tr>
            <td align='center'>Kasir</br></br><br><br><u> ( Admin 1 )</u></td>
            <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
            <td align='center'>Pembeli</br></br><br><br><u> ( <?= $penjualan['nama_pembeli'];  ?> )</u></td>
        </tr>
    </table>
</div>