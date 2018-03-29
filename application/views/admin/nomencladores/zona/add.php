<div class="row">
<div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                
                                <!-- form start -->
                                <form action="<?=site_url("admin/nomencladores/zona/add/")?>" method="post" autocomplete="off" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="valor">Valor</label>
                                            <input type="text" name="valor" class="form-control" id="valor">
                                        </div>  
										<div class="form-group">
                                            <label for="valor">Provincia</label>                                            
											<select name="provincia" class="form-control">
												<option>&laquo;Seleccionar&raquo;</option>
												<?php 
													foreach($result as $l){													
													?>														
														<option value="<?=$l->id?>"><?=$l->value?></option>
													<?php }?>												
											</select>
                                        </div> 
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                            <!-- Form Element sizes -->
                            

                            

                            <!-- Input addon -->
                            

                        </div>
</div>