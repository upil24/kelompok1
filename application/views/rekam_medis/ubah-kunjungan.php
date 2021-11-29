<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('rekammedis/editKunjungan'); ?>">
                <?php
                $con = mysqli_connect("localhost", "root", "", "kelompok1");
                ?>

                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">Kode RM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kd_rm" name="kd_rm" value="<?= $kd_rm['kd_rm']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kd_pasien" class="col-sm-2 col-form-label">Kode Pasien</label>
                    <div class="col-sm-10">
                        <select name="kd_pasien" id="kd_pasien" class="form-control" onchange='changeValue(this.value)' required>
                            <option value="<?= $pasien['kd_pasien']; ?>"><?= $pasien['kd_pasien']; ?></option>
                            <?php
                            $result = mysqli_query($con, "SELECT * FROM pasien  ORDER BY kd_pasien DESC");
                            $jsArray = "var prdName = new Array();\n";
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option    value="' . $row['kd_pasien'] . '">' . $row['kd_pasien'] . '</option>';
                                $jsArray .= "prdName['" . $row['kd_pasien'] . "'] = {nama:'" . addslashes($row['nama']) . "',jen_kel:'" . addslashes($row['jen_kel']) . "',tgl_lahir:'" . addslashes($row['tgl_lahir']) . "'};\n";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-user " id="nama" name="nama" readonly placeholder="Nama Pasien" readonly value="<?= $pasien['nama']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jen_kel" class="col-sm-2 col-form-label">Jenkel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-user " id="jen_kel" name="jen_kel" readonly placeholder="Jenkel Pasien" readonly value="<?= $pasien['jen_kel']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-user " id="tgl_lahir" name="tgl_lahir" readonly placeholder="Tanggal Lahir Pasien" readonly value="<?= $pasien['tgl_lahir']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kd_dokter" class="col-sm-2 col-form-label">Dokter</label>
                    <div class="col-sm-10">
                        <select name="kd_dokter" id="" class="form-control" required>
                            <option value="<?= $pasien['kd_dokter']; ?>"><?= $pasien['nama_dokter']; ?></option>
                            <?php foreach ($dokter as $r) { ?>
                                <option value="<?= $r['kd_dokter']; ?>"><?= $r['nama_dokter']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="form-group row justify-content-end float-right">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                    </div>
                </div>

                <script type="text/javascript">
                    <?php echo $jsArray; ?>

                    function changeValue(id) {
                        document.getElementById('nama').value = prdName[id].nama;
                        document.getElementById('jen_kel').value = prdName[id].jen_kel;
                        document.getElementById('tgl_lahir').value = prdName[id].tgl_lahir;
                    };
                </script>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->