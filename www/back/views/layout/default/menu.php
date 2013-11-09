		<!-- Sidebar -->
		<aside id="sidebar-wrapper">
			<ul class="sidebar-icon">
				<li class="sidebar-header"><img height="50px" src="<?php echo BASE_URL .'public/img/'?>um.png" alt="Logo" />
				</li>
			</ul>
			
			<div id="componentes">
				<?php Menu::getItemsMenu();?>
			</div>
			<!-- Tabs Sidebar -->
			<div class="tab-content">
				<?php Menu::getItemsSubmenu();?>
			</div>
			<!-- /Tabs Sidebar -->

		</aside>
		<!-- /Sidebar -->
