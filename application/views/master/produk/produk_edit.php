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
								<li class="breadcrumb-item"><a href="<?= site_url('master/produk') ?>">Produk</a></li>
								<li class="breadcrumb-item" aria-current="page">Edit Produk</li>
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
								<h4 class="box-title"><i class="ion-ios ion-edit"></i> Form Edit Produk Baru</h4>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form method="POST" action="<?= site_url('master/produk/update') ?>" class="form-horizontal form-element " enctype="multipart/form-data">
								<div class="box-body">

									<div class="form-group row">
										<label for="id_produk" class="col-sm-2 control-label">Kode Produk</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="id_barang" name="id_barang" value="<?= $produk['id_barang'] ?>" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_barang" class="col-sm-2 control-label">Nama Produk</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $produk['nama_barang'] ?>" placeholder="Nama Produk" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="id_brand" class="col-sm-2 control-label">Brand</label>

										<div class="col-sm-10">
											<select name="id_brand" id="id_brand" class="form-control" aria-placeholder="Pilih Brand" required>
												<option value="">-</option>
												<?php foreach ($brand as $b) : ?>
													<option value="<?= $b['id_brand'] ?>" <?= $produk['id_brand'] == $b['id_brand'] ? 'selected' : '' ?>><?= $b['nama_brand'] ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="id_kategori" class="col-sm-2 control-label">Kategori</label>

										<div class="col-sm-10">
											<select name="id_kategori" id="id_kategori" class="form-control" required>
												<option value="">-</option>
												<?php foreach ($category as $c) : ?>
													<option value="<?= $c['id_kategori'] ?>" <?= $produk['id_kategori'] == $c['id_kategori'] ? 'selected' : '' ?>><?= $c['nama_kategori'] ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label for="ram" class="col-sm-2 control-label">RAM</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="ram" id="ram" placeholder="Ram" value="<?= $produk['ram'] ?>">
										</div>
										<label for="memori" class="col-sm-1 control-label">Memori</label>

										<div class="col-sm-5">
											<input type="text" class="form-control" name="memori" id="memori" placeholder="Memori" value="<?= $produk['memori'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="layar" class="col-sm-2 control-label">Layar</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="layar" id="layar" placeholder="Layar" value="<?= $produk['layar'] ?>">
										</div>
										<label for="os" class="col-sm-1 control-label">OS</label>

										<div class="col-sm-5">
											<input type="text" class="form-control" name="os" id="os" placeholder="OS" value="<?= $produk['os'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="foto_produk" class="col-sm-2 control-label">Foto Produk</label>

										<div class="col-sm-10">
											<input type="file" class="form-control" name="foto_produk" id="foto_produk" placeholder="Foto Produk">
											<input type="hidden" class="form-control" name="foto_old" id="foto_old" value="<?= $produk['foto_barang'] ?>" placeholder="Foto Produk">
										</div>
									</div>
									<div class="form-group row">
										<label for="harga_satuan" class="col-sm-2 control-label">Harga Satuan</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" name="harga_satuan" id="harga_satuan" data-type="currency" placeholder="Harga Satuan" value="<?= nominal($produk['harga_satuan']) ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="deskripsi_barang" class="col-sm-2 control-label">Deskripsi</label>

										<div class="col-sm-10">
											<textarea name="deskripsi_barang" id="deskripsi_barang" class="form-control" cols="30" rows="3"><?= $produk['deskripsi_barang'] ?></textarea>
										</div>
									</div>
									<div class="form-group row ">
										<label for="nama_warna" class="col-sm-2 control-label">Warna</label>
										<div class="col-sm-10 input_fields_wrap">
											<?php foreach ($warna as $w) : ?>
												<input type="hidden" name="id_warna" value="<?= $w['id_barang'] ?>">
												<input type="text" name="nama_warna[]" class="form-control" value="<?= $w['nama_warna'] ?>" required>
											<?php endforeach ?>
										</div>
									</div>

								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-rounded btn-info pull-right mr-2 mb-2">Simpan Perubahan</button>
									<a href="<?= site_url('master/produk') ?>" class="btn btn-rounded btn-danger pull-right mr-2 mb-2">Batalkan</a>
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



<?php $this->load->view('_partials/footer'); ?>
