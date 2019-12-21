        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
        	<!-- sidebar: style can be found in sidebar.less -->
        	<section class="sidebar">
        		<!-- Sidebar user panel -->
        		<div class="user-panel">
        			<div class="pull-left image">
        				<img src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>dist/img/user2-160x160.jpg"
        					class="img-circle" alt="User Image">
        			</div>
        			<div class="pull-left info">
        				<p> <?php echo $this->session->userdata('UsrEmail'); ?></p>
        				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        			</div>
        		</div>
        		<!-- search form -->
        		<form action="#" method="get" class="sidebar-form">
        			<div class="input-group">
        				<input type="text" name="q" class="form-control" placeholder="Search...">
        				<span class="input-group-btn">
        					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
        							class="fa fa-search"></i>
        					</button>
        				</span>
        			</div>
        		</form>
        		<!-- /.search form -->
        		<!-- sidebar menu: : style can be found in sidebar.less -->
        		<ul class="sidebar-menu" data-widget="tree">
        			<li class="header">MAIN NAVIGATION</li>

        			<li
        				<?php echo (!empty($menu_parent) && ($menu_parent == 'Dashboard') ? (!empty($menu_child) && ($menu_child == 'Index') ? ' class="active"' : '') : ''); ?>>
        				<a href="<?php echo base_url('dashboard'); ?>">
        					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
        					</span>
        				</a>
        			</li>

        			<li
        				class="treeview <?php echo (!empty($menu_parent) && ($menu_parent == 'Biodata') ? ' active' : ''); ?>">
        				<a href="#">
        					<i class="fa fa-file-text-o"></i> <span>Master Data</span>
        					<span class="pull-right-container">
        						<i class="fa fa-angle-left pull-right"></i>
        					</span>
        				</a>
        				<ul class="treeview-menu">
        					<li
        						<?php echo (!empty($menu_parent) && ($menu_parent == 'Biodata') ? (!empty($menu_child) && ($menu_child == 'Index' || $menu_child == 'Add' || $menu_child == 'Edit') ? ' class="active"' : '') : ''); ?>>
        						<a href="<?php echo base_url('biodata/index'); ?>">
        							<i class="fa fa-circle-o"></i> Biodata
        						</a>
        					</li>
        				</ul>
        			</li>

        			<li
        				<?php echo (!empty($menu_parent) && ($menu_parent == 'Main') ? (!empty($menu_child) && ($menu_child == 'Change Password') ? ' class="active"' : '') : ''); ?>>
        				<a href="<?php echo base_url('main/change_password'); ?>">
        					<i class="fa fa-user"></i> <span>User Pages</span>
        					</span>
        				</a>
        			</li>
        		</ul>
        	</section>
        	<!-- /.sidebar -->
        </aside>