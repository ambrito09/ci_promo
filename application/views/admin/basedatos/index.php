<!--  ddd -->
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <form action="<?=site_url("admin/basedatos/migracion/migration/")?>" class="form-horizontal form-label-left" method="post" novalidate>

                    <span class="section">Migrar base de datos</span>

					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="valor" class="form-control col-md-7 col-xs-12" name="valor" placeholder="Roles" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo">C&oacute;digo <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
					    <textarea name="codigo" class="form-control col-md-7 col-xs-12" rows="10"></textarea>                        
                      </div>
                    </div>					
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="reset" class="btn btn-primary">Cancel</button>
                        <button  type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>