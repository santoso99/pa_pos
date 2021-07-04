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
								<li class="breadcrumb-item">Akuntansi</li>
								<li class="breadcrumb-item" aria-current="page">Jurnal Umum</li>
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
						Filter Periode Jurnal
					</button>
					<div class="box">
						<div class="box-header with-border text-center">
							<h3>SG CELLULAR</h3>
							<h4>Jurnal Umum</h4>
							<p>Periode <?= bulan($month) . ' ' . $year ?></p>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered " style="width:100%;">
									<thead style="background-color: #0096c7;color:#fff">
										<tr class="text-center">
											<th style="width: 10%;">Tanggal</th>
											<th>Keterangan</th>
											<th style="width: 10%;">Ref</th>
											<th>Debet</th>
											<th>Kredit</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($row_jurnal as $r1) : ?>
											<tr>
												<td rowspan="<?= $r1['row'] + 1 ?>"><?= date('d-m-Y', strtotime($r1['tanggal'])) ?></td>
											</tr>
											<?php foreach ($jurnal as $r2) : ?>
												<?php if ($r1['id_transaksi'] == $r2['id_transaksi']) : ?>
													<tr>
														<?php if ($r2['posisi'] == 'd') : ?>
															<td><?= $r2['account_no'] . ' ' . $r2['account_name'] ?></td>
														<?php endif ?>
														<?php if ($r2['posisi'] == 'k') : ?>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $r2['account_no'] . ' ' . $r2['account_name'] ?></td>
														<?php endif ?>
														<td><?= $r2['id_transaksi'] ?></td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?php
																if ($r2['posisi'] == 'd') {
																	echo nominal1($r2['nominal']);
																} else {
																	echo "-";
																}
																?>
															</span>
														</td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?php
																if ($r2['posisi'] == 'k') {
																	echo nominal1($r2['nominal']);
																} else {
																	echo "-";
																} ?>
															</span>
														</td>
													</tr>
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
				<form action="<?= site_url('akuntansi/jurnal_umum') ?>" method="POST">
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