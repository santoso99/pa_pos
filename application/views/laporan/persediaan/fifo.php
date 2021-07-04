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
					<button type="button" class="btn btn-info btn-sm mt-2 mb-2" data-toggle="modal" data-target="#Filter">
						<i class="ion-ios-color-filter"></i>
						Filter Periode Buku Besar
					</button>
					<div class="box">
						<div class="box-header with-border text-center">
							<h3>SG CELLULAR</h3>
							<h4>Kartu Stok</h4>
							<h6>"<?= $all['title'] ?>"</h6>
							<h4>Periode <?= bulan($month) . ' ' . $year ?></h4>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-hover" style="width:100%">
									<thead>
										<tr>
											<th rowspan="2">No Transaksi</th>
											<th rowspan="2">Tanggal</th>

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

											$purchase = 0;
											$sales = 0;
											foreach ($all['data'] as $f) : ?>
												<tr>
													<td><?= $f['id_transaksi'] ?></td>
													<td><?= date('d/m/Y', strtotime($f['tanggal'])) ?></td>

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
														<?php foreach ($stock as $st) : ?>
															<?php if ($st['id_transaksi'] == $f['id_transaksi'] && $f['id_warna'] == $st['id_warna']) : ?>
																<td><?= $st['sisa'] ?></td>
																<td>
																	<span class="text-left">Rp</span>
																	<span style="float:right;">
																		<?= nominal1($st['hpp']) ?>
																	</span>
																</td>
																<td>
																	<span class="text-left">Rp</span>
																	<span style="float:right;">
																		<?= nominal1($st['hpp'] * $st['sisa']) ?>
																	</span>
																</td>
															<?php endif ?>
														<?php endforeach ?>
														<!-- /.inventory -->
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
														<?php foreach ($stock as $st) : ?>
															<?php if ($st['id_transaksi'] == $f['id_transaksi'] && $f['id_warna'] == $st['id_warna'] && $f['id_pembelian'] == $st['id_pembelian']) : ?>
																<td><?= $st['sisa'] ?></td>
																<td>
																	<span class="text-left">Rp</span>
																	<span style="float:right;">
																		<?= nominal1($st['hpp']) ?>
																	</span>
																</td>
																<td>
																	<span class="text-left">Rp</span>
																	<span style="float:right;">
																		<?= nominal1($st['hpp'] * $st['sisa']) ?>
																	</span>
																</td>
															<?php endif ?>
														<?php endforeach ?>
														<!-- /.inventory -->
													<?php endif ?>

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
				<form action="<?= site_url('inventory/fifo') ?>" method="GET">
					<div class="form-group">
						<label for="">Bulan:</label>
						<input type="month" name="periode" id="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Produk</label>
						<select name="id" class="form-control select2" style="width: 100%;" required>
							<option value="">-pilih akun-</option>
							<?php foreach ($produk as $p) : ?>
								<option value="<?= $p['id_warna'] ?>">
									<?= $p['nama_barang'] . ' ' . $p['memori'] . '-' . $p['nama_warna'] ?>
								</option>
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