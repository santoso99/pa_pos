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
								<li class="breadcrumb-item">Produk</li>
								<li class="breadcrumb-item" aria-current="page">Kategori Produk</li>
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
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-center">
								<i class="ion-ios ion-plus"></i>
								Tambah Kategori Produk
							</button>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-striped table-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>Kode Kategori</th>
											<th>Nama Brand</th>
											<th class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($all as $row) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td>
													<?= $row['id_kategori'] ?>
												</td>
												<td>
													<?= $row['nama_kategori'] ?>
												</td>
												<td class="text-center">
													<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?= $row['id_kategori'] ?>">
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


<!-- Modal -->
<div class="modal center-modal fade" id="modal-center" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Kategori Produk</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= site_url('master/kategori/store') ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama_kategori">Nama Kategori</label>
						<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer float-right">
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->

<?php foreach ($all as $row) : ?>
	<!-- Modal -->
	<div class="modal center-modal fade" id="modal_edit<?= $row['id_kategori'] ?>" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Kategori Produk</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= site_url('master/kategori/update') ?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id_kategori" id="id_kategori" class="form-control" value="<?= $row['id_kategori'] ?>" readonly required>

						<div class="form-group">
							<label for="nama_kategori">Nama Kategori</label>
							<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= $row['nama_kategori'] ?>" required>
						</div>
					</div>
					<div class="modal-footer float-right">
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>
<!-- /.modal -->
<?php $this->load->view('_partials/footer'); ?>
