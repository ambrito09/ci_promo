<div class="row">
<div class="col-md-12" style="text-align:right;">
<a href="<?=site_url()?>/admin/seguridad/usuario/add/"><i class="fa  fa-plus"></i> Adicionar usuario</a>
</div>

<div class="col-md-12" style="padding-left: 0px;">
<form id="forma_usuario"  method="post">
<div class="col-md-6" style="text-align:right;padding-left: 0px;">
	<div style="margin-top:20px;padding-left: 0px;" class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
		<input type="text" value="<?=(isset($usuario)?$usuario:'')?>" class="form-control has-feedback-right" id="usuario" name="usuario" placeholder="Usuario">
		<span class="fa fa-search form-control-feedback right" style="cursor:pointer;" aria-hidden="true"></span>
		<input type="hidden" name="pag" id="pag" />
	</div>
</div>

<div class="col-md-6" style="text-align:right;"><?=$pagination?></div>
</form>
</div>
<?php if (count($listado)>0) {?>
<div class="box-body table-responsive no-padding col-md-12" style="overflow-x: hidden;" >
                                    <table class="table table-hover">
                                        <tr>
                                            <th>ID</th>
                                            <th>Usuario</th>
                                            <th>Email</th>  
                                            <th>Rol</th>  
                                            <th>Tipo de cuenta</th>
                                            <th style="text-align:center;">Activo</th>
											<th>&nbsp;</th>
                                        </tr>    
									<?php
									foreach($listado as $r){?>
                                        <tr>
                                            <td><?=$r->id?></td>
                                            <td><?=$r->usuario?></td>
                                            <td><?=$r->email?></td>                                           
                                            <td><?=$r->id_rol?></td>                                           
                                            <td><?=$r->id_tipo_cuenta?></td>
                                            <td style="text-align:center;"><a href="#" onclick="cambiarstatus('<?=$r->id?>')"><i id="<?=$r->id?>_i" class="fa <?=($r->status==1?"fa-check":"fa-ban")?>"></i></a>
											<input type="hidden" value="<?=$r->id?>" name="hi<?=$r->id?>" id="hi<?=$r->id?>" />
											<input type="hidden" value="<?=$r->status?>" name="hs<?=$r->id?>" id="hs<?=$r->id?>" />
											</td>
											<td style="text-align:right;"><div class="btn-group">
													<a  href="<?=site_url()?>/admin/seguridad/usuario/edit/<?=$r->id?>" id="editar" class="btn btn-default btn-sm abtn"><i class="fa  fa-pencil"></i> Editar</a>
													<a  class="btn btn-default btn-sm dropdown-toggle abtn" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</a>
													<ul class="dropdown-menu" role="menu">
														<li><a href="<?=site_url()?>/admin/seguridad/usuario/delete/<?=$r->id?>"><i class="fa fa-trash-o"></i> Eliminar</a></li>                                               
													</ul>
												</div>
											</td>
                                        </tr>
									<?php }?>
                                    </table>
                                </div>
<?php } else {?>
<div class="col-md-12" style="text-align: center;
font-size: 74px;
color: gray;">
 <i class="fa fa-warning"></i><br/>
 <p style="font-size: 20px;">No hay elementos a mostrar</p>
</div>
<?php }?>

                        <!-- left column -->
                        <!--/.col (left) --></div>
<script>
$(function(){
	$(".pagination li a").each(function(){
		$(this).click(function(){
			$("#pag").val($(this).attr("data-ci-pagination-page"));
			$("#forma_usuario").attr("action","<?=site_url("admin/seguridad/usuario/index/")?>"+$("#pag").val());
			$("#forma_usuario").submit();
			return false;
		});
	});
});
function cambiarstatus(id){
	$.ajax({
           type: "POST",
           url: "<?=site_url()?>/admin/seguridad/usuario/changestatus",
           data: {id:$("#hi"+id).val(),status:$("#hs"+id).val()},
           success: function(data)
           {
             console.log(data);
			 $("#"+id+"_i").removeAttr("class");
			 var clase = (data==1?"fa-check":"fa-ban");
			 $("#"+id+"_i").addClass("fa "+clase);
			 $("#hs"+id).val(data);
           }
       });
	   return false;
}
</script>