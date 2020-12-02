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
								Tambah Vendor
							</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-hover" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>ID Vendor</th>
											<th>Nama Vendor</th>
											<th>No Hp</th>
											<th>Email</th>
											<th>Alamat</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($all as $row) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $row['id_vendor'] ?></td>
												<td><?= $row['nama_vendor'] ?></td>
												<td><?= $row['no_telp'] ?></td>
												<td><?= $row['email_vendor'] ?></td>
												<td><?= $row['alamat_vendor'] ?></td>
												<td>
													<a href="#addVendor" class="btn btn-info btn-sm mb-4 mt-4" data-toggle="modal" data-target="#editVendor<?= $row['id_vendor'] ?>">
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Vendor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= site_url('master/vendor/store') ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<label>ID Vendor</label>
						<input type="text" value="AUTO" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label>Nama Vendor</label>
						<input type="text" name="nama_vendor" class="form-control" required>
					</div>
					<div class="form-group">
						<label>No Hp</label>
						<input type="number" minlength="6" maxlength="13" class="form-control" name="no_telp" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" maxlength="100" class="form-control" name="email_vendor">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat_vendor" cols="30" rows="3" class="form-control" required></textarea>
					</div>
				</div>
				<div class="modal-footer float-right">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
					<button type="sumbit" class="btn btn-primary">Tambahkan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal edit type of project -->
<?php foreach ($all as $row) : ?>
	<div class="modal fade" id="editVendor<?= $row['id_vendor'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Vendor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= site_url('master/vendor/update') ?>" method="POST" class="needs-validation" novalidate>
					<div class="modal-body">
						<div class="form-group">
							<label>ID Vendor</label>
							<input type="text" name="id_vendor" value="<?= $row['id_vendor'] ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama Vendor</label>
							<input type="text" name="nama_vendor" class="form-control" value="<?= $row['nama_vendor'] ?>" required>
						</div>
						<div class="form-group">
							<label>No Hp</label>
							<input type="number" minlength="6" maxlength="13" class="form-control" name="no_telp" value="<?= $row['no_telp'] ?>" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" maxlength="100" class="form-control" name="email_vendor" value="<?= $row['email_vendor'] ?>">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat_vendor" cols="30" rows="3" class="form-control" required><?= $row['alamat_vendor'] ?></textarea>
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
