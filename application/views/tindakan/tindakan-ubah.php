<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('tindakan/ubahTindakan'); ?>">
                <div class="form-group row">
                    <label for="kd_tindakan" class="col-sm-2 col-form-label">KD Tindakan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kd_tindakan" name="kd_tindakan" value="<?= $tindakan['kd_tindakan']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="nama" name="nama" value="<?= $tindakan['nama']; ?> ">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="penjelasan" class="col-sm-2 col-form-label">Penjelasan</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="penjelasan" name="penjelasan" value="<?= $tindakan['penjelasan']; ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="tarif" class="col-sm-2 col-form-label">Tarif</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tarif" name="tarif" value="<?= $tindakan['tarif']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lama_tindakan" class="col-sm-2 col-form-label">Lama Tindakan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lama_tindakan" name="lama_tindakan" value="<?= $tindakan['lama_tindakan']; ?>">
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