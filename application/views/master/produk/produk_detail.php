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
								<li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item"><a href="<?= site_url('master/produk') ?>">Produk</a></li>
								<li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
		<section class="content">

			<div class="row">
				<div class="col-lg-12">
					<div class="box">
						<div class="box-body">
							<div class="row">
								<div class="col-md-4 col-sm-6">
									<div class="box box-body b-1 text-center no-shadow">
										<img src="<?= base_url('uploads/produk/' . $produk['foto_barang']) ?>" id="product-image" class="img-fluid" alt="" />
									</div>

									<div class="clear"></div>
								</div>
								<div class="col-md-8 col-sm-6">
									<h2 class="box-title mt-0"><?= $produk['nama_barang'] ?></h2>

									<h1 class="pro-price mb-0 mt-20"><?= nominal($produk['harga_satuan']) ?></h1>
									<hr>
									<p><?= $produk['deskripsi_barang'] ?></p>
									<div class="row">
										<div class="col-sm-12">
											<h6>Warna:</h6>
											<div class="input-group">
												<ul>
													<?php foreach ($warna as $w) : ?>
														<li class=""><?= $w['nama_warna'] ?></li>
													<?php endforeach ?>
												</ul>
											</div>
										</div>
									</div>
									<hr>
									<div class="gap-items">
										<div class="table-responsive">
											<table class="table">
												<tbody>
													<tr>
														<td width="390">RAM</td>
														<td> <?= $produk['ram'] ?> </td>
													</tr>
													<tr>
														<td>Memori</td>
														<td><?= $produk['memori'] ?> </td>
													</tr>
													<tr>
														<td>Layar</td>
														<td> <?= $produk['layar'] ?> </td>
													</tr>
													<tr>
														<td>OS</td>
														<td> <?= $produk['os'] ?> </td>
													</tr>

												</tbody>
											</table>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>
		<!-- /.content -->
	</div>
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('_partials/footer'); ?>
