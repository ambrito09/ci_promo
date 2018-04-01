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

<body style="background:#F7F7F7;">
  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form data-parsley-validate>
            <h1>Login</h1>
            <div>
              <input type="text" required="required" class="form-control" placeholder="<?=$this->lang->line('username_placeholder')?>" required="" />
            </div>
            <div>
              <input type="password" required="required" class="form-control" placeholder="<?=$this->lang->line('password_placeholder')?>" required="" />
            </div>
            <div>
			  <input type="submit" id="form1"  class="btn btn-default submit" value="<?=$this->lang->line('login_button')?>" />
              <a class="reset_pass" href="#"><?=$this->lang->line('lostpassword_link')?></a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link"><?=$this->lang->line('newtosite_link')?>
                <a href="<?=site_url("home/register")?>" class="to_register"> <?=$this->lang->line('createaccount_link')?>  </a>
              </p>
              <div class="clearfix"></div>
              <br />              
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>

    </div>
  </div>
<script src="<?=base_url()?>assets/js/jquery.3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/parsley.js"></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
</body>
</html>
