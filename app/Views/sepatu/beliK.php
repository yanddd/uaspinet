<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Form Pembelian</h1>
            <form action="/sepatu/saveBeli" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="username" value="<?= user()->username; ?>">

                <div class="row mb-3">
                    <label for="nama_pembeli" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" autofocus>
                    </div>
                </div>
                <div class="perhitungan">
                    <div class="row mb-3">
                        <label for="alamat_pembeli" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <select type="text" class="form-control" id="alamat_pembeli" name="alamat_pembeli">
                                <option value="">-- Pilih Alamat --</option>
                                <option value="10000.Pekanbaru">Pekanbaru</option>
                                <option value="12000.Panam">Panam</option>
                                <option value="15000.Air Tiris">Air Tiris</option>
                                <option value="20000.Bangkinang">Bangkinang</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jumlah_sepatu" class="col-sm-3 col-form-label">Jumlah Sepatu</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="jumlah_sepatu" name="jumlah_sepatu">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_sepatu" class="col-sm-3 col-form-label">Nama Sepatu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= ($validation->hasError('nama_sepatu')) ? 'is-invalid' : ''; ?>" id="nama_sepatu" name="nama_sepatu" autofocus value="<?= (old('nama_sepatu')) ? old('nama_sepatu') : $sepatu['nama_sepatu'] ?>" readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('nama_sepatu'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga_sepatu" class="col-sm-3 col-form-label">Harga Sepatu</label>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-text">IDR</span>
                            <input type="text" class="form-control" id="harga_sepatu" name="harga_sepatu" value="<?= (old('harga_sepatu')) ? old('harga_sepatu') : $sepatu['harga_sepatu'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="total" class="col-sm-3 col-form-label">Total</label>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-text">IDR</span>
                            <input type="number" class="form-control" id="total" name="total" readonly>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script type="text/javascript">
                    $(".perhitungan").click(function() {
                        var harga_sepatu = parseInt($("#harga_sepatu").val())
                        var alamat_pembeli = parseInt($("#alamat_pembeli").val())
                        var jumlah_sepatu = parseInt($("#jumlah_sepatu").val())

                        var total = harga_sepatu * jumlah_sepatu + alamat_pembeli;
                        $("#total").attr("value", total)
                    });
                </script>
                <script type="text/javascript">
                    $(".perhitungan").keyup(function() {
                        var harga_sepatu = parseInt($("#harga_sepatu").val())
                        var alamat_pembeli = parseInt($("#alamat_pembeli").val())
                        var jumlah_sepatu = parseInt($("#jumlah_sepatu").val())

                        var total = harga_sepatu * jumlah_sepatu + alamat_pembeli;
                        $("#total").attr("value", total)
                    });
                </script>
                <button type="submit" class="btn btn-primary mb-4 tambahFormulir">Bayar</button>
                <p class="float-right rules">Nama Lengkap, alamat dan jumlah sepatu wajib di isi</p>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>