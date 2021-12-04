<?php
// var_dump($hasil);
// die
?>

<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <form method="post" action="<?= base_url('billing_pemeriksaan/'); ?>">
            <div class="form-group row mt-3 mb-5">

                <div class="col-sm-3 ">
                    <input type="text" class="form-control " id="kd_rm" name="kd_rm" placeholder="Masukan Kode RM">
                </div>
                <button type="submit" class="btn btn-primary ">Go</button>
            </div>
        </form>



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
                    <th>Kode Billing</th>
                    <th>Kode Pasien</th>
                    <th>Kode RM</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($tampil as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['kd_billing_periksa']; ?></td>
                        <td><?= $a['kd_pasien']; ?></td>
                        <td><?= $a['kd_rm']; ?></td>
                        <td><?= $a['total']; ?></td>
                        <td><?= date("d M Y", strtotime($a['date_created'])); ?></td>
                        <td><?= $a['status']; ?></td>
                        <td>
                            <a href="<?= base_url('billing_pemeriksaan/kwitansi/') . $a['kd_rm']; ?>" class="badge badge-primary" target="_blank"><i class="fas fa-print"></i> Cetak</a>
                            <a href="<?= base_url('billing_pemeriksaan/hapus/') . $a['kd_billing_periksa']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['kd_billing_periksa']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i></a>
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


</div>
<!-- End of Modal Tambah Antrian -->