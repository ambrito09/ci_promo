<div class="x_content">
	<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
		<div class="profile_img">

	  <!-- end of image cropping -->
	  <div id="crop-avatar">
		<!-- Current avatar -->
		<div class="avatar-view" title="Change the avatar">
		  <img src="<?=base_url()?>img/avatar/<?=$this->session->userdata("idU")?>.jpg" alt="Avatar">
		</div>
		<!-- Cropping modal -->
                        <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form id="form_modal" class="avatar-form" action="<?=site_url("admin/seguridad/usuario/uploadavatar")?>"  enctype="multipart/form-data" method="post">
                                <div class="modal-header">
                                  <button class="close" data-dismiss="modal" type="button">&times;</button>
                                  <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="avatar-body">

                                    <!-- Upload image and data -->
                                    <div class="avatar-upload">
                                      <input class="avatar-src" name="avatar_src" type="hidden">
                                      <input class="avatar-data" name="avatar_data" type="hidden">
                                      <label for="avatarInput">Local upload</label>
                                      <input class="avatar-input" id="avatarInput" name="userfile" type="file">
                                    </div>

                                    <!-- Crop and preview -->
                                    <div class="row">
                                      <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="avatar-preview preview-lg"></div>
                                        <div class="avatar-preview preview-md"></div>
                                        <div class="avatar-preview preview-sm"></div>
                                      </div>
                                    </div>

                                    <div class="row avatar-btns">
                                      <div class="col-md-9">
                                        <div class="btn-group">
                                          <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                        </div>
                                        <div class="btn-group">
                                          <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="modal-footer">
                                                  <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                </div> -->
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- /.modal -->

                        <!-- Loading state -->
                        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
		

		<!-- Loading state -->
		<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
	  </div>
	  <!-- end of image cropping -->

	</div>
	 


  </div>
  
  <div class="col-md-9 col-sm-9 col-xs-12">

	<div class="col-md-12" style="border-bottom:1px solid #eee;margin-bottom: 10px;">
		<div class="col-md-6">Usuario</div>
		<div class="col-md-6"><?=$this->session->userdata('userS')?></div>
	</div>
	<div class="col-md-12" style="border-bottom:1px solid #eee;margin-bottom: 10px;">
		<div class="col-md-6">Email</div>
		<div class="col-md-6"><?=$this->session->userdata('emailS')?></div>
	</div>
	<div class="col-md-12" style="border-bottom:1px solid #eee;margin-bottom: 10px;">
		<div class="col-md-6">Status</div>
		<div class="col-md-6"><?=($this->session->userdata('statusS')==1?"Activo":"Inactivo")?></div>
	</div>
	<div class="col-md-12" style="border-bottom:1px solid #eee;margin-bottom: 10px;">
		<div class="col-md-6">Rol</div>
		<div class="col-md-6"><?=$this->session->userdata('rolS')?></div>
	</div>
		<div class="col-md-12" style="border-bottom:1px solid #eee;margin-bottom: 10px;">
		<div class="col-md-6">Tipo de cuenta</div>
		<div class="col-md-6"><?=$this->session->userdata('tipocuentaS')?></div>
	</div>
  </div>
  <br/>
<div class="col-md-9 col-sm-9 col-xs-12">
<form class="form-horizontal form-label-left input_mask" action="<?=site_url("admin/seguridad/usuario/changepassword")?>" method="post">
	<div class="form-group">
	  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	  <input type="password" class="form-control has-feedback-left" name="passwordold" id="passwordold" placeholder="Old password">
	  <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	  <input type="password" class="form-control has-feedback-left" id="passwordnew" name="passwordnew" placeholder="New password">
	  <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
	</div>
	</div>

	<div class="ln_solid"></div>
	<div class="form-group">
	  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
		<a href="<?=site_url("admin/seguridad/usuario/")?>" class="btn btn-primary">Cancel</a>
		<button type="submit" class="btn btn-success">Enviar</button>
	  </div>
	</div>

  </form>

</div>

	

</div>