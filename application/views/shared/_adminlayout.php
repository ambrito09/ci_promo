<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/dashboard.css" rel="stylesheet">
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
                    <a class="nav-link active" href="index.html#">Overview <span class="sr-only">(current)</span></a>
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
                    <a class="nav-link" href="index.html#">Nav item</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Nav item again</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">One more nav</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Another nav item</a>
                </li>
            </ul>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Nav item again</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">One more nav</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#">Another nav item</a>
                </li>
            </ul>
        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <h1>Dashboard</h1>
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
