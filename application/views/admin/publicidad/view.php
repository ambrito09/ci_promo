<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="x_panel">
	     <div class="x_title">
		  <h2>Publicidad<small>datos del anuncio</small></h2>
		  <div class="clearfix"></div>
		</div>
		<div class="x_content">
		  <br />
		  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">T&iacute;tulo <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<textarea class="form-control col-md-7 col-xs-12" disabled="disabled"><?=$result->titulo_publicidad?></textarea>
				
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contenido publicidad <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<textarea class="form-control col-md-7 col-xs-12" disabled="disabled"><?=$result->contenido_publicidad?></textarea>
			  </div>
			</div>
			<div class="form-group">
			  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha publicaci&oacute;n</label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?=$result->fecha_publicacion?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Categor&iacute;a</label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?=$result->cat?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Servicio</label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?=$result->serv?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Activa</label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><i class="fa <?=($result->if_activo==1?"fa-check":"fa-ban")?>"></i></label>
			  </div>
			</div>
			<div class="form-group">
			  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de visitas</label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?=$result->cant_visitas?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Oferta vip</label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><i class="fa <?=($result->carrusel_vip==1?"fa-check":"fa-ban")?>"></i></label>
			  </div>
			</div>
			<div class="form-group">
			  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Go to top</label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><i class="fa <?=($result->gototop==1?"fa-check":"fa-ban")?>"></i></label>
			  </div>
			</div>
			<div class="ln_solid"></div>
			<div class="x_title">
			  <h2>Publicidad<small>datos del usuario</small></h2>
			  <div class="clearfix"></div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre completo <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-xs-12"><?=$result->nombre_completo?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edad <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-xs-12"><?=$result->edad?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-xs-12"><?=$result->email?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Direcci&oacute;n <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-xs-12"><?=$result->direccion?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">N&uacute;mero de tel&eacute;fono <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-xs-12"><?=$result->numero_telefono?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Provincia <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-xs-12"><?=$result->prov?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Zona <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-xs-12"><?=$result->zona?></label>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">C&oacute;digo postal <span class="required"></span>
			  </label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<label style="text-align: left;" for="middle-name" class="control-label col-xs-12"><?=$result->codigo_postal?></label>
			  </div>
			</div>
		  </form>
		</div>
	  </div>
	</div>

  </div>