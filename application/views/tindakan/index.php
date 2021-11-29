<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#tindakanBaruModal"><i class="fas fa-plus ">Tambah Tindakan</i></a>



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
                    <th>KD Tindakan</th>
                    <th>Nama</th>
                    <th>Penjelasan</th>
                    <th>Tarif</th>
                    <th>Lama Tindakan</th>
                    <th>TGL Buat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($tindakan as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['kd_tindakan']; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['penjelasan']; ?></td>
                        <td><?= $a['tarif']; ?></td>
                        <td><?= $a['lama_tindakan']; ?></td>
                        <td><?= date("d M Y", ($a['date_created'])); ?></td>
                        <td>
                            <a href="<?= base_url('tindakan/ubahtindakan/') . $a['kd_tindakan']; ?>" class="badge badge-success"><i class="fas fa-pen-square"></i> Ubah</a>

                            <a href="<?= base_url('tindakan/hapustindakan/') . $a['kd_tindakan']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['nama']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
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

    <!-- Modal Tambah Tindakan baru-->
    <div class=" modal fade" id="tindakanBaruModal" tabindex="-1" role="dialog" aria-labelledby="tindakanBaruModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tindakanBaruModal">Tambah Tindakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('tindakan/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-sm-3 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" readonly id="kd_tindakan" name="kd_tindakan" value="TDK<?php echo sprintf("%04s", $kd_tindakan) ?>">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm  mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukan Nama Tindakan">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" id="penjelasan" name="penjelasan" placeholder="Masukan Penjelasan Tindakan">
                            </div>

                            <div class="form-group col-sm-3 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="tarif" name="tarif" placeholder="Masukan Tarif Tindakan">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="lama_tindakan" name="lama_tindakan" placeholder="Masukan Lama Tindakan">
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
            </form>
        </div>
    </div>
</div>


<!-- End of Modal Tambah Tindakan -->