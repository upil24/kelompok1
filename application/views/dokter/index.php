<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#dokterBaruModal"><i class="fas fa-plus ">Tambah Dokter</i></a>



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
                    <th>KD Dokter</th>
                    <th>Nama</th>
                    <th>No SIP</th>
                    <th>Spesialis</th>
                    <th>Jam</th>
                    <th>Hari</th>
                    <th>Status</th>
                    <th>TGL Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($dokter as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['kd_dokter']; ?></td>
                        <td><?= $a['nama_dokter']; ?></td>
                        <td><?= $a['no_sip']; ?></td>
                        <td><?= $a['spesialis']; ?></td>
                        <td><?= $a['jam_praktek']; ?></td>
                        <td><?= $a['hari_praktek']; ?></td>
                        <td><?= $a['status']; ?></td>
                        <td><?= date("d M Y", ($a['date_created'])); ?></td>
                        <td>
                            <a href="<?= base_url('dokter/ubahDokter/') . $a['kd_dokter']; ?>" class="badge badge-success"><i class="fas fa-pen-square"></i> Ubah</a>

                            <a href="<?= base_url('dokter/hapusDokter/') . $a['kd_dokter']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['nama_dokter']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
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

    <!-- Modal Tambah dokter baru-->
    <div class=" modal fade" id="dokterBaruModal" tabindex="-1" role="dialog" aria-labelledby="dokterBaruModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dokterBaruModal">Tambah Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-sm-3 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" readonly id="kd_dokter" name="kd_dokter" value="DKT<?php echo sprintf("%04s", $kd_dokter) ?>">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm  mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" id="nama_dokter" name="nama_dokter" placeholder="Masukan Nama Dokter">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" id="no_sip" name="no_sip" placeholder="Masukan NO SIP Dokter">
                            </div>
                            <div class="form-group col-sm-3 input-group-sm mb-3">
                                <select name="jen_kel" class="form-control form-control-user">
                                    <option>Jenis Kelamin</option>
                                    <option value="PRIA">PRIA</option>
                                    <option value="WANITA">WANITA</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="spesialis" name="spesialis" placeholder="Masukan Spesialis Dokter">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="jam_praktek" name="jam_praktek" placeholder="Jam Praktek">
                            </div>
                            <div class="form-group col-sm-3 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="hari_praktek" name="hari_praktek" placeholder="Hari Praktek">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="kontak" name="kontak" placeholder="No Telpon / HP">
                            </div>
                            <div class="form-group form-group col-sm-3 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <select name="status" class="form-control form-control-user">
                                    <option>Status</option>
                                    <option value="AKTIF">AKTIF</option>
                                    <option value="NON AKTIF">NON AKTIF</option>
                                </select>
                            </div>

                            <div class="modal-footer float-left">
                                <button type="button" class="btn btn-secondary ml-0" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End of Modal Tambah dokter -->