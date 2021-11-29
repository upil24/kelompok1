<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('obat/ubahObat'); ?>">
                <div class="form-group row">
                    <label for="kd_obat" class="col-sm-2 col-form-label">KD Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kd_obat" name="kd_obat" value="<?= $obat['kd_obat']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_obat" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="nama_obat" name="nama_obat" value="<?= $obat['nama_obat']; ?> ">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="satuan" name="satuan" value="<?= $obat['satuan']; ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="<?= $obat['harga_beli']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="<?= $obat['harga_jual']; ?>">
                    </div>
                </div>


                <div class="form-group row justify-content-end float-right">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->