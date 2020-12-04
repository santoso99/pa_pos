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
								<li class="breadcrumb-item" aria-current="page">Buku Besar</li>
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
						Filter Periode Buku Besar
					</button>
					<div class="box">
						<div class="box-header with-border">
							<h4>Buku Besar <?= $akun ?></h4>
							<p>Periode <?= bulan($month) . ' ' . $year ?></p>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table " style="width:100%">
									<thead>
										<tr class="text-center">
											<th rowspan="2">Tanggal</th>
											<th rowspan="2">Keterangan</th>
											<th rowspan="2">Ref</th>
											<th rowspan="2">Debet</th>
											<th rowspan="2">Kredit</th>
											<th colspan="2">Saldo</th>
										</tr>
										<tr class="text-center">
											<th>Debet</th>
											<th>Kredit</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?= '01-' . $month . '-' . $year . ' 00:00:00' ?></td>
											<td><?= 'Saldo Awal ' . $akun ?></td>
											<td colspan="3" class=" table-active "></td>
											<td>
												<span class="text-left">Rp</span>
												<span style="float:right;">
													<?= nominal1(0) ?>
												</span>
											</td>
											<td>
												<span class="text-left">Rp</span>
												<span style="float:right;">
													<?= nominal1(0) ?>
												</span>
											</td>
										</tr>
										<?php
										$debet = 0;
										$kredit = 0;
										foreach ($all as $b) : ?>
											<tr>
												<td><?= date('d-m-Y H:i:s', strtotime($b['tanggal'])) ?></td>
												<td><?= $b['account_name'] ?></td>
												<td><?= $b['id_transaksi'] ?></td>
												<td>
													<span class="text-left">Rp</span>
													<span style="float:right;">
														<?= nominal1($b['debet']) ?>
													</span>
												</td>
												<td>
													<span class="text-left">Rp</span>
													<span style="float:right;">
														<?= nominal1($b['kredit']) ?>
													</span>
												</td>

												<!-- begin saldo -->
												<?php
												if ($b['normal_balance'] == 'd') {
													$debet = $debet + ($b['debet'] - $b['kredit']);
												} else {
													$kredit = $kredit + ($b['kredit'] - $b['debet']);
												}
												?>
												<td>
													<span class="text-left">Rp</span>
													<span style="float:right;">
														<?= nominal1($debet) ?>
													</span>
												</td>
												<td>
													<span class="text-left">Rp</span>
													<span style="float:right;">
														<?= nominal1($kredit) ?>
													</span>
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
<div class="modal modal-right fade" id="Filter">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Filter Periode</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('akuntansi/buku_besar') ?>" method="POST">
					<div class="form-group">
						<label for="">Bulan:</label>
						<input type="month" name="periode" id="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Akun</label>
						<select name="account_name" class="form-control select2" style="width: 100%;" required>
							<option value="">-pilih akun-</option>
							<?php foreach ($list_akun as $ls) : ?>
								<option value="<?= $ls['account_name'] ?>"> <?= $ls['account_no'] . ' ' . $ls['account_name'] ?> </option>
							<?php endforeach ?>
						</select>
					</div>
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
