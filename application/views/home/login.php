<!doctype html>
<html lang="en">
<head>
    
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png">

    <title><?=$this->lang->line('login_page_title')?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/signin.css" rel="stylesheet">
</head>

<body>
<form action="<?= site_url("home/login") ?>" method="post">
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="<?=base_url()?>assets/img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php
            if($this->session->flashdata("msg")){?>
                <div class="alert alert-danger" role="alert">
                    <?=$this->session->flashdata("msg") ?>
                </div>
            <?php } ?>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="email" required="required" class="form-control" placeholder="<?=$this->lang->line('username_placeholder')?>"/>
                <input type="password" name="password" required="required" class="form-control" placeholder="<?=$this->lang->line('password_placeholder')?>"/>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                <?=$this->lang->line('lostpassword_link')?>
            </a>
            <a href="<?=site_url("home/register")?>" class="forgot-password">
                <?=$this->lang->line('createaccount_link')?>
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</form>
<script src="<?=base_url()?>assets/js/jquery.3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/parsley.js"></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
</body>
</html>
