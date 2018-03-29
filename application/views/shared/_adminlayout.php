<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/dashboard.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?=site_url("admin/home/index")?>">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <!--li class="nav-item">
                    <a class="nav-link" href="index.html#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Help</a>
                </li-->
            </ul>
        </div>
    </nav>
</header>

<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link <?=($id=="dashboard"?"active":"")?>" href="<?=site_url()?>/admin/Home/"><i class="fa fa-dashboard"></i> Overview <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Analytics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Export</a>
                </li>

            </ul>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-bars"></i> Nomencladores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=($id=="provincia"?"active":"")?>" href="<?=site_url()?>/admin/nomencladores/provincia/">&nbsp;&nbsp;&nbsp;<i class="fa  fa-angle-double-right"></i> Provincias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=($id=="zona"?"active":"")?>" href="<?=site_url()?>/admin/nomencladores/zona/">&nbsp;&nbsp;&nbsp;<i class="fa  fa-angle-double-right"></i> Zonas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=($id=="servicio"?"active":"")?>" href="<?=site_url()?>/admin/nomencladores/servicio/">&nbsp;&nbsp;&nbsp;<i class="fa  fa-angle-double-right"></i> Sevicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=($id=="categoria"?"active":"")?>" href="<?=site_url()?>/admin/nomencladores/categoria/">&nbsp;&nbsp;&nbsp;<i class="fa  fa-angle-double-right"></i> Categor&iacute;as</a>
                </li>
            </ul>


        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <h3 style="border-bottom: 1px solid #eee;"><?=$subtitle?></h3>
            <?=$view?>
        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?=base_url()?>assets/js/jquery-slim.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/popper.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</body>
</html>
