<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>

            <form method="post" action="<?= base_url('antrian/'); ?>">
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Pilih Tanggal</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary ">Go</button>
                </div>

            </form>
        </div>
    </div>

</div>


</div>