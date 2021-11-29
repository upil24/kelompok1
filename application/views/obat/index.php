<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#obatBaruModal"><i class="fas fa-plus ">Tambah Obat</i></a>



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
                    <th>KD Obat</th>
                    <th>Nama</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>TGL Buat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($obat as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['kd_obat']; ?></td>
                        <td><?= $a['nama_obat']; ?></td>
                        <td><?= $a['satuan']; ?></td>
                        <td><?= $a['harga_beli']; ?></td>
                        <td><?= $a['harga_jual']; ?></td>
                        <td><?= date("d M Y", ($a['date_created'])); ?></td>
                        <td>
                            <a href="<?= base_url('obat/ubahObat/') . $a['kd_obat']; ?>" class="badge badge-success"><i class="fas fa-pen-square"></i> Ubah</a>

                            <a href="<?= base_url('obat/hapusobat/') . $a['kd_obat']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['nama_obat']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
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

    <!-- Modal Tambah obat baru-->
    <div class=" modal fade" id="obatBaruModal" tabindex="-1" role="dialog" aria-labelledby="obatBaruModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="obatBaruModal">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('obat/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-sm-3 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" readonly id="kd_obat" name="kd_obat" value="OBT<?php echo sprintf("%04s", $kd_obat) ?>">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm  mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" id="nama_obat" name="nama_obat" placeholder="Masukan Nama Obat">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" id="satuan" name="satuan" placeholder="Masukan Satuan Obat">
                            </div>

                            <div class="form-group col-sm-3 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="harga_beli" name="harga_beli" placeholder="Masukan Harga Beli Obat">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="harga_jual" name="harga_jual" placeholder="Masukan Harga Jual Obat">
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
</div>

<!-- End of Modal Tambah Obat -->