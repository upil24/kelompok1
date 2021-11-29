<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">

        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#kunjunganBaruModal"><i class="fas fa-plus ">Kunjungan Baru</i></a>


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
                    <th>KD Pemeriksaan</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($rm as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['kd_rm']; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['nama_dokter']; ?></td>
                        <td><?= $a['status_periksa']; ?></td>
                        <td><?= date("d M Y", ($a['date_created'])); ?></td>
                        <td>
                            <a href="<?= base_url('rekammedis/rekam/') . $a['kd_rm']; ?>" class="badge badge-success"><i class="fas fa-pen-square"></i>Rekam</a>

                            <a href="<?= base_url('rekammedis/editkunjungan/') . $a['kd_rm']; ?>" class="badge badge-primary"><i class="fas fa-pen-square"></i>Edit</a>

                            <a href="<?= base_url('rekammedis/hapusKunjungan/') . $a['kd_rm']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['nama']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
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

    <!-- Modal Tambah kunjungan baru-->
    <div class=" modal fade" id="kunjunganBaruModal" tabindex="-1" role="dialog" aria-labelledby="kunjunganBaruModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kunjunganBaruModal">Tambah Kunjungan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('rekammedis/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "kelompok1");
                            ?>

                            <div class="col-sm-3 input-group-sm mb-3 mt-3 ">
                                <input type="text" class="form-control form-control-user" readonly id="kd_rm" name="kd_rm" value="<?= $kd_rm; ?>">
                            </div>

                            <div class="form-group col-sm-4 input-group-sm  mb-3 mt-3">
                                <select name="kd_pasien" id="kd_pasien" class="form-control mb-3" onchange='changeValue(this.value)'>
                                    <option value="">Pilih Kode Pasien</option>
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
                            <div class="form-group col-sm-4 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user " id="nama" name="nama" readonly placeholder="Nama Pasien">
                            </div>

                            <div class="form-group col-sm-3 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="jen_kel" name="jen_kel" readonly placeholder="Jenis Kelamin ">
                            </div>

                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" readonly placeholder="Tanggal Lahir ">
                            </div>

                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <select name="kd_dokter" id="" class="form-control">
                                    <option value="">- Pilih Dokter -</option>
                                    <?php foreach ($dokter as $r) { ?>
                                        <option value="<?= $r['kd_dokter']; ?>"><?= $r['nama_dokter']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer float-left">
                            <button type="button" class="btn btn-secondary ml-0" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                        </div>
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
</div>

<!-- End of Modal Tambah kunjungan -->