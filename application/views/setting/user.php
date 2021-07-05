<?php $this->load->view('_partials/head'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title"><?= $title ?></h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= site_url('dashboard') ?>">
                                        <i class="mdi mdi-home-outline"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">Relasi</li>
                                <li class="breadcrumb-item" aria-current="page">Vendor</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <?php if ($this->session->flashdata()) : ?>
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Gagal !</h4>
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('warning')) : ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                                <?= $this->session->flashdata('warning') ?>
                            </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
                                <?= $this->session->flashdata('success') ?>
                            </div>
                        <?php endif ?>
                    <?php endif ?>

                    <div class="box">
                        <div class="box-header with-border">
                            <a href="#addVendor" class="btn btn-primary btn-sm mb-4 mt-4" data-toggle="modal" data-target="#addVendor">
                                <i class="ion-ios ion-plus"></i>
                                Tambah User
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class='text-center' style="width: 5%;">No</th>
                                            <th style="width: 10%;">ID Pengguna</th>
                                            <th style="width: 20%;">Nama</th>
                                            <th style="width: 20%;">Username</th>
                                            <th style="width: 5%;">Role</th>
                                            <th class='text-center' style="width: 10%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($all as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['user_id'] ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['username'] ?></td>
                                                <td><?= $row['role_name'] ?></td>
                                                <td>
                                                    <a href="#addVendor" class="btn btn-info btn-sm mb-4 mt-4" data-toggle="modal" data-target="#editVendor<?= $row['user_id'] ?>">
                                                        <i class="ion-ios ion-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->


<!-- Modal add type of project -->
<div class="modal fade" id="addVendor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('setting/pengguna/store') ?>" method="POST" id="form-tambah" form-type='' class="needs-validation" novalidate>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id" readonly>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" value="" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">-pilih-</option>
                            <?php foreach ($roles as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['id'] . ' - ' . $row['role_name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer float-right">
                    <button type="button" class="btn btn-secondary" id="btn-close">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal edit type of project -->
<?php foreach ($all as $row) : ?>
    <div class="modal fade" id="editVendor<?= $row['user_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('setting/pengguna/update') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID Pengguna</label>
                            <input type="text" name="user_id" value="<?= $row['user_id'] ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">-pilih-</option>
                                <?php foreach ($roles as $row1) : ?>
                                    <option value="<?= $row1['id'] ?>" <?= $row1['id'] == $row['id'] ? 'selected' : '' ?>><?= $row1['id'] . ' - ' . $row1['role_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <button type="sumbit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<?php $this->load->view('_partials/footer'); ?>