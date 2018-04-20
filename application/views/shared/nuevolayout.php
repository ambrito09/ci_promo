<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png">
    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
	<script>
		var subStr = '<?=(isset($id)?$id:"")?>';
	</script>
	<script>
		var base_url = '<?=site_url()?>';
	</script>
    <link href="<?=base_url()?>dashboard/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base_url()?>dashboard/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>dashboard/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?=base_url()?>dashboard/css/custom.css" rel="stylesheet">

    <script src="<?=base_url()?>dashboard/js/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="<?=base_url()?>assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="nav-md">

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?=site_url("admin/seguridad/dashboard")?>" class="site_title"><i class="fa fa-bank"></i> <span>Promo!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?=base_url()?>img/avatar/<?=$this->session->userdata("idU")?>.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?=$this->session->userdata('userS')?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-dashboard active"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=site_url()?>/admin/seguridad/dashboard/index">Overview</a>
                                        </li>
                                    </ul>
                                </li>
								<li><a><i class="fa fa-key"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=site_url()?>/admin/seguridad/usuario/">Usuarios</a>
                                        </li>
										<li><a href="<?=site_url()?>/admin/seguridad/roles/">Roles</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Nomencladores <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a  href="<?=site_url()?>/admin/nomencladores/provincia/">Provincias</a>
                                        </li>
										<li><a href="<?=site_url()?>/admin/nomencladores/servicio/">Servicio</a>
                                        </li>
										<li><a href="<?=site_url()?>/admin/nomencladores/categoria/">Categorias</a>
                                        </li>
										<li><a href="<?=site_url()?>/admin/nomencladores/tipocuenta/">Tipo de cuenta</a>
                                        </li>
										<li><a  href="<?=site_url()?>/admin/nomencladores/ofertaspuntos/">Ofertas de Puntos</a>
                                        </li>
                                    </ul>
                                </li>
								<!--<li><a><i class="fa fa-database"></i> Base de datos <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a  href="<?=site_url()?>/admin/basedatos/migracion/">Migraci&oacute;n</a>
                                        </li>
                                    </ul>
                                </li>-->
								<li><a><i class="fa fa-star"></i> Publicidad <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a  href="<?=site_url()?>/admin/publicidad/publicidad/">Anuncios</a>
                                        </li>
                                    </ul>
                                </li>
								<li><a><i class="fa fa-wrench"></i> Preferencias <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">

										<li><a  href="<?=site_url()?>/admin/preferencias/emailconfig/">E-mail</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
						<ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?=base_url()?>img/avatar/<?=$this->session->userdata("idU")?>.jpg" alt=""><?=$this->session->userdata('userS')?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?=site_url()?>/admin/seguridad/usuario/profile">  Profile</a>
                  </li>
                  <li><a href="<?=site_url("admin/home/logout")?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>



            </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="dashboard_graph">

                            <div class="row x_title">
                                <div class="col-md-6">
                                    <h3><?=$titulo?> <small><?=$subtitle?></small></h3>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?=$view?>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                <br />

                <!-- footer content
                <footer>
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

	<script src="<?=base_url()?>dashboard/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>dashboard/js/moment/moment.min.js"></script>
	<script src="<?=base_url()?>dashboard/js/chartjs/chart.min.js"></script>
	<script src="<?=base_url()?>assets/js/parsley.js"></script>
	<script src="<?=base_url()?>dashboard/js/custom.js"></script>
	<script src="<?=base_url()?>dashboard/js/pace/pace.min.js"></script>
	<!-- image cropping -->
  <script src="<?=base_url()?>dashboard/js/cropping/cropper.min.js"></script>
  <script src="<?=base_url()?>dashboard/js/cropping/main.js"></script>


</body>

</html>
