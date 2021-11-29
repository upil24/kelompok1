<?php
// var_dump($hasil);
// die
?>

<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#antrianBaruModal"><i class="fas fa-plus ">Tarik Pasien</i></a>



        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php } ?>
        <?= $this->session->flashdata('pesan'); ?>




        <table id="tabel-data" class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Antrian</th>
                    <th>Kode Pasien</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($hasil as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['kd_antrian']; ?></td>
                        <td><?= $a['kd_pasien']; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= date("d M Y", strtotime($a['tanggal'])); ?></td>
                        <td>
                            <a href="<?= base_url('antrian/kartu_antri/') . $a['kd_antrian']; ?>" class="badge badge-primary" target="_blank"><i class="fas fa-print"></i> Cetak Kartu</a>
                            <a href="<?= base_url('antrian/hapusAntrian/') . $a['kd_antrian']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['nama']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <script>
                $(document).ready(function() {
                    $('#tabel-data').DataTable();
                });
            </script>
        </table>
    </div>

    <!-- Modal Tambah Antrian baru-->
    <div class=" modal fade" id="antrianBaruModal" tabindex="-1" role="dialog" aria-labelledby="antrianBaruModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="antrianBaruModal">Tambah Antrian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('antrian/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "kelompok1");
                        ?>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user " id="kd_antrian" name="kd_antrian" readonly value="<?= $kd_antrian; ?>">
                        </div>

                        <select name="kd_pasien" id="kd_pasien" class="form-control mb-3" onchange='changeValue(this.value)' required>
                            <option value="">Pilih No Pasien</option>
                            <?php
                            $result = mysqli_query($con, "SELECT * FROM pasien  ORDER BY kd_pasien DESC");
                            $jsArray = "var prdName = new Array();\n";
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option    value="' . $row['kd_pasien'] . '">' . $row['kd_pasien'] . '</option>';
                                $jsArray .= "prdName['" . $row['kd_pasien'] . "'] = {nama:'" . addslashes($row['nama']) . "',jen_kel:'" . addslashes($row['jen_kel']) . "',tgl_lahir:'" . addslashes($row['tgl_lahir']) . "'};\n";
                            }
                            ?>
                        </select>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user " id="nama" name="nama" readonly placeholder="Nama Pasien">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="jen_kel" name="jen_kel" readonly placeholder="Jenis Kelamin ">
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" readonly placeholder="Tanggal Lahir ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
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
</div>
<!-- End of Modal Tambah Antrian -->