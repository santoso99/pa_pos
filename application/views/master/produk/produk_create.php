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
								<li class="breadcrumb-item" aria-current="page">Tambah Produk</li>
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
								<h4 class="box-title"><i class="ion-ios ion-plus"></i> Form Tambah Produk Baru</h4>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form method="POST" action="<?= site_url('master/produk/store') ?>" class="form-horizontal form-element " enctype="multipart/form-data">
								<div class="box-body">

									<div class="form-group row">
										<label for="id_produk" class="col-sm-2 control-label">Kode Produk</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="id_produk" value="AUTO" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_barang" class="col-sm-2 control-label">Nama Produk</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Produk" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="id_brand" class="col-sm-2 control-label">Brand</label>

										<div class="col-sm-10">
											<select name="id_brand" id="id_brand" class="form-control" aria-placeholder="Pilih Brand" required>
												<option value="">-</option>
												<?php foreach ($brand as $b) : ?>
													<option value="<?= $b['id_brand'] ?>"><?= $b['nama_brand'] ?></option>
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
													<option value="<?= $c['id_kategori'] ?>"><?= $c['nama_kategori'] ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label for="ram" class="col-sm-2 control-label">RAM</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="ram" id="ram" placeholder="Ram">
										</div>
										<label for="memori" class="col-sm-1 control-label">Memori</label>

										<div class="col-sm-5">
											<input type="text" class="form-control" name="memori" id="memori" placeholder="Memori">
										</div>
									</div>
									<div class="form-group row">
										<label for="layar" class="col-sm-2 control-label">Layar</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="layar" id="layar" placeholder="Layar">
										</div>
										<label for="os" class="col-sm-1 control-label">OS</label>

										<div class="col-sm-5">
											<input type="text" class="form-control" name="os" id="os" placeholder="OS">
										</div>
									</div>
									<div class="form-group row">
										<label for="foto_produk" class="col-sm-2 control-label">Foto Produk</label>

										<div class="col-sm-10">
											<input type="file" class="form-control" name="foto_produk" id="foto_produk" placeholder="Foto Produk">
										</div>
									</div>
									<div class="form-group row">
										<label for="harga_satuan" class="col-sm-2 control-label">Harga Satuan</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" name="harga_satuan" id="harga_satuan" data-type="currency" placeholder="Harga Satuan">
										</div>
									</div>
									<div class="form-group row">
										<label for="deskripsi_barang" class="col-sm-2 control-label">Deskripsi</label>

										<div class="col-sm-10">
											<textarea name="deskripsi_barang" id="deskripsi_barang" class="form-control" cols="30" rows="3"></textarea>
										</div>
									</div>
									<div class="form-group row ">
										<label for="nama_warna" class="col-sm-2 control-label">Warna</label>
										<div class="col-sm-10 input_fields_wrap">
											<input type="text" name="nama_warna[]" class="form-control" required>
										</div>
									</div>
									<a href="#" class="add_field_button"><i class="ion-ios ion-plus"></i> Tambah Warna</a>
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-rounded btn-info pull-right mr-2 mb-2">Simpan</button>
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
