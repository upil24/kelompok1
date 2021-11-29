        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Content Row1 -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="alert bg-primary" role="alert">
                            <h4 class="text-center text-light">Laporan Pasien</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Laporan/laporan_pasien'); ?>" method="post">
                                <div class="col-md-6 ml-2">
                                    <input type="submit" class="btn btn-outline-primary form-control ml-5" value="Cetak" formtarget="_blank">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="alert bg-primary" role="alert">
                            <h4 class="text-center text-light">Laporan Kunjungan</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Laporan/laporan_kunjungan'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <input type="text" class="form-control datepicker" placeholder="Pilih Tgl" name="awal">
                                    </div>-
                                    <div class="col-md-4 ">
                                        <input type="text" class="form-control datepicker" placeholder="Pilih Tgl" name="akhir">
                                    </div>
                                    <div class="col-md-3 ">
                                        <input type="submit" class="btn btn-outline-primary form-control" value="Cetak" formtarget="_blank">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="alert bg-primary" role="alert">
                            <h4 class="text-center text-light">Laporan Dokter</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Laporan/laporan_dokter'); ?>" method="post">
                                <div class="col-md-6 ml-4">
                                    <input type="submit" class="btn btn-outline-primary form-control ml-5" value="Cetak" formtarget="_blank">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row1 -->
            </div>

            <!-- Content Row2 -->
            <div class="row">
                <div class="col-md-4 mt-5 mb-5">
                    <div class="card">
                        <div class="alert bg-success" role="alert">
                            <h4 class="text-center text-light">Laporan User</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Laporan/laporan_user'); ?>" method="post">
                                <div class="col-md-6 ml-4">
                                    <input type="submit" class="btn btn-outline-success form-control ml-5" value="Cetak" formtarget="_blank">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- end row2 -->
            </div>







            <!-- end container -->
        </div>