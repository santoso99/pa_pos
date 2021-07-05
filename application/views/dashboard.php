<?php $this->load->view('_partials/head'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-lg-8 col-12">
					<div class="box pull-up">
						<div class="box-body bg-img" style="background-image: url(<?= base_url() ?>assets/images/bg-5.png);" data-overlay-light="9">
							<div class="d-lg-flex align-items-center justify-content-between">
								<div class="d-md-flex align-items-center mb-30 mb-lg-0">
									<img src="<?= base_url() ?>assets/images/svg-icon/color-svg/custom-14.svg" class="img-fluid max-w-150" alt="" />
									<div class="ml-30">
										<?php $profile = getProfile($this->session->userdata('user_id')) ?>

										<h4 class="mb-10">Selamat Datang, <?= $profile['name'] ?> !</h4>
										<p class="mb-0 text-fade">Hari ini adalah hari yang tepat untuk melakukan kegiatan yang produktif. </p>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-12">
					<a href="<?= site_url('transaksi/penjualan') ?>" class="box bg-danger bg-hover-danger pull-up">
						<div class="box-body">
							<div class="d-flex align-items-center">
								<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center">
									<span class="text-white icon-Cart2 font-size-40"><span class="path1"></span><span class="path2"></span></span>
								</div>
								<div class="ml-10">
									<h4 class="text-white mb-0"><?= nominal1($sales['qty']) ?></h4>
									<h5 class="text-white-50 mb-0">Produk Terjual</h5>
								</div>
							</div>
						</div>
					</a>
				</div>

			</div>

			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-xl-12 col-12">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-12">
									<div class="box bg-transparent no-shadow mb-30">
										<div class="box-header no-border pb-0">
											<h4 class="box-title">Pembelian Terbaru</h4>
											<ul class="box-controls pull-right d-md-flex d-none">
												<li>
													<a href="<?= site_url('transaksi/pembelian') ?>" class="btn btn-primary-light px-10">Lihat Semua</a>
												</li>
											</ul>
										</div>
									</div>
									<?php foreach ($latest_purchasing as $lp) : ?>
										<div class="box mb-15 pull-up">
											<div class="box-body">
												<div class="d-flex align-items-center justify-content-between">
													<div class="d-flex align-items-center">
														<div class="mr-15 bg-warning h-50 w-50 l-h-60 rounded text-center">
															<span class="icon-Book-open font-size-24"><span class="path1"></span><span class="path2"></span></span>
														</div>
														<div class="d-flex flex-column font-weight-500">
															<a href="<?= site_url('transaksi/pembelian/detail/' . $lp['id_transaksi']) ?>" class="text-dark hover-primary mb-1 font-size-16"><?= $lp['id_transaksi'] ?></a>
															<span class="text-fade"><?= $lp['nama_vendor'] ?>, <?= mediumdate_indo(date('Y-m-d', strtotime($lp['tanggal']))) ?></span>
														</div>
													</div>
													<a href="<?= site_url('transaksi/pembelian/detail/' . $lp['id_transaksi']) ?>">
														<span class="icon-Arrow-right font-size-24"><span class="path1"></span><span class="path2"></span></span>
													</a>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								</div>
								<!-- ./pembelian terbaru -->

								<div class="col-xl-6 col-lg-6 col-12">
									<div class="box bg-transparent no-shadow mb-30">
										<div class="box-header no-border pb-0">
											<h4 class="box-title">Penjualan Terbaru</h4>
											<ul class="box-controls pull-right d-md-flex d-none">
												<li>
													<a href="<?= site_url('transaksi/penjualan') ?>" class="btn btn-primary-light px-10">
														Lihat Semua
													</a>
												</li>
											</ul>
										</div>
									</div>
									<?php foreach ($latest_sales as $ls) : ?>
										<div class="box mb-15 pull-up">
											<div class="box-body">
												<div class="d-flex align-items-center justify-content-between">
													<div class="d-flex align-items-center">
														<div class="mr-15 bg-danger h-50 w-50 l-h-60 rounded text-center">
															<span class="icon-Book-open font-size-24"><span class="path1"></span><span class="path2"></span></span>
														</div>
														<div class="d-flex flex-column font-weight-500">
															<a href="<?= site_url('transaksi/penjualan/create/' . $ls['id_transaksi']) ?>" class="text-dark hover-primary mb-1 font-size-16"><?= $ls['id_transaksi'] ?></a>
															<span class="text-fade"><?= $ls['nama_pelanggan'] ?>, <?= mediumdate_indo(date('Y-m-d', strtotime($ls['tanggal']))) ?></span>
														</div>
													</div>
													<a href="<?= site_url('transaksi/penjualan/create/' . $ls['id_transaksi']) ?>">
														<span class="icon-Arrow-right font-size-24"><span class="path1"></span><span class="path2"></span></span>
													</a>
												</div>
											</div>
										</div>
									<?php endforeach ?>

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