<!--  ddd -->
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <form data-parsley-validate action="<?=site_url("admin/seguridad/usuario/edit/")?>" class="form-horizontal form-label-left" method="post" novalidate>

                    <span class="section">Editar usuario</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre completo <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="nombre" class="form-control col-md-7 col-xs-12" value="<?=($result->nombre_completo)?>" name="nombre" placeholder="Nombre" required="required" type="text">
						<input type="hidden" name="id" value="<?=($result->id)?>" />
                      </div>
                    </div>	
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario">Usuario <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="usuario" class="form-control col-md-7 col-xs-12" value="<?=($result->usuario)?>" name="usuario" placeholder="Usuario" required="required" type="text">
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="email" class="form-control col-md-7 col-xs-12" value="<?=($result->email)?>" name="email" placeholder="Email" required="required" type="text">
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol">Rol <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="rol" required="required" class="form-control">
												<option value="">&laquo;Seleccionar&raquo;</option>
												<?php 
													foreach($listado as $l){													
													?>														
														<option <?=($result->id_rol==$l->id?"selected='selected'":"")?> value="<?=$l->id?>"><?=$l->value?></option>
													<?php }?>												
											</select>
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Reset password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" class="form-control col-md-7 col-xs-12" name="password" placeholder="Password" required="required" type="password">
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