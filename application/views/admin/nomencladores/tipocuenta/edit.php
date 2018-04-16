<!--  ddd -->
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <form data-parsley-validate action="<?=site_url("admin/nomencladores/tipocuenta/edit/")?>" class="form-horizontal form-label-left" method="post" novalidate>

                    <span class="section">Editar tipo de cuenta</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="valor" class="form-control col-md-7 col-xs-12" name="valor" value="<?=($result->value)?>" placeholder="Tipo de cuenta" required="required" type="text">
                        <input type="hidden" name="id" value="<?=($result->id)?>" />
					  </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="<?=site_url("admin/nomencladores/tipocuenta/")?>" class="btn btn-primary">Cancel</a>
                        <button  type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>