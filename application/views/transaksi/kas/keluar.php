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
								<li class="breadcrumb-item">Transaksi</li>
								<li class="breadcrumb-item">Kas Umum</li>
								<li class="breadcrumb-item" aria-current="page">Kas Keluar</li>
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
							<a href="#" class="btn btn-primary btn-sm mb-4 mt-4" data-toggle="modal" data-target="#Kas">
								<i class="ion-ios ion-plus"></i>
								Tambah Kas Keluar
							</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-hover" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>No Transaksi</th>
											<th>Tanggal</th>
											<th>Keterangan</th>
											<th>Total</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($all as $row) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $row['id_transaksi'] ?></td>
												<td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
												<td><?= $row['keterangan'] ?></td>
												<td><?= nominal($row['total']) ?></td>
												<td>
													<a href="#" class="btn btn-warning btn-sm mb-4 mt-4" data-toggle="modal" data-target="#KasEdit<?= $row['id_transaksi'] ?>">
														<i class="ion-ios ion-edit"></i>
													</a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
							<!-- /.table-resposive -->
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



<!-- Modal -->
<div class="modal modal-fill fade" data-backdrop="false" id="Kas">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Kas Keluar</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
					Setelah anda menyimpan data, anda tidak dapat mengubah kategori transaksi !
				</div>
				<form action="<?= site_url('kas/keluar/store') ?>" method="POST">
					<div class="form-group">
						<label for="">Tanggal</label>
						<input type="date" name="tanggal" class="form-control" min="<?= date('Y-m') . '-01' ?>" max="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
					</div>
					<div class="form-group">
						<label for="">Kategori Transaksi</label>
						<select name="id_setting" id="id_setting" class="form-control select2" style="width: 100%;" required>
							<option value="">-pilih-</option>
							<?php foreach ($setting as $st) : ?>
								<option value="<?= $st['id_setting'] ?>"><?= $st['setting_name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Jumlah</label>
						<input type="text" name="jumlah" class="form-control" data-type="currency" required>
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea name="keterangan" cols="30" rows="10" class="form-control" required></textarea>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary float-right">Tambahkan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->


<!-- Modal -->
<?php foreach ($all as $row) : ?>
	<div class="modal modal-fill fade" data-backdrop="false" id="KasEdit<?= $row['id_transaksi'] ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Kas Keluar</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= site_url('kas/keluar/update') ?>" method="POST">
						<input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi'] ?>">
						<div class="form-group">
							<label for="">Tanggal</label>
							<input type="date" name="tanggal" min="<?= date('Y-m') . '-01' ?>" class="form-control" max="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d', strtotime($row['tanggal'])) ?>">
						</div>
						<div class="form-group">
							<label for="">Jumlah</label>
							<input type="text" name="jumlah" class="form-control" data-type="currency" value="<?= nominal($row['total']) ?>" required>
						</div>
						<div class="form-group">
							<label for="">Keterangan</label>
							<textarea name="keterangan" cols="30" rows="10" class="form-control" required><?= $row['keterangan'] ?></textarea>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary float-right">Simpan Perubahan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>
<!-- /.modal -->
<?php $this->load->view('_partials/footer'); ?>