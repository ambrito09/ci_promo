<!--  ddd -->
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <form  data-parsley-validate id="forma_usuario" action="<?=site_url("admin/seguridad/usuario/add/")?>" class="form-horizontal form-label-left" method="post" novalidate>

                    <span class="section">Adicionar usuario</span>

					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario">Usuario <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="usuario" class="form-control col-md-7 col-xs-12" name="usuario" placeholder="Usuario" required="required" type="text" data-parsley-validate-full-width-characters="true" data-parsley-remote data-parsley-trigger="focusout" data-parsley-remote-validator="remotevalidatoruser">
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" required="required" id="email" name="email" data-parsley-type="email" data-parsley-validate-full-width-characters="true" class="form-control" placeholder="Email" autocomplete="off" data-parsley-remote data-parsley-trigger="focusout"
    data-parsley-remote-validator="remotevalidator"
    />
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol">Rol <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="rol" required="required" class="form-control">
												<option value="">&laquo;Seleccionar&raquo;</option>
												<?php 
													foreach($result as $l){													
													?>														
														<option value="<?=$l->id?>"><?=$l->value?></option>
													<?php }?>
											</select>
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tc">Tipo de cuenta <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="tc" required="required" class="form-control">
												<option value="">&laquo;Seleccionar&raquo;</option>
												<?php
													foreach($result_tc as $l){
													?>
														<option value="<?=$l->id?>"><?=$l->value?></option>
													<?php }?>												
											</select>
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" class="form-control col-md-7 col-xs-12" name="password" placeholder="Password" required="required" type="password">
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="retypepassword">Retype password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" required="required" name="retypepassword" data-parsley-equalto="#password" class="form-control" placeholder="Retype password" autocomplete="off" data-parsley-required/>
                      </div>
                    </div>
                    				
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="<?=site_url("admin/seguridad/usuario/")?>" class="btn btn-primary">Cancel</a>
                        <button  type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
