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
								<li class="breadcrumb-item" aria-current="page">Brand Produk</li>
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
								Tambah Brand Produk
							</button>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-striped table-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>Logo</th>
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
													<img src="<?= base_url('uploads/brand/' . $row['logo_brand']) ?>" alt="logo_brand" class="align-self-end h-222 w-100">
												</td>
												<td>
													<?= $row['nama_brand'] ?>
												</td>
												<td class="text-center">
													<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?= $row['id_brand'] ?>">
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
				<h5 class="modal-title">Tambah Brand Produk</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= site_url('master/brand/store') ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama_brand">Nama Brand</label>
						<input type="text" name="nama_brand" id="nama_brand" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="logo_brand">Logo Brand</label>
						<input type="file" name="logo_brand" id="logo_brand" class="form-control" required>
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
	<div class="modal center-modal fade" id="modal_edit<?= $row['id_brand'] ?>" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Brand Produk</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= site_url('master/brand/update') ?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<input type="hidden" name="id_brand" id="id_brand" class="form-control" value="<?= $row['id_brand'] ?>" readonly required>

						<div class="form-group">
							<label for="nama_brand">Nama Brand</label>
							<input type="text" name="nama_brand" id="nama_brand" class="form-control" value="<?= $row['nama_brand'] ?>" required>
						</div>
						<div class="form-group">
							<label for="logo_brand">Logo Brand</label>
							<input type="hidden" name="old_logo" value="<?= $row['logo_brand'] ?>">
							<input type="file" name="logo_brand" id="logo_brand" class="form-control">
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
