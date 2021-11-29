<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('dokter/ubahDokter'); ?>">
                <div class="form-group row">
                    <label for="kd_dokter" class="col-sm-2 col-form-label">KD Dokter</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kd_dokter" name="kd_dokter" value="<?= $dokter['kd_dokter']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_dokter" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="nama_dokter" name="nama_dokter" value="<?= $dokter['nama_dokter']; ?> ">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_sip" class="col-sm-2 col-form-label">NO SIP</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="no_sip" name="no_sip" value="<?= $dokter['no_sip']; ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="jen_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-2">
                        <select name="jen_kel" required class="form-control form-control-user" value="<?= $dokter['jen_kel']; ?>">
                            <?php
                            if ($dokter['jen_kel'] == "PRIA") {
                            ?>
                                <option selected value="PRIA">Pria</option>
                            <?php
                            } else {
                            ?>
                                <option selected value="WANITA">Wanita</option>

                            <?php
                            }
                            ?>
                            <option value="PRIA">Pria</option>
                            <option value="WANITA">Wanita</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="spesialis" class="col-sm-2 col-form-label">Spesialis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="spesialis" name="spesialis" value="<?= $dokter['spesialis']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jam_praktek" class="col-sm-2 col-form-label">Jam Praktek</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jam_praktek" name="jam_praktek" value="<?= $dokter['jam_praktek']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hari_praktek" class="col-sm-2 col-form-label">Hari Praktek</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hari_praktek" name="hari_praktek" value="<?= $dokter['hari_praktek']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="alamat" name="alamat" value="<?= $dokter['alamat']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $dokter['kontak']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $dokter['email']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-2">
                        <select name="status" required class="form-control form-control-user" value="<?= $dokter['status']; ?>">
                            <?php
                            if ($dokter['status'] == "AKTIF") {
                            ?>
                                <option selected value="AKTIF">AKTIF</option>
                            <?php
                            } else {
                            ?>
                                <option selected value="NON AKTIF">NON AKTIF</option>

                            <?php
                            }
                            ?>
                            <option value="AKTIF">AKTIF</option>
                            <option value="NON AKTIF">NON AKTIF</option>
                        </select>
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