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
								<li class="breadcrumb-item">Penjualan</li>
								<li class="breadcrumb-item" aria-current="page">Penjualan</li>
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
							<a href="<?= site_url('transaksi/penjualan/draff') ?>" class="btn btn-primary btn-sm mb-4 mt-4">
								<i class="ion-ios ion-plus"></i>
								Buat Penjualan Baru
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
											<th>Pelanggan</th>
											<th>Total</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($all as $row) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $row['id_transaksi'] ?></td>
												<td><?= date('d-m-Y H:i:s', strtotime($row['tanggal'])) ?></td>
												<td><?= $row['nama_pelanggan'] ?></td>
												<td><?= nominal($row['total']) ?></td>
												<td>
													<?php if ($row['status'] == 0) : ?>
														<span class="badge badge-pill badge-warning"><i class=" ion-ios-unlocked"></i> Dalam Proses</span>
													<?php endif ?>
													<?php if ($row['status'] == 1) : ?>
														<span class="badge badge-pill badge-success"><i class=" ion-ios-checkmark"></i> Selesai</span>
													<?php endif ?>
												</td>
												<td>
													<a href="<?= site_url('transaksi/penjualan/create/' . $row['id_transaksi']) ?>" class="btn btn-info btn-sm"><i class="ion-ios-list"></i></a>
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
