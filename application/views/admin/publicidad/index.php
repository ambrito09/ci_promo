<div class="row">

<?php if (count($listado)>0) {?>
<div class="col-md-12" style="text-align:right;">
<?=$pagination?>
</div>
<div class="box-body table-responsive no-padding col-md-12" style="overflow-x: hidden;min-height: 200px;">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>T&iacute;tulo</th>
                                            <th>Categor&iacute;a</th>  
                                            <th>Servicio</th>  
                                            <th>Provincia</th>  
                                            <th>Zona</th>  
                                            <th>Activa</th>  
											<th>&nbsp;</th>
                                        </tr>    
									<?php
									foreach($listado as $r){?>
                                        <tr>
                                            <td><?=$r->titulo_publicidad?></td>
                                            <td><?=$r->cat?></td>                                           
                                            <td><?=$r->serv?></td>                                           
                                            <td><?=$r->zona?></td>                                           
                                            <td><?=$r->prov?></td>     
											<td style="text-align:center;"><a href="<?=site_url()?>/admin/publicidad/publicidad/changestatus/<?=$r->idpub?>/<?=$r->if_activo?>"><i class="fa <?=($r->if_activo==1?"fa-check":"fa-ban")?>"></i></a></td>  
											<td style="text-align:right;"><div class="btn-group">
													<a  href="<?=site_url()?>/admin/publicidad/publicidad/view/<?=$r->idpub?>" id="editar" class="btn btn-default btn-sm abtn"><i class="fa  fa-search"></i> Ver</a>
													<a  class="btn btn-default btn-sm dropdown-toggle abtn" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</a>
													<ul class="dropdown-menu" role="menu">														
														<li><a href="<?=site_url()?>/admin/publicidad/publicidad/delete/<?=$r->idpub?>"><i class="fa fa-trash-o"></i> Eliminar</a></li>                                               
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