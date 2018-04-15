<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><small><i class="fa fa-envelope-o"></i> Email</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form1" action="<?=site_url("admin/preferencias/emailconfig/updatemailconf")?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
		  
                    <div class="form-group">
                      <label class="control-label col-md-6 col-sm-6 col-xs-12" style="padding-top:0px;" for="first-name">Use PHP's mail() function (recommended; works in most cases) 
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="radio" class="tipo_envio" value="1" <?=($resultado->mailtype==1?'checked="checked"':'')?>  name="tipo_envio"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-6 col-sm-6 col-xs-12" style="padding-top:0px;" for="last-name">Set my own SMTP parameters (for advanced users ONLY) 
                      </label>
                      <div class=" col-md-3 col-sm-3 col-xs-12">
                        <input type="radio" value="0" class="tipo_envio" <?=($resultado->mailtype==0?'checked="checked"':'')?> name="tipo_envio"  />
                      </div>
                    </div>
					<br/>
					<br/>
					<div class="form-group">
                      <label class="control-label col-md-6 col-sm-6 col-xs-12" style="padding-top:0px;" for="last-name">Send email in HTML format  
                      </label>
                      <div class=" col-md-3 col-sm-3 col-xs-12">
                        <input type="radio" value="html" <?=$resultado->mailformat=="html"?"checked='checked'":""?> class="" name="formato"  />
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-6 col-sm-6 col-xs-12" style="padding-top:0px;" for="last-name">Send email in text format   
                      </label>
                      <div class=" col-md-3 col-sm-3 col-xs-12">
                        <input type="radio" value="text" <?=$resultado->mailformat=="text"?"checked='checked'":""?> class="" name="formato"  />
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
			<div id="config_email" style="display:<?=($resultado->mailtype==1?"none":"block")?>;" class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><small><i class="fa fa-envelope-o"></i> Email</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" action="<?=site_url("admin/preferencias/emailconfig/configsmtp")?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
		  
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="protocol">Protocol 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="protocol" name="protocol" value="<?=$resultado->protocol?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_server">SMTP server 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="smtp_server" name="smtp_server" value="<?=$resultado->smtp_host?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_user">SMTP user 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="smtp_user" name="smtp_user" value="<?=$resultado->smtp_user?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">SMTP password  
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="smtp_password" name="smtp_password" value="<?=$resultado->smtp_pass?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">Encryption 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">                        
						<select name="smtp_crypto" class="form-control col-md-7 col-xs-12">
							<option <?=$resultado->smtp_crypto=="NONE"?"selected='selected'":""?> value="NONE">None</option>
							<option <?=$resultado->smtp_crypto=="TLS"?"selected='selected'":""?> value="TLS">TLS</option>
							<option <?=$resultado->smtp_crypto=="SSL"?"selected='selected'":""?> value="SSL">SSL</option>
						</select>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="post">Port 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="port" name="port" value="<?=$resultado->smtp_port?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="charset">Charset 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="charset" name="charset" value="<?=$resultado->charset?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newline">New line 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="newline" name="newline" value="<?=$resultado->newline?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top:0px;" for="last-name">Validate email 
                      </label>
                      <div class=" col-md-6 col-sm-6 col-xs-12">
                        <input type="checkbox" <?=$resultado->validate_email==1?"checked='checked'":""?>  class="" name="validate"  />
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top:0px;" for="last-name">Wordwrap
                      </label>
                      <div class=" col-md-6 col-sm-6 col-xs-12">
                        <input type="checkbox" <?=$resultado->wordwrap==1?"checked='checked'":""?>  class="" name="wordwrap"  />
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><small><i class="fa fa-cogs"></i> Test your email configuration </small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form3" action="<?=site_url("admin/preferencias/emailconfig/sendemailtest")?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
		  
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Send a test email to
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="email" required="required" placeholder="Email" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Send an email test</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
</div>
<script type="text/javascript" src="<?=base_url()?>dashboard/js/notify/pnotify.core.js"></script>
  <script type="text/javascript" src="<?=base_url()?>dashboard/js/notify/pnotify.buttons.js"></script>
  <script type="text/javascript" src="<?=base_url()?>dashboard/js/notify/pnotify.nonblock.js"></script>
  <script>
$(function(){
	$(".tipo_envio").change(function(){
		if ($(this).val() == 0){
			$("#config_email").css("display","block");
		} else {
			$("#config_email").css("display","none");
		}
	});
	<?php if (isset($message)){?>
	new PNotify({
        title: "<?=(isset($error)?'Error':'Success')?>",
        type: "<?=(isset($error)?'error':'success')?>",
        text: "<?=$message?>",
        nonblock: {
          nonblock: true
        },
        before_close: function(PNotify) {
          // You can access the notice's options with this. It is read only.
          //PNotify.options.text;

          // You can change the notice's options after the timer like this:
          PNotify.update({
            title: PNotify.options.title + " - Enjoy your Stay",
            before_close: null
          });
          PNotify.queueRemove();
          return false;
        }
      });
	<?php }?>
})

</script>