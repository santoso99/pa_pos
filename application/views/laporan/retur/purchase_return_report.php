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
								<li class="breadcrumb-item">Laporan</li>
								<li class="breadcrumb-item">Inventory</li>
								<li class="breadcrumb-item" aria-current="page">Laporan Retur Pembelian</li>
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
					<button type="button" class="btn btn-info btn-sm mt-2 mb-2" data-toggle="modal" data-target="#Filter">
						<i class="ion-ios-color-filter"></i>
						Filter Periode
					</button>
					<div class="box">
						<div class="box-header with-border">
							<h4>Laporan Retur Pembelian</h4>
							<p>Periode <?= bulan($month) . ' ' . $year ?></p>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table " style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Tanggal</th>
											<th>No Transaksi</th>
											<th>Keterangan</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php if ($all) : ?>
											<?php
											$no = 1;
											$total = 0;
											foreach ($all as $row) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $row['tanggal'] ?></td>
													<td><?= $row['id_transaksi'] ?></td>
													<td><?= $row['keterangan'] ?></td>
													<td>
														<span class="text-left">Rp</span>
														<span style="float:right;">
															<?= nominal1($row['total']) ?>
														</span>
													</td>
													<?php $total = $total + $row['total'] ?>
												</tr>
											<?php endforeach ?>
											<tr>
												<td class="text-right" colspan="4"><b>Total</b></td>
												<td>
													<span class="text-left">Rp</span>
													<span style="float:right;">
														<?= nominal1($total) ?>
													</span>
												</td>
											</tr>
										<?php endif ?>
										<?php if (!$all) : ?>
											<tr>
												<td class="text-center" colspan="5">Oops... Data tidak ditemukan !</td>
											</tr>
										<?php endif ?>
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
<div class="modal modal-right fade" id="Filter" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Filter Periode</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('inventory/retur_pembelian') ?>" method="POST">
					<input type="month" name="periode" id="" class="form-control">
					<button type="submit" class="btn btn-primary btn-sm mt-2 mb-2 float-right">Tampilkan</button>
				</form>
			</div>
			<div class="modal-footer modal-footer-uniform">

			</div>
		</div>
	</div>
</div>
<!-- /.modal -->
<?php $this->load->view('_partials/footer'); ?>