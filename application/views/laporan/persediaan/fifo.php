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
								<li class="breadcrumb-item" aria-current="page">Kartu Stok</li>
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
							<h4>Kartu Stok</h4>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-hover" style="width:100%">
									<thead>
										<tr>
											<th rowspan="2">No Transaksi</th>
											<th rowspan="2">Tanggal</th>
											<th rowspan="2">Keterangan</th>
											<th colspan="3" class="text-center">Pembelian</th>
											<th colspan="3" class="text-center">Harga Pokok Penjualan</th>
											<th colspan="3" class="text-center">Persediaan</th>
										</tr>
										<tr>
											<th>Unit</th>
											<th>Harga</th>
											<th>Total</th>
											<!-- cogs -->
											<th>Unit</th>
											<th>Harga</th>
											<th>Total</th>
											<!-- inventory -->
											<th>Unit</th>
											<th>Harga</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php if ($all) : ?>
											<?php
											$id_sales = 0;
											$id_stock = 0;
											$purchase = 0;
											$sales = 0;
											$stock = 0;
											foreach ($all as $f) : ?>
												<tr>
													<td><?= $f['id_transaksi'] ?></td>
													<td><?= date('d-m-Y H:i:s', strtotime($f['tanggal'])) ?></td>
													<td><?= $f['nama_barang'] ?></td>
													<?php if ($f['tipe'] == 'purchasing') : ?>

														<td><?= $f['qty'] ?></td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?= nominal1($f['cogs']) ?>
															</span>
														</td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?= nominal1($f['total']) ?>
															</span>
														</td>
														<!-- /.purchasing -->
														<td></td>
														<td></td>
														<td></td>
														<!-- /.sales order -->
													<?php endif ?>
													<!-- /.purhcasing area -->
													<?php if ($f['tipe'] == 'order') : ?>

														<td></td>
														<td></td>
														<td></td>
														<!-- /.purchasing -->
														<td><?= $f['qty'] ?></td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?= nominal1($f['cogs']) ?>
															</span>
														</td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?= nominal1($f['total']) ?>
															</span>
														</td>
														<!-- /.sales order -->
													<?php endif ?>
													<?php
													foreach ($ref[$f['id_pembelian']] as $rp) : ?>

														<td><?= $stock =  $f['qty'] ?></td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?= nominal1($f['cogs']) ?>
															</span>
														</td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?= nominal1($f['cogs'] * $stock) ?>
															</span>
														</td>
													<?php endforeach ?>
												</tr>
											<?php endforeach ?>
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

<?php $this->load->view('_partials/footer'); ?>
