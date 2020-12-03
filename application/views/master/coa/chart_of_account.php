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
								<li class="breadcrumb-item">Akuntansi</li>
								<li class="breadcrumb-item" aria-current="page">Akun</li>
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
							<a href="#addCoa" class="btn btn-primary btn-sm mb-4 mt-4" data-toggle="modal" data-target="#addCoa">
								<i class="ion-ios ion-plus"></i>
								Tambah Akun
							</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-hover" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Akun</th>
											<th>Saldo Normal</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($head as $h) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><b><?= $h['head_code'] . ' ' . $h['head_name'] ?></b></td>
												<td></td>
												<td></td>
											</tr>
											<?php foreach ($sub as $s) : ?>
												<?php if ($s['head_code'] == $h['head_code']) : ?>
													<tr>
														<td><?= $no++ ?></td>
														<td><b>&nbsp;&nbsp;&nbsp;<?= $s['sub_code'] . ' ' . $s['sub_name'] ?></b></td>
														<td></td>
														<td></td>
													</tr>

													<?php foreach ($all as $row) : ?>
														<?php if ($s['sub_code'] == $row['sub_code']) : ?>
															<tr>
																<td><?= $no++ ?></td>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $row['account_no'] . ' ' . $row['account_name'] ?></td>
																<td><?php
																	if ($row['normal_balance'] == 'd') {
																		echo "Debet";
																	} else {
																		echo "Kredit";
																	}
																	?></td>
																<td>
																	<a href="#editCoa<?= $row['account_no'] ?>" data-toggle="modal" data-target="#editCoa<?= $row['account_no'] ?>">
																		<i class="ion-ios ion-edit"></i>
																	</a>
																</td>
															</tr>
														<?php endif ?>
													<?php endforeach ?>
												<?php endif ?>
											<?php endforeach ?>
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


<!-- Modal edit project -->
<div class="modal fade" id="addCoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= site_url('Master/coa/store') ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<label>Kode Akun</label>
						<input type="text" value="AUTO" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label>Header Akun</label>
						<select name="sub_code" class="form-control">
							<option value="">-pilih header-</option>
							<?php foreach ($sub as $h) : ?>
								<option value="<?= $h['sub_code'] ?>"><?= $h['sub_code'] . ' ' . $h['sub_name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Akun</label>
						<input type="text" class="form-control" name="account_name" required>
					</div>
					<div class="form-group">
						<label>Saldo Normal</label><br>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="normal_balance" id="inlineRadio1" value="d" checked>
							<label class="form-check-label" for="inlineRadio1">Debet</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="normal_balance" id="inlineRadio2" value="k">
							<label class="form-check-label" for="inlineRadio2">Kredit</label>
						</div>
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


<!-- Modal edit coa -->
<?php foreach ($all as $row) : ?>
	<div class="modal fade" id="editCoa<?= $row['account_no'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= site_url('Master/coa/update') ?>" method="POST" class="needs-validation" novalidate>
					<div class="modal-body">
						<div class="form-group">
							<label>Kode Akun</label>
							<input type="text" value="<?= $row['account_no'] ?>" class="form-control" name="account_no" readonly>
						</div>
						<div class="form-group">
							<label>Nama Akun</label>
							<input type="text" class="form-control" value="<?= $row['account_name'] ?>" name="account_name" required>
						</div>
						<div class="form-group">
							<label>Saldo Normal</label><br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="normal_balance" id="<?= $row['account_no'] . '1' ?>" value="d" <?= $row['normal_balance'] == 'd' ? 'checked' : '' ?>>
								<label class="form-check-label" for="<?= $row['account_no'] . '1' ?>">Debet</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="normal_balance" id="<?= $row['account_no'] ?>" value="k" <?= $row['normal_balance'] == 'k' ? 'checked' : '' ?>>
								<label class="form-check-label" for="<?= $row['account_no'] ?>">Kredit</label>
							</div>
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
