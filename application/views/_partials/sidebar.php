<aside class="main-sidebar">
	<!-- sidebar-->
	<section class="sidebar">

		<!-- sidebar menu-->
		<ul class="sidebar-menu" data-widget="tree">
			<li>
				<a href="<?= site_url('dashboard') ?>">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Dashboard</span>
				</a>
			</li>

			<li class="header">Data Master </li>

			<li class="treeview">
				<a href="#">
					<i class="icon-Box3"><span class="path1"></span><span class="path2"></span></i>
					<span>Produk</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?= site_url('master/brand') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Brand Produk
						</a>
					</li>
					<li>
						<a href="<?= site_url('master/kategori') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Kategori Produk
						</a>
					</li>
					<li>
						<a href="<?= site_url('master/produk') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Produk
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="icon-Bullet-list"><span class="path1"></span><span class="path2"></span></i>
					<span>Akuntansi</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?= site_url('master/coa') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Akun</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="icon-Share1"><span class="path1"></span><span class="path2"></span></i>
					<span>Relasi</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?= site_url('master/vendor') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Vendor
						</a>
					</li>
					<li>
						<a href="<?= site_url('master/pelanggan') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pelanggan
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
					<span>Pengguna</span>
				</a>
			</li>

			<li class="header">Transaksi</li>
			<li class="treeview">
				<a href="#">
					<i class="icon-Cart2"><span class="path1"></span><span class="path2"></span></i>
					<span>Pembelian</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?= site_url('transaksi/pembelian') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pembelian
						</a>
					</li>
					<li>
						<a href="auth_register.html">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Retur Pembelian
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="icon-Cart"><span class="path1"></span><span class="path2"></span></i>
					<span>Penjualan</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?= site_url('transaksi/penjualan') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Penjualan</a>
					</li>
					<li>
						<a href="error_500.html">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Retur Penjualan
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="icon-Money"><span class="path1"></span><span class="path2"></span></i>
					<span>Kas Umum</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?= site_url('kas/masuk') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Kas Masuk
						</a>
					</li>
					<li>
						<a href="<?= site_url('kas/keluar') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Kas Keluar
						</a>
					</li>
				</ul>
			</li>

			<li class="header">Laporan </li>
			<li class="treeview">
				<a href="#">
					<i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
					<span>Akuntansi</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?= site_url('akuntansi/jurnal_umum') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Jurnal Umum
						</a>
					</li>
					<li>
						<a href="<?= site_url('akuntansi/buku_besar') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Buku Besar
						</a>
					</li>
					<li>
						<a href="widgets_blog.html">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Laba Rugi
						</a>
					</li>
					<li>
						<a href="<?= site_url('akuntansi/neraca_saldo') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Neraca Saldo
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="icon-Book-open"><span class="path1"></span><span class="path2"></span></i>
					<span>Inventory</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?= site_url('inventory/pembelian') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pembelian
						</a>
					</li>
					<li>
						<a href="<?= site_url('inventory/penjualan') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Penjualan
						</a>
					</li>
					<li>
						<a href="<?= site_url('inventory/fifo') ?>">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Kartu Stok
						</a>
					</li>
				</ul>
			</li>

		</ul>
	</section>
</aside>
