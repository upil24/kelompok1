<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('pasien/ubahPasien'); ?>">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">No.Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kd_pasien" name="kd_pasien" value="<?= $pasien['kd_pasien']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="nama" name="nama" value="<?= $pasien['nama']; ?> ">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" value="<?= $pasien['tgl_lahir']; ?>" autocomplete="off">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No.Telpon</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="kontak" name="kontak" value="<?= $pasien['kontak']; ?>">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="jen_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-2">
                        <select name="jen_kel" required class="form-control form-control-user" value="<?= $pasien['jen_kel']; ?>">
                            <?php
                            if ($pasien['jen_kel'] == "PRIA") {
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
                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="umur" name="umur" value="<?= $pasien['umur']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pasien['pekerjaan']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $pasien['email']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_ktp" class="col-sm-2 col-form-label">No.KTP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= $pasien['no_ktp']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pelayanan" class="col-sm-2 col-form-label">Pelayanan</label>
                    <div class="col-sm-2">
                        <select name="pelayanan" required class="form-control form-control-user" value="<?= $pasien['pelayanan']; ?>">
                            <?php
                            if ($pasien['pelayanan'] == "BPJS") {
                            ?>
                                <option selected value="BPJS">BPJS</option>
                            <?php
                            } else {
                            ?>
                                <option selected value="UMUM">UMUM</option>

                            <?php
                            }
                            ?>
                            <option value="BPJS">BPJS</option>
                            <option value="UMUM">UMUM</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_bpjs" class="col-sm-2 col-form-label">No.BPJS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_bpjs" name="no_bpjs" value="<?= $pasien['no_bpjs']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="alamat" name="alamat" value="<?= $pasien['alamat']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gol_darah" class="col-sm-2 col-form-label">Golongan Darah</label>
                    <div class="col-sm-2">
                        <select name="gol_darah" required class="form-control form-control-user" value="<?= $pasien['gol_darah']; ?>">
                            <?php
                            if ($pasien['gol_darah'] == "A") {
                            ?>
                                <option selected value="A">A</option>
                            <?php
                            } elseif ($pasien['gol_darah'] == "B") {
                            ?>
                                <option selected value="B">B</option>
                            <?php
                            } elseif ($pasien['gol_darah'] == "AB") {
                            ?>
                                <option selected value="AB">AB</option>
                            <?php
                            } else {
                            ?>
                                <option selected value="O">O</option>

                            <?php
                            }
                            ?>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
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