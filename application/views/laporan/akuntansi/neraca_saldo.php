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
								<li class="breadcrumb-item" aria-current="page">Neraca Saldo</li>
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
							<h4>Neraca Saldo</h4>
							<p>Periode <?= bulan($month) . ' ' . $year ?></p>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-hover" style="width:100%">
									<thead>
										<tr>
											<th>Kode Akun</th>
											<th>Nama Akun</th>
											<th>Debet</th>
											<th>Kredit</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$debet = 0;
										$kredit = 0;
										foreach ($head as $h) : ?>
											<tr>
												<td><b><?= $h['head_code'] ?></b></td>
												<td><b><?= $h['head_name'] ?></b></td>
												<td></td>
												<td></td>
											</tr>
											<?php foreach ($sub as $s) : ?>
												<?php if ($s['head_code'] == $h['head_code']) : ?>
													<tr>
														<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?= $s['sub_code'] ?></b></td>
														<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?= $s['sub_name'] ?></b></td>
														<td></td>
														<td></td>
													</tr>
													<?php foreach ($all as $row) : ?>
														<?php if ($s['sub_code'] == $row['sub_code']) : ?>
															<tr>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row['account_no'] ?></td>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row['account_name'] ?></td>
																<td>
																	<span class="text-left">Rp</span>
																	<span style="float:right;">
																		<?= nominal1($row['debet']) ?>
																		<?php $debet = $debet + $row['debet']; ?>
																	</span>
																</td>
																<td>
																	<span class="text-left">Rp</span>
																	<span style="float:right;">
																		<?= nominal1($row['kredit']) ?>
																		<?php $kredit = $kredit + $row['kredit']; ?>
																	</span>
																</td>
															</tr>
														<?php endif ?>
													<?php endforeach ?>
												<?php endif ?>
											<?php endforeach ?>
										<?php endforeach ?>
										<tr>
											<td colspan="2" class="text-right"><b>Balance</b></td>
											<td>

												<b>
													<span class="text-left">Rp</span>
													<span style="float:right;">
														<?= nominal1($debet) ?>
													</span>
												</b>

											</td>
											<td>
												<b>
													<span class="text-left">Rp</span>
													<span style="float:right;">
														<?= nominal1($kredit) ?>
													</span>
												</b>
											</td>
										</tr>
										<tr>
											<td colspan="2" class="text-right"><b>Selisih</b></td>
											<td colspan="2">

												<b>
													<span class="text-left">Rp</span>
													<span style="float:right;">
														<?= nominal1($debet - $kredit) ?>
													</span>
												</b>

											</td>

										</tr>
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
				<form action="<?= site_url('akuntansi/neraca_saldo') ?>" method="POST">
					<div class="form-group">
						<label for="">Bulan:</label>
						<input type="month" name="periode" id="" class="form-control" required>
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
