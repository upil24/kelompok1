<div class="card ">
    <div class="card-header bg-primary text-white">
        Biodata Pasien
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <tr>
                <th>Kode Billing</th>
                <td>:</td>
                <td><?= $kd_billing_obat; ?></td>
            </tr>

            <tr>
                <th>Kode Pasien</th>
                <td>:</td>
                <td><?= $biodata['kd_pasien']; ?></td>
            </tr>
            <tr>
                <th>Kode RM</th>
                <td>:</td>
                <td><?= $biodata['kd_rm']; ?></td>
            </tr>
            <tr>
                <th>Nama Pasien</th>
                <td>:</td>
                <td><?= $biodata['nama']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td><?= $biodata['jen_kel']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>:</td>
                <td><?= $biodata['tgl_lahir']; ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td>:</td>
                <td><?= $biodata['umur']; ?> Tahun</td>
            </tr>
            <tr>
                <th>Gol. Darah</th>
                <td>:</td>
                <td><?= $biodata['gol_darah']; ?></td>
            </tr>
        </table>
    </div>
</div>

<table id="" class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sub Total</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        $i = 1;
        foreach ($hasil as $a) { ?>
            <tr>
                <?php $sub = $a['jumlah'] * $a['harga_jual'];
                $total += $sub; ?>
                <td><?= $i++; ?></td>
                <td><?= $a['nama_obat']; ?></td>
                <td><?= $a['harga_jual']; ?></td>
                <td><?= $a['jumlah']; ?></td>
                <td><?= $sub ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th colspan="3"> </th>
            <th>Total</th>
            <td><?= $total; ?></td>
        </tr>
    </tbody>
</table>


<form method="post" class="mb-5" action="<?= base_url(); ?>billing_obat/tambah">
    <input type="hidden" name="kd_billing_obat" value="<?= $kd_billing_obat; ?>">
    <input type="hidden" name="kd_pasien" value="<?= $biodata['kd_pasien']; ?>">
    <input type="hidden" name="kd_rm" value="<?= $biodata['kd_rm']; ?>">
    <input type="hidden" name="total" value="<?= $total; ?>">
    <div class="float-right">
        <div class="mr-5 ">
            <div class="mr-4">
                <div class="mr-5">
                    <button type="submit" class="btn btn-danger btn-sm mr-5">Simpan Data</button>
                </div>
            </div>
        </div>
    </div>
</form>