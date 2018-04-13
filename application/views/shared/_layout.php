<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/owlcarousel/assets/owl.theme.default.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <title>Promotion</title>
</head>
<body>
    <!-- Menu -->
    <nav class="menu" id="theMenu">
        <div class="menu-wrap">
            <?=$menu?>
        </div>

        <!-- Menu button -->
        <div id="menuToggle"><i class="fa fa-bars"></i></div>
    </nav>

    <?=$view?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery.3.2.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/owlcarousel/owl.carousel.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>
</body>
</html>