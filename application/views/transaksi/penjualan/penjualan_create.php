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
								<li class="breadcrumb-item"><a href="<?= site_url('transaksi/penjualan') ?>">Penjualan</a></li>
								<li class="breadcrumb-item" aria-current="page">Buat Penjualan Baru</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-4">
					<div class="box">
						<div class="box-header with-border">
							<h4 class="box-title">Tambah Item</h4>
						</div>
						<div class="box-body">
							<form action="<?= site_url('transaksi/penjualan/add_item') ?>" method="POST">
								<div class="form-group">
									<label for="id_warna">Produk</label>
									<input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $id_transaksi ?>">
									<select name="id_warna" id="id_warna" class="form-control select2" style="width: 100%;" required>
										<option value="">-pilih produk-</option>
										<?php foreach ($produk as $p) : ?>
											<option value="<?= $p['id_warna'] ?>">
												<?= $p['nama_barang'] . ' ' . $p['memori'] . '-' . $p['nama_warna'] ?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label for="harga_jual">Harga Satuan</label>
									<input type="text" name="harga_jual" id="harga_jual" class="form-control" required readonly>
								</div>
								<div class="form-group">
									<label for="qty">Qty</label>
									<input type="number" name="qty" id="qty" class="form-control" min="1" required>
								</div>
								<div class="form-group pull-right">
									<button type="submit" class="btn btn-rounded btn-info btn-sm">Tambahkan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-8">
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
							<h4 class="box-title">Detail Penjualan</h4>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form method="POST" action="<?= site_url('transaksi/penjualan/store') ?>" class="form-horizontal form-element ">
							<div class="box-body">

								<div class="form-group row">
									<label for="id_transaksi" class="col-sm-2 control-label">No Transaksi</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" name="id_transaksi" id="id_transaksi" value="<?= $id_transaksi ?>" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="tanggal" class="col-sm-2 control-label">Tanggal</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" name="tanggal" id="tanggal" value="CURRENT TIMESTAMP" disabled>
									</div>
								</div>
								<div class="form-group row">
									<label for="id_pelanggan" class="col-sm-2 control-label">Pelanggan</label>

									<div class="col-sm-10">
										<select name="id_pelanggan" id="id_pelanggan" class="form-control select2" aria-placeholder="Pilih Vendor" style="width: 100%;" required>
											<option value=""> -pilih pelanggan- </option>
											<?php foreach ($pelanggan as $p) : ?>
												<option value="<?= $p['id_pelanggan'] ?>"><?= $p['id_pelanggan'] . ' ' . $p['nama_pelanggan'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="keterangan" class="col-sm-2 control-label">Catatan</label>

									<div class="col-sm-10">
										<textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="3"></textarea>
									</div>
								</div>
								<table class="table table-sm" id="tbl_posts">
									<thead>
										<tr>
											<th>#</th>
											<th>Produk</th>
											<th>Kuantitas</th>
											<th>Subtotal</th>
											<th class="no-content"></th>
										</tr>
									</thead>
									<tbody class="contents">
										<?php
										$no = 1;
										$total = 0;
										foreach ($detail as $d) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $d['nama_barang'] . ' ' . $d['memori'] . ' ' . $d['nama_warna'] ?></td>
												<td><?= $d['qty'] . ' X ' . nominal($d['harga_jual']) ?></td>
												<td><?= nominal($d['harga_jual'] * $d['qty']) ?></td>
												<td>
													<a href="<?= site_url('transaksi/penjualan/deleted_item/' . $d['id_penjualan'] . '/' . $d['id_pembelian']) ?>" class="text-danger" onclick="return confirm('Anda tidak dapat mengembalikan data, apakah anda yakin ?')"><i class=" ion-ios-trash "></i></a>
												</td>
												<?php $total = $total + ($d['harga_jual'] * $d['qty']) ?>
											</tr>
										<?php endforeach ?>
										<tr>
											<td colspan="3" class="text-right">Total</td>
											<td>
												<input type="text" name="total" class="form-control" value="<?= nominal($total) ?>" readonly>
											</td>
											<td class="no-content"></td>
										</tr>
									</tbody>
								</table>

							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" <?= !$detail  ? 'disabled' : '' ?> class="btn btn-rounded btn-success pull-right mr-2 mb-2">Simpan</button>
								<a href="<?= site_url('transaksi/penjualan') ?>" class="btn btn-rounded btn-dark pull-right mr-2 mb-2">Batalkan</a>
							</div>
							<!-- /.box-footer -->
						</form>
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
