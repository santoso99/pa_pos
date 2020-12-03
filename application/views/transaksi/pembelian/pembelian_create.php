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
								<li class="breadcrumb-item"><a href="<?= site_url('transaksi/pembelian') ?>">Pembelian</a></li>
								<li class="breadcrumb-item" aria-current="page">Buat Pembelian Baru</li>
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
											<input type="text" class="form-control" id="id_transaksi" value="AUTO" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label for="tanggal" class="col-sm-2 control-label">Tanggal</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" name="tanggal" id="tanggal" value="CURRENT TIMESTAMP" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label for="id_vendor" class="col-sm-2 control-label">Vendor</label>

										<div class="col-sm-10">
											<select name="id_vendor" id="id_vendor" class="form-control" aria-placeholder="Pilih Vendor" required>
												<option value="">-</option>
												<?php foreach ($vendor as $v) : ?>
													<option value="<?= $v['id_vendor'] ?>"><?= $v['nama_vendor'] ?></option>
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
												<th>Harga Satuan</th>
												<th>Kuantitas</th>
												<th class="no-content"></th>
											</tr>
										</thead>
										<tbody id="tbl_posts_body" class="contents">
											<tr>
												<td class="text-center">
													<span class="sn">1</span>
												</td>

												<td>
													<select name="id_warna[]" class="form-control select2" style="width: 100%;" required>
														<option value="">-pilih produk-</option>
														<?php foreach ($produk as $p) : ?>
															<option value="<?= $p['id_warna'] ?>">
																<?= $p['nama_barang'] . ' ' . $p['memori'] . '-' . $p['nama_warna'] ?>
															</option>
														<?php endforeach ?>
													</select>
												</td>
												<td>
													<input type="text" name="cogs[]" class="form-control" data-type="currency">
												</td>
												<td>
													<input type="text" name="qty[]" class="form-control">
												</td>
												<td class="text-center">

												</td>
											</tr>
										</tbody>
									</table>
									<div class="text-right  mt-2">
										<a href="#" class="add-record" data-added="0"><u>+Tambah Baris</u></a>
									</div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-rounded btn-info pull-right mr-2 mb-2">Simpan</button>
									<a href="<?= site_url('transaksi/pembelian') ?>" class="btn btn-rounded btn-danger pull-right mr-2 mb-2">Batalkan</a>
								</div>
								<!-- /.box-footer -->
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


<!-- invisible tag -->
<div class="invisible">
	<table id="sample_table">
		<tr>
			<td class="text-center">
				<span class="sn"></span>
			</td>

			<td>
				<select name="id_warna[]" class="form-control select21" style="width: 100%;" required>
					<option value="">-pilih produk-</option>
					<?php foreach ($produk as $p) : ?>
						<option value="<?= $p['id_warna'] ?>">
							<?= $p['nama_barang'] . ' ' . $p['memori'] . '-' . $p['nama_warna'] ?>
						</option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
				<input type="text" name="cogs[]" class="form-control" data-type="currency">
			</td>
			<td>
				<input type="text" name="qty[]" class="form-control">
			</td>
			<td class="text-center">
				<a href="#" class="text-danger  btn-icon delete-record" data-id="0">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square">
						<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
						<line x1="9" y1="9" x2="15" y2="15"></line>
						<line x1="15" y1="9" x2="9" y2="15"></line>
					</svg>
				</a>
			</td>
		</tr>
	</table>
</div>
<?php $this->load->view('_partials/footer'); ?>
