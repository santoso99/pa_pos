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
								<li class="breadcrumb-item"><a href="<?= site_url('transaksi/pembelian') ?>">Pembelian</a></li>
								<li class="breadcrumb-item" aria-current="page">Detail Pembelian</li>
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

					<div class="container mt-4">
						<div class="box">
							<div class="box-header with-border">
								<h4 class="box-title"><?= $title ?></h4>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form method="POST" action="<?= site_url('transaksi/pembelian/store') ?>" class="form-horizontal form-element ">
								<div class="box-body">

									<div class="form-group row">
										<label for="id_transaksi" class="col-sm-2 control-label">No Transaksi</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="id_transaksi" value="<?= $pembelian['id_transaksi'] ?>" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label for="tanggal" class="col-sm-2 control-label">Tanggal</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= date('d-m-Y H:i:s', strtotime($pembelian['tanggal'])) ?>" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label for="id_vendor" class="col-sm-2 control-label">Vendor</label>

										<div class="col-sm-10">
											<input type="text" name="id_vendor" value="<?= $pembelian['nama_vendor'] ?>" class="form-control" disabled>
										</div>
									</div>

									<div class="form-group row">
										<label for="keterangan" class="col-sm-2 control-label">Catatan</label>

										<div class="col-sm-10">
											<textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="3" disabled><?= $pembelian['keterangan'] ?></textarea>
										</div>
									</div>
									<table class="table table-sm" id="tbl_posts">
										<thead>
											<tr>
												<th>#</th>
												<th>Produk</th>
												<th>Harga Satuan</th>
												<th>Kuantitas</th>
												<th>Subtotal</th>
											</tr>
										</thead>
										<tbody id="tbl_posts_body" class="contents">
											<?php
											$no = 1;
											$total = 0;
											foreach ($detail as $d) : ?>
												<tr>
													<td class="text-center">
														<span class="sn"><?= $no++ ?></span>
													</td>

													<td>
														<input type="text" name="id_barang[]" class="form-control" value="<?= $d['nama_barang'] . ' ' . $d['memori'] . ' ' . $d['nama_warna'] ?>" disabled>
													</td>

													<td>
														<input type="text" name="cogs[]" class="form-control" data-type="currency" value="<?= nominal($d['cogs']) ?>" disabled>
													</td>

													<td>
														<input type="text" name="qty[]" class="form-control" value="<?= $d['qty'] ?>" disabled>
													</td>
													<td class="text-center">
														<input type="text" name="subtotal[]" class="form-control" value="<?= nominal($d['cogs'] * $d['qty']) ?>" disabled>
														<?php $total = $total + ($d['cogs'] * $d['qty']) ?>
													</td>
												</tr>
											<?php endforeach ?>
											<tr>
												<td colspan="4" class="text-right">Total</td>
												<td>
													<input type="text" class="form-control" value="<?= nominal($total) ?>" disabled>
												</td>
											</tr>
										</tbody>
									</table>

								</div>
								<!-- /.box-body -->
							</form>
						</div>
						<!-- /.box -->
					</div>
					<!-- /.container -->
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
