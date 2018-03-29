<div class="row">
<div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                
                                <!-- form start -->
                                <form action="<?=site_url("admin/nomencladores/categoria/edit/")?>" method="post" autocomplete="off" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="valor">Valor</label>
                                            <input type="text" name="valor" value="<?=($result->value)?>" class="form-control" id="valor"/>
											<input type="hidden" name="id" value="<?=($result->id)?>" />
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