<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title><?= $this->siteTitle(); ?></title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" href="<?= asset('assets/font-awesome/4.5.0/css/font-awesome.min.css'); ?>" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?= asset('assets/css/fonts.googleapis.com.css'); ?>" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?= asset('assets/css/ace.min.css'); ?>" class="ace-main-stylesheet" id="main-ace-style" />
	<link rel="stylesheet" href="<?= asset('assets/css/ace-skins.min.css'); ?>" />
	<link rel="stylesheet" href="<?= asset('assets/css/ace-rtl.min.css'); ?>" />
	<link rel="stylesheet" href="<?= asset('css/customer.css'); ?>" />
	<script src="<?= asset('assets/js/ace-extra.min.js'); ?>"></script>
	<script src="<?= asset('assets/js/jquery-2.1.4.min.js'); ?>"></script>
</head>

<body class="skin-3 no-skin">
	<script src="<?= asset('assets/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?= asset('assets/js/jquery.dataTables.bootstrap.min.js'); ?>"></script>
	<script src="<?= asset('assets/js/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?= asset('assets/js/buttons.flash.min.js'); ?>"></script>
	<script src="<?= asset('assets/js/buttons.html5.min.js'); ?>"></script>
	<script src="<?= asset('assets/js/buttons.print.min.js'); ?>"></script>
	<script src="<?= asset('assets/js/buttons.colVis.min.js'); ?>"></script>
	<script src="<?= asset('assets/js/dataTables.select.min.js'); ?>"></script>
	<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
						Ace Admin
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?= asset('assets/images/avatars/user.jpg'); ?>" alt="Jason's Photo" />
							<span class="user-info">
								<small>Welcome,</small>
								Jason
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="#">
									<i class="ace-icon fa fa-cog"></i>
									Settings
								</a>
							</li>

							<li>
								<a href="profile.html">
									<i class="ace-icon fa fa-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>
	<div class="main-container ace-save-state" id="main-container">
		<div id="sidebar" class="sidebar responsive ace-save-state compact">
			<div class="sidebar-shortcuts">
				<div class="sidebar-shortcuts-large">
					<button class="btn btn-success">
						<i class="ace-icon fa fa-signal"></i>
					</button>

					<button class="btn btn-info">
						<i class="ace-icon fa fa-pencil"></i>
					</button>

					<button class="btn btn-warning">
						<i class="ace-icon fa fa-users"></i>
					</button>

					<button class="btn btn-danger">
						<i class="ace-icon fa fa-cogs"></i>
					</button>
				</div>

				<div class="sidebar-shortcuts-mini">
					<span class="btn btn-success"></span>

					<span class="btn btn-info"></span>

					<span class="btn btn-warning"></span>

					<span class="btn btn-danger"></span>
				</div>
			</div><!-- /.sidebar-shortcuts -->

			<ul class="nav nav-list">
				<li class="<?= count(explode('/',ltrim($_SERVER['REQUEST_URI'],'/'))) ==1 ? 'active' : '' ;?>">
					<a href="<?= url('/'); ?>" text="">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Danh Sách Phòng Thuê </span>
					</a>

					<b class="arrow"></b>
				</li>
				<li class="<?= (count(explode('/',ltrim($_SERVER['REQUEST_URI'],'/'))) >= 2 && (explode('/',ltrim($_SERVER['REQUEST_URI'],'/')))[0] == 'DanhsachnguoithueController' ) ? 'active' : '' ; ?>">
					<a href="<?= url('DanhsachnguoithueController'); ?>">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Danh Sách Người Thuê </span>
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?= (count(explode('/',ltrim($_SERVER['REQUEST_URI'],'/'))) >= 2 && (explode('/',ltrim($_SERVER['REQUEST_URI'],'/')))[0] == 'DanhsachphongthueController' ) ? 'active' : '' ; ?>">
					<a href="<?= url('DanhsachphongthueController'); ?>">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Danh Sách Phòng Cho Thuê </span>
					</a>
					<b class="arrow"></b>
				</li>
			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>

		<div class="main-content">
			<div class="main-content-inner">
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<?= $this->content('body'); ?>
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">Ace</span>
						Application &copy; 2013-2014
					</span>

					&nbsp; &nbsp;
					<span class="action-buttons">
						<a href="#">
							<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
						</a>
					</span>
				</div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->

	<script src="<?= asset('assets/js/bootstrap.min.js'); ?>"></script>

	<!-- page specific plugin scripts -->

	<!-- ace scripts -->
	<!-- <script src="assets/js/ace-elements.min.js"></script> -->
	<script src="<?= asset('assets/js/ace.min.js'); ?>"></script>
</body>

</html>