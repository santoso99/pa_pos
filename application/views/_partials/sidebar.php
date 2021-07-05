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
			<?php $menu = get_menu(1); ?>

			<?php foreach ($menu as $row) : ?>
				<li class="treeview">
					<a href="#">
						<i class="<?= $row['icon'] ?>"><span class="path1"></span><span class="path2"></span></i>
						<span><?= $row['head_name'] ?></span>
						<span class="pull-right-container">
							<i class="fa fa-angle-right pull-right"></i>
						</span>
					</a>
					<?php $menu_item = $row['menu_item']; ?>
					<ul class="treeview-menu">
						<?php foreach ($menu_item as $rowData) : ?>
							<li>
								<a href="<?= site_url($rowData['url']) ?>">
									<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i><?= $rowData['menu_name'] ?>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</li>
			<?php endforeach ?>

		</ul>
	</section>
</aside>