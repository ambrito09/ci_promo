<!--  ddd -->
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <form data-parsley-validate action="<?=site_url("admin/nomencladores/ofertaspuntos/add/")?>" class="form-horizontal form-label-left" method="post" novalidate>

                    <span class="section">Adicionar ofertas de puntos</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Puntos <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="valor" class="form-control col-md-7 col-xs-12" name="valor" placeholder="Ofertas de puntos" required="required" type="text">
                      </div>
                    </div>
					<div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="precio" class="form-control col-md-7 col-xs-12 has-feedback" name="precio" placeholder="Precio de puntos" required="required" type="text">
						<span class="fa fa-eur form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="<?=site_url("admin/nomencladores/ofertaspuntos/")?>" class="btn btn-primary">Cancel</a>
                        <button  type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>