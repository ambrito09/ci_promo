<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png">

    <title><?=$this->lang->line('registrationpage_title')?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/signin.css" rel="stylesheet">
	<script>
		var base_url = '<?=site_url()?>';
	</script>
</head>

<body>
<form data-parsley-validate id="forma" action="<?=site_url("home/register")?>" method="post">
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
                <input type="text" required="required" name="fullname" class="form-control" placeholder="<?=$this->lang->line('fullname_placeholder')?>" autocomplete="off"/>
                <input type="text" required="required" name="userid" class="form-control" placeholder="<?=$this->lang->line('user_placeholder')?>" autocomplete="off"/>
                <input type="text" required="required" id="email" name="email" data-parsley-type="email" data-parsley-validate-full-width-characters="true" class="form-control" placeholder="<?=$this->lang->line('email_placeholder')?>" autocomplete="off" data-parsley-remote data-parsley-trigger="focusout"
                       data-parsley-remote-validator="remotevalidator"/>
                <input type="password" required="required" id="password1" name="password" class="form-control" placeholder="<?=$this->lang->line('password_placeholder')?>" autocomplete="off"
                       data-parsley-minlength="5"/>
                <input type="password" required="required" name="retypepassword" data-parsley-equalto="#password1" class="form-control" placeholder="<?=$this->lang->line('retype_placeholder')?>" autocomplete="off" data-parsley-required/>

                <input type="submit" id="form1"  class="btn btn-lg btn-primary btn-block btn-signin" value="<?=$this->lang->line('register_button')?>" />
                <a href="<?=site_url("home")?>" class="forgot-password text-right">
                    <?=$this->lang->line('breadcrumb_home')?>
                </a>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</form>
<script src="<?=base_url()?>assets/js/jquery.3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/parsley.js"></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
</body>
</html>
