<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#pasienBaruModal"><i class="fas fa-plus ">Tambah Pasien</i></a>



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
                    <th>KD.Pasien</th>
                    <th>Nama Pasien</th>
                    <th>No.Telp</th>
                    <th>Gender</th>
                    <th>Pelayanan</th>
                    <th>Tgl Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($pasien as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['kd_pasien']; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['kontak']; ?></td>
                        <td><?= $a['jen_kel']; ?></td>
                        <td><?= $a['pelayanan']; ?></td>
                        <td><?= date("d M Y", strtotime($a['date_created'])); ?></td>
                        <td>
                            <a href="<?= base_url('pasien/ubahPasien/') . $a['kd_pasien']; ?>" class="badge badge-success"><i class="fas fa-pen-square"></i> Ubah</a>
                            <a href="<?= base_url('pasien/cetak_kartu/') . $a['kd_pasien']; ?>" class="badge badge-primary" target="_blank"><i class="fas fa-print"></i> Cetak Kartu</a>
                            <a href="<?= base_url('pasien/hapusPasien/') . $a['kd_pasien']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['nama']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i></a>
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

    <!-- Modal Tambah Pasien baru-->
    <div class=" modal fade" id="pasienBaruModal" tabindex="-1" role="dialog" aria-labelledby="pasienBaruModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pasienBaruModal">Tambah Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pasien/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-3 input-group-sm mb-3 ">
                                    <input type="text" class="form-control form-control-user" readonly id="no_pas" name="kd_pasien" value="<?= $kd_pasien; ?>">
                                </div>

                                <div class="col-sm-4 input-group-sm  mb-3">
                                    <input type="text" class="form-control form-control-user" id="pas" name="nama" placeholder="Masukan Nama">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user datepicker" id="tgl_lahir" name="tgl_lahir" autocomplete="off" placeholder="Tanggal Lahir">
                                </div>

                                <div class="col-sm-3 input-group-sm mb-3">
                                    <select name="jen_kel" class="form-control form-control-user">
                                        <option>Jenis Kelamin</option>
                                        <option value="PRIA">PRIA</option>
                                        <option value="WANITA">WANITA</option>
                                    </select>
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user" id="kontak" name="kontak" placeholder="Nomor Telpon/HP">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user " id="umur" name="umur" placeholder="Umur">
                                </div>

                                <div class="col-sm-3 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user " id="no_ktp" name="no_ktp" placeholder="Nomor KTP">
                                </div>

                                <div class="col-sm-3 input-group-sm ">
                                    <select name="pelayanan" class="form-control form-control-user">
                                        <option>-BPJS / UMUM-</option>
                                        <option value="BPJS">BPJS</option>
                                        <option value="UMUM">UMUM</option>
                                    </select>
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user" id="no_bpjs" name="no_bpjs" placeholder="Nomor BPJS">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <textarea class="form-control form-control-user" name="alamat" id="alamat" placeholder="Masukan Alamat"></textarea>
                                </div>

                                <div class="col-sm-3 input-group-sm mb-4">
                                    <select name="gol_darah" class="form-control form-control-user">
                                        <option>Golongan Darah</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>

                            </div>



                        </div>
                        <div class="modal-footer float-left">
                            <button type="button" class="btn btn-secondary ml-0" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah pasien -->