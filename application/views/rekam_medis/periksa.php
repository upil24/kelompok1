<section class="konten mt-2">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">

                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        Biodata Pasien
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
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

                <div class="card border-info mt-4">
                    <div class="card-header bg-info text-white">
                        Riwayat Berobat
                        <a href="<?= base_url('rekammedis/cetak_riwayat/' . $biodata['kd_pasien']); ?>" class="btn btn-warning btn-sm float-right" target="_blank">Cetak</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tgl. Berobat</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Dokter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($riwayat as $r) { ?>

                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= date("d M Y", strtotime($r['date_created'])); ?></td>
                                        <td><?= $r['keluhan']; ?></td>
                                        <td><?= $r['diagnosa']; ?></td>
                                        <td><?= $r['nama_dokter']; ?></td>
                                    </tr>

                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        Catatan (Rekam Medis)
                        <a href="<?= base_url('rekammedis/cetak_hasil/' . $kode_rekam); ?>" class="btn btn-warning btn-sm float-right" target="_blank">Cetak Hasil</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url(); ?>rekammedis/insert_rm">
                            <input type="hidden" name="kd_rm" value="<?= $d['kd_rm']; ?>">
                            <div class="form-group">
                                <label for="">Tensi</label>
                                <input name="tensi" class="form-control" required value="<?= $d['tensi']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Alergi</label>
                                <input name="alergi" class="form-control" required value="<?= $d['alergi']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tinggi Berat Badan</label>
                                <input name="tb_bb" class="form-control" required value="<?= $d['tb_bb']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Keluhan</label>
                                <textarea name="keluhan" class="form-control" required><?= $d['keluhan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Diagnosa</label>
                                <textarea name="diagnosa" class="form-control" required><?= $d['diagnosa']; ?></textarea>
                            </div>


                            <button type="submit" class="btn btn-danger btn-sm">Simpan Data</button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-success mt-4">
                    <div class="card-header bg-success text-white">
                        Resep Obat
                        <a href="<?= base_url('rekammedis/cetak_resep/' . $d['kd_rm']); ?>" class="btn btn-primary btn-sm float-right" target="_blank">Cetak Resep</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('rekammedis/insert_resep'); ?>">
                            <input type="hidden" name="kd_rm" value="<?= $d['kd_rm']; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="kd_obat" id="" class="form-control">
                                            <?php foreach ($obat as $r) { ?>
                                                <option value="<?= $r['kd_obat']; ?>"><?= $r['nama_obat']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <input type="text" required class="form-control" id="jumlah" name="jumlah" placeholder="Qty" required>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-10">
                                    <input type="text" required class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                                </div>

                                <div class="col-md-0 ">
                                    <button type="submit" class="btn btn-success">+</button>
                                </div>
                            </div>
                        </form>

                        <hr>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($resep as $r) { ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $r['nama_obat']; ?></td>
                                        <td><?= $r['jumlah']; ?></td>
                                        <td><?= $r['keterangan']; ?></td>
                                        <td>
                                            <a href="<?= base_url() . 'rekammedis/hapus_resep/' . $r['kd_resep'] . '/' . $r['kd_rm']; ?>" class="text-danger">x</a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-warning mt-4">
                    <div class="card-header bg-warning text-white">
                        Tindakan
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('rekammedis/insert_tindakan'); ?>">
                            <input type="hidden" name="kd_rm" value="<?= $d['kd_rm']; ?>">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="kd_tindakan" id="" class="form-control">
                                            <?php foreach ($tindakan as $r) { ?>
                                                <option value="<?= $r['kd_tindakan']; ?>"><?= $r['nama']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-0 ">
                                    <button type="submit" class="btn btn-warning">+</button>
                                </div>
                            </div>

                        </form>

                        <hr>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Tindakan</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($detail_tindakan as $r) { ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $r['nama']; ?></td>
                                        <td>
                                            <a href="<?= base_url() . 'rekammedis/hapus_tindakan/' . $r['kd_detail'] . '/' . $r['kd_rm']; ?>" class="text-danger">x</a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>