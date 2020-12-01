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
								<li class="breadcrumb-item" aria-current="page">Produk</li>
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
							<a href="<?= site_url('master/produk/create') ?>" class="btn btn-primary btn-sm">
								<i class="ion-ios ion-plus"></i>
								Tambah Produk
							</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-striped table-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>Kode Produk</th>
											<th>Nama Produk</th>
											<th>Harga Satuan</th>
											<th class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($all as $row) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td>
													<img src="<?= base_url('uploads/produk/' . $row['foto_barang']) ?>" alt="foto_barang" class="align-self-end h-222 w-100">
												</td>
												<td>
													<?= $row['nama_barang'] . ' ' . $row['memori'] ?>
												</td>
												<td><?= nominal($row['harga_satuan']) ?></td>
												<td class="text-center">
													<a href="<?= site_url('master/produk/edit/' . $row['id_barang']) ?>" class="btn btn-warning btn-sm">
														<i class="ion-ios ion-edit"></i>
													</a>
													<a href="<?= site_url('master/produk/show/' . $row['id_barang']) ?>" class="btn btn-info btn-sm">
														<i class="ion-ios ion-ios-list"></i>
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



<?php $this->load->view('_partials/footer'); ?>
