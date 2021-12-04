<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Seluruh Pasien</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelPasien->jumlahpasien(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href=""><i class="fas fa-users fa-3x text-warning"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Dokter</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelDokter->jumlahDokter(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href=""><i class="fas fa-user-md fa-3x text-primary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Pasien Belum Diperiksa</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelRM->belumperiksa(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href=""><i class="fas fa-x-ray fa-3x text-success"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Pasien Sudah Diperiksa</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelRM->sudahperiksa(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href=""><i class="fas fa-vial fa-3x text-danger"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row ux-->

    <!-- Divider -->
    <hr class="sidebar-divider">



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->