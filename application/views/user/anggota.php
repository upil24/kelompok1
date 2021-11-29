<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">

        <div class="d-flex flex-row-reverse bd-highlight">
            <a href="" class="btn btn-primary mt-3 " data-toggle="modal" data-target="#userBaruModal"><i class="fas fa-file-alt"></i> Tambah </a>
        </div>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php } ?>
        <?= $this->session->flashdata('pesan'); ?>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Gambar</th>
                    <th>Member Sejak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($anggota as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['email']; ?></td>
                        <td><?= $a['role']; ?></td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/') . $a['image']; ?>" class="img-fluid img-thumbnail m-0" style="width:60px;height:80px; ">
                            </picture>
                        </td>
                        <td><?= date('d M Y', $a['date_created']); ?></td>

                        <td>

                            <a href="<?= base_url('User/hapusUser/') . $a['id_user']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $a['email']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah user baru-->
    <div class=" modal fade" id="userBaruModal" tabindex="-1" role="dialog" aria-labelledby="userBaruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userBaruModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama">

                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <select name="role_id" class="form-control form-control-user">
                                <option>Pilih Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Dokter</option>
                                <option value="3">Kasir</option>
                                <option value="4">Pendaftaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah user -->