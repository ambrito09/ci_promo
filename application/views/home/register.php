<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.png">

    <title>User Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/signin.css" rel="stylesheet">
	<script>
		var base_url = '<?=site_url()?>';
	</script>
</head>

<body style="background:#F7F7F7;">
<div id="wrapper">
      <div id="register" class="animate form">
        <section class="login_content">
          <form data-parsley-validate id="forma" action="<?=site_url("home/register")?>" method="post">
            <h1>Create Account</h1>
            <div>
			  <input type="text" required="required" name="fullname" class="form-control" placeholder="Full name" autocomplete="off"/>              
            </div>
            <div>
             <input type="text" required="required" name="userid" class="form-control" placeholder="User" autocomplete="off"/>
            </div>
            <div>
               <input type="text" required="required" id="email" name="email" data-parsley-type="email" data-parsley-validate-full-width-characters="true" class="form-control" placeholder="Email" autocomplete="off" data-parsley-remote data-parsley-trigger="focusout"
    data-parsley-remote-validator="remotevalidator"/>
            </div>
			<div>
               <input type="password" required="required" id="password1" name="password" class="form-control" placeholder="Password" autocomplete="off" 
					data-parsley-minlength="5"/>
            </div>
			<div>
               <input type="password" required="required" name="retypepassword" data-parsley-equalto="#password1" class="form-control" placeholder="Retype password" autocomplete="off" data-parsley-required/>
            </div>
            <div>
              <!--<a class="btn btn-default submit" href="index.html">Submit</a>-->
			  <input type="submit" id="form1"  class="btn btn-default submit" value="Register" />
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
<script src="<?=base_url()?>assets/js/jquery.3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/parsley.js"></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
</body>
</html>
