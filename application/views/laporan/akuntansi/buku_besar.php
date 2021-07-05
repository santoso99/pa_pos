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
						<div class="box-header with-border text-center">
							<h3>SG CELLULAR</h3>
							<h4>Buku Besar</h4>
							<p>Periode <?= bulan($month) . ' ' . $year ?></p>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<?php
								foreach ($all['values'] as $rowData) : ?>

									<p class='p-3 text-bold mt-4' style='background-color:#dee2e6'><?= $rowData['account_no'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $rowData['account_name']  ?></p>
									<table class="table table-bordered " style="width:100%">
										<thead style="background-color: #0096c7;color:#fff">
											<tr class="text-center">
												<th style="width: 10%;" rowspan="2">Tanggal</th>
												<th style="width: 20%;" rowspan="2">Keterangan</th>
												<th style="width: 15%;" rowspan="2">Ref</th>
												<th style="width: 10%;" rowspan="2">Debet</th>
												<th style="width: 10%;" rowspan="2">Kredit</th>
												<th colspan="2">Saldo</th>
											</tr>
											<tr class="text-center">
												<th style="width: 10%;">Debet</th>
												<th style="width: 10%;">Kredit</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Saldo Awal</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td class='text-right'><?= nominal1($rowData['saldo_awal_debet']) ?></td>
												<td class='text-right'><?= nominal1($rowData['saldo_awal_kredit']) ?></td>
											</tr>
											<?php
											$detail = $rowData['gl'];
											$debet = 0;
											$kredit = 0;
											foreach ($detail as $rowDetail) : ?>
												<?php
												if ($rowDetail['normal_balance'] == 'd') {
													$debet = $debet + ($rowDetail['debet'] - $rowDetail['kredit']);
												} else if ($rowDetail['normal_balance'] == 'k') {
													$kredit = $kredit + ($rowDetail['kredit'] - $rowDetail['debet']);
												}

												?>
												<tr>
													<td><?= $rowDetail['tanggal'] ?></td>
													<td><?= $rowDetail['keterangan'] ?></td>
													<td><?= $rowDetail['id_transaksi'] ?></td>
													<td class='text-right'><?= nominal1($rowDetail['debet']) ?></td>
													<td class='text-right'><?= nominal1($rowDetail['kredit']) ?></td>
													<td class='text-right'><?= nominal1($debet + $rowData['saldo_awal_debet']) ?></td>
													<td class='text-right'><?= nominal1($rowData['saldo_awal_kredit'] + $kredit) ?></td>
												</tr>
											<?php endforeach ?>

										</tbody>
									</table>
								<?php endforeach ?>

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
				<form action="<?= site_url('akuntansi/buku_besar') ?>" method="GET">
					<div class="form-group">
						<label for="">Bulan:</label>
						<input type="month" name="periode" id="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Akun</label>
						<select name="account_no" class="form-control select2" style="width: 100%;">
							<option value="all">-pilih akun-</option>
							<?php foreach ($list_akun as $ls) : ?>
								<option value="<?= $ls['account_no'] ?>"> <?= $ls['account_no'] . ' ' . $ls['account_name'] ?> </option>
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