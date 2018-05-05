<!--  ddd -->
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <form data-parsley-validate action="<?=site_url("admin/nomencladores/idioma/add/")?>" class="form-horizontal form-label-left" method="post" novalidate>

                    <span class="section">Adicionar idioma</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Idioma" required="required" type="text">
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo">C&oacute;digo <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="codigo" class="form-control col-md-7 col-xs-12" name="codigo" placeholder="es, en, it" required="required" type="text">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="<?=site_url("admin/nomencladores/idioma/")?>" class="btn btn-primary">Cancel</a>
                        <button  type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>