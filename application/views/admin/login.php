<!doctype html>
<html lang="en">
<head>
    
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/login.css" rel="stylesheet">
</head>

<body style="background:#F7F7F7;">
  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form data-parsley-validate action="<?=site_url("admin/home/login")?>" method="post">
            <h1>Login</h1>
            <div>
              <input type="text" required="required" class="form-control" id="email" name="email" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" required="required" name="clave" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
			  <input type="submit" id="form_login_admin"  class="btn btn-default submit" value="Log in" />
              <!--<a class="btn btn-default submit" href="index.html">Log in</a>-->
             
            </div>
            <div class="clearfix"></div>
            <div class="separator">
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
