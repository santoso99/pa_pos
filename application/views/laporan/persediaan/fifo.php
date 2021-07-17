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
								<table class="table table-sm  ">
									<thead>
										<tr>
											<th rowspan="2" style="text-align:center" style="vertical-align: middle;">Tanggal</th>
											<th colspan="3" style="text-align:center">Masuk</th>
											<th colspan="3" style="text-align:center">Keluar</th>
											<th colspan="3" style="text-align:center">Saldo</th>
										</tr>
										<tr>
											<th style="text-align:center">Unit</th>
											<th style="text-align:center">Harga/unit</th>
											<th style="text-align:center">Jumlah</th>
											<th style="text-align:center">Unit</th>
											<th style="text-align:center">Harga/unit</th>
											<th style="text-align:center">Jumlah</th>
											<th style="text-align:center">Unit</th>
											<th style="text-align:center">Harga/unit</th>
											<th style="text-align:center">Jumlah</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$total_jumlah_input_barang = 0;
										$total_harga_input_barang = 0;
										$total_jumlah_pemakaian = 0;
										$total_harga_pemakaian = 0;
										$unit = 0;
										$jumlah = 0;
										$jumlah_penj = 0;
										$unit_penj = 0;
										$saldo = 0;
										$saldo_harga = 0;
										$saldo1 = 0;

										$saldo_k = array(0);
										$saldo_h = array(0);
										$saldo_t = array(0);
										$cek = 0;
										$no = 1;
										foreach ($stok_data as $data) {
											$nama_transaksi = $data->stock_type;
											if ($nama_transaksi == "1") {
												$cek++;
												array_push($saldo_k, $data->qty);
												array_push($saldo_h, $data->cogs);
												array_push($saldo_t, $data->qty * $data->cogs);
												$z = 0;
												$saldo1 = 0;
												$saldo = 0;
												for ($i = 0; $i <= $cek; $i++) {

													if ($saldo_k[$i] != 0) {
										?>
														<tr>
															<td align="center"><?php if ($z == 0) echo $data->tanggal;  ?></td>
															<td align="center"><?php if ($z == 0) echo $data->qty; ?></td>
															<td align="right"> <?php if ($z == 0) echo "Rp " . number_format($data->cogs, 0, ',', '.'); ?></td>
															<td align="right"> <?php if ($z == 0) echo "Rp " . number_format($data->qty * $data->cogs, 0, ',', '.'); ?></td>
															<td align="center"></td>
															<td align="center"></td>
															<td align="center"></td>
															<td align="center"><?php echo $saldo_k[$i]; ?></td>
															<td align="right"><?php echo "Rp " . number_format($saldo_h[$i], 0, ',', '.'); ?></td>
															<td align="right"><?php echo "Rp " . number_format($saldo_t[$i], 0, ',', '.'); ?></td>
														</tr>

														<?php
														$saldo1 = $saldo1 + $saldo_k[$i];
														$saldo = $saldo + $saldo_t[$i];
														$z++;
													}
												}
												$unit = $unit + $data->qty;
												$jumlah = $jumlah + ($data->qty * $data->cogs);

												$total_jumlah_input_barang = $total_jumlah_input_barang + $data->qty;
												$total_harga_input_barang = $total_harga_input_barang + ($data->qty * $data->cogs);
											} else {
												$status = false;
												$z = 0;
												$idx = 0;
												$my_saldo_k = $data->qty;
												$jumlah_terpakai = 0;
												$harga_terpakai = 0;
												$saldo = 0;
												$saldo1 = 0;

												while ($status == false) {
													if ($saldo_k[$idx] > 0) {
														if ($my_saldo_k > $saldo_k[$idx]) {
															$jumlah_terpakai = $saldo_k[$idx];
															$my_saldo_k = $my_saldo_k - $jumlah_terpakai;
															$saldo_k[$idx] = 0;
															$harga_terpakai = $saldo_h[$idx];
														} else if ($my_saldo_k == $saldo_k[$idx]) {
															$saldo_k[$idx] = $saldo_k[$idx] - $my_saldo_k;
															$jumlah_terpakai = $my_saldo_k;
															$my_saldo_k = 0;
															$harga_terpakai = $saldo_h[$idx];
														} else {
															$saldo_k[$idx] = $saldo_k[$idx] - $my_saldo_k;
															$jumlah_terpakai = $my_saldo_k;
															$my_saldo_k = 0;
															$harga_terpakai = $saldo_h[$idx];
														}
														if ($my_saldo_k == 0) {
															$status = true;
														}
														$saldo_t[$idx] = $saldo_k[$idx] * $saldo_h[$idx];
														$total_harga_terpakai = $jumlah_terpakai * $harga_terpakai;
														$total_jumlah_pemakaian = $total_jumlah_pemakaian + $jumlah_terpakai;
														$total_harga_pemakaian = $total_harga_pemakaian + $total_harga_terpakai;
														$saldo = $saldo + $saldo_t[$idx];
														$saldo1 = $saldo1 + $saldo_k[$idx];

														if ($nama_transaksi == "0") {
															$unit_penj = $unit_penj + $jumlah_terpakai;
															$jumlah_penj = $jumlah_penj + $total_harga_terpakai;
														?>
															<tr>
																<td align="center"><?php if ($z == 0) echo $data->tanggal;  ?></td>
																<td align="center"></td>
																<td align="right"></td>
																<td align="right"></td>
																<td align="center"><?php echo number_format($jumlah_terpakai); ?></td>
																<td align="center"><?php echo "Rp " . number_format($harga_terpakai, 0, ',', '.'); ?></td>
																<td align="center"><?php echo "Rp " . number_format($total_harga_terpakai, 0, ',', '.'); ?></td>
																<td align="center"><?php if ($saldo_k[$idx] != 0) echo $saldo_k[$idx]; ?></td>
																<td align="right"><?php if ($saldo_k[$idx] != 0) echo "Rp " . number_format($saldo_h[$idx], 0, ',', '.'); ?></td>
																<td align="right"><?php if ($saldo_k[$idx] != 0) echo "Rp " . number_format($saldo_t[$idx], 0, ',', '.'); ?></td>
															</tr>
														<?php

														}

														$z++;
													}
													$idx++;
												}
												for ($i = $idx; $i <= $cek; $i++) {
													if ($saldo_k[$i] != 0) {
														?>
														<tr>
															<td align="center"></td>
															<td align="center"></td>
															<td align="right"></td>
															<td align="right"></td>
															<td align="center"></td>
															<td align="center"></td>
															<td align="center"></td>
															<td align="center"><?php if ($saldo_k[$i] != 0) echo $saldo_k[$i]; ?></td>
															<td align="right"> <?php if ($saldo_k[$i] != 0) echo "Rp " . number_format($saldo_h[$i], 0, ',', '.'); ?></td>
															<td align="right"><?php if ($saldo_k[$i] != 0) echo "Rp " . number_format($saldo_t[$i], 0, ',', '.'); ?></td>
														</tr>
										<?php

													}
													$saldo = $saldo + $saldo_t[$idx];
													$saldo1 = $saldo1 + $saldo_k[$idx];
												}
											}

											$no++;
										}
										?>
									</tbody>
									<tr>
										<td align="center">Saldo Masuk</td>
										<td align="center"><?php echo $unit; ?></td>
										<td></td>
										<td align="right">Rp <?php echo number_format($jumlah, 0, ',', '.'); ?></td>

										<td align="center"></td>
										<td></td>
										<td align="right"></td>

										<td align="center"></td>
										<td></td>
										<td align="right"></td>
									</tr>

									<tr>
										<td align="center">Saldo Keluar</td>
										<td align="center"></td>
										<td></td>
										<td></td>

										<td align="center"><?php echo $unit_penj; ?></td>
										<td></td>
										<td align="right">Rp <?php echo number_format($jumlah_penj, 0, ',', '.'); ?></td>

										<td></td>
										<td></td>
										<td align="right"></td>
									</tr>
									<tr>
										<td align="center">Saldo Total</td>
										<td align="center"></td>
										<td></td>
										<td align="right"></td>

										<td align="center"></td>
										<td></td>
										<td align="right"></td>

										<td align="center"><?php echo $saldo1; ?></td>
										<td></td>
										<td align="right">Rp <?php echo number_format($saldo, 0, ',', '.'); ?></td>
									</tr>
									<?php
									?>

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