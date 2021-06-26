<div id="laporan">

    <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">

    </table>

    <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
        <tr>
            <td colspan="2" style="width:800px;paddin-left:20px;">
                <center>
                    <h4>LAPORAN PENJUALAN SEPATU ADYAWID SHOP</h4>
                </center><br />
            </td>
        </tr>

    </table>

    <table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
    </table>

    <table border="1" align="center" style="width:900px;margin-bottom:20px;">
        <thead>
            <tr>
                <th style="width:50px;">No</th>
                <th>Nama Pembeli</th>
                <th>Alamat Pembeli</th>
                <th>Nama Sepatu</th>
                <th>Jumlah Sepatu</th>
                <th>Harga Sepatu</th>
                <th>Total Pembelian</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $total = 0;
            ?>
            <?php foreach ($penjualan as $p) : ?>
                <?php if ($p['status'] === 'sudah dikonfirmasi') { ?>
                    <?php if ($p['status_bayar'] === 'sudah di bayar') { ?>
                        <tr>
                            <td style="text-align:center;"><?= $i++; ?></td>
                            <td style="text-align:center"><?= $p['nama_pembeli']; ?></td>
                            <td style="text-align:center"><?= $p['alamat_pembeli']; ?></td>
                            <td style="text-align:center"><?= $p['nama_sepatu']; ?></td>
                            <td style="text-align:center"><?= $p['jumlah_sepatu']; ?></td>
                            <td style="text-align:center"><?= number_to_currency($p['harga_sepatu'], 'IDR');  ?></td>
                            <td style="text-align:center"><?= number_to_currency($p['total'], 'IDR');  ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
                <?php $total += $p['total']; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align:center;"><b>Total</b></td>
                <td style="text-align:right;"><b><?= number_to_currency($total, 'IDR'); ?></b></td>
            </tr>
        </tfoot>
    </table>
    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
            <td></td>
    </table>
    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
            <td align="right">Pekanbaru, <?= date('d-M-Y') ?></td>
        </tr>
        <tr>
            <td align="right"></td>
        </tr>

        <tr>
            <td><br /><br /><br /><br /></td>
        </tr>
        <tr>
            <td align="right">( <?= user()->username; ?> )</td>
        </tr>
        <tr>
            <td align="center"></td>
        </tr>
    </table>
    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
            <th><br /><br /></th>
        </tr>
        <tr>
            <th align="left"></th>
        </tr>
    </table>
</div>