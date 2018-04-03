<div class="row">
<div class="col-md-12" style="text-align:right;">
<a href="<?=site_url()?>/admin/nomencladores/servicio/add/"><i class="fa  fa-plus"></i> Adicionar servicio</a>
</div>
<?php if (count($listado)>0) {?>
<div class="col-md-12" style="text-align:right;">
<?=$pagination?>
</div>
<div class="box-body table-responsive no-padding col-md-12" style="overflow-x: hidden;">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>ID</th>
                                            <th>Valor</th>  
											<th>&nbsp;</th>
                                        </tr>    
									<?php
									foreach($listado as $r){?>
                                        <tr>
                                            <td><?=$r->id?></td>
                                            <td><?=$r->value?></td>                                           
											<td style="text-align:right;"><div class="btn-group">
													<a  href="<?=site_url()?>/admin/nomencladores/servicio/edit/<?=$r->id?>" id="editar" class="btn btn-default btn-sm abtn"><i class="fa  fa-pencil"></i> Editar</a>
													<a  class="btn btn-default btn-sm dropdown-toggle abtn" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</a>
													<ul class="dropdown-menu" role="menu">
														<li><a href="<?=site_url()?>/admin/nomencladores/servicio/delete/<?=$r->id?>"><i class="fa fa-trash-o"></i> Eliminar</a></li>                                               
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