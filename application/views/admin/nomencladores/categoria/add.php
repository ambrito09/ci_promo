<!--  ddd -->
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <form data-parsley-validate id="forma" action="<?=site_url("admin/nomencladores/categoria/add/")?>" class="form-horizontal form-label-left" method="post" novalidate>

                    <span class="section">Adicionar categoria</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">

						<?php foreach($idiomas as $i) { ?>
                        <input <?=($i->lang!=$this->session->userdata("langS")?"style='display:none'":"")?> class="form-control col-md-7 col-xs-12 lenguajes lenguajes<?=$i->lang?>" name="valor[]" placeholder="Categoria" type="text"/>
						<input type="hidden" value="<?=$i->lang?>" name="hvalores[]" />
						<?php }?>
                      </div>
					  <div class="col-md-3 col-sm-3 col-xs-12">
					    <select class="form-control changelang"  style="width: auto;" name="lenguaje">
							<?php foreach($idiomas as $i) {?>
							<option <?=($i->lang==$this->session->userdata("langS")?"selected='selected'":"")?> value="<?=$i->lang?>"><?=$i->name?></option>
							<?php }?>
						</select>
					  </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="<?=site_url("admin/nomencladores/categoria/")?>" class="btn btn-primary">Cancel</a>
                        <button id="addbtn" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
