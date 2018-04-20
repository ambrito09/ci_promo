<div class="row tile_count">
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
	<div class="left"></div>
	<div class="right">
	  <span class="count_top"><i class="fa fa-user"></i> Total Usuarios</span>
	  <div class="count"><?=$estadisticas["usuarios"]?></div>
	  <!--<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
	</div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
	<div class="left"></div>
	<div class="right">
	  <span class="count_top"><i class="fa fa-star"></i> Total Publicidad</span>
	  <div class="count"><?=$estadisticas["publicidad"]?></div>
	 <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?=round(34,2)?>% </i> From last Week</span>-->
	</div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
	<div class="left"></div>
	<div class="right">
	  <span class="count_top"><i class="fa fa-star"></i> Total Publicidad</span>
	  <div class="count"><?=$estadisticas["ofertas_vip"]?></div>
	  <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?=($estadisticas["publicidad"]>0?round(($estadisticas["ofertas_vip"]/$estadisticas["publicidad"])*100,0):0)?>% </i> Ofertas VIP</span>
	</div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
	<div class="left"></div>
	<div class="right">
	  <span class="count_top"><i class="fa fa-user"></i> Total Visitas</span>
	  <div class="count"><?=$estadisticas["visitas"]?></div>
	  <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>100% </i> al portal</span>-->
	</div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
	<div class="left"></div>
	<div class="right">
	  <span class="count_top"><i class="fa fa-user"></i> Total Visitas</span>
	  <div class="count"><?=$estadisticas["visitas_publicidad"]?></div>
	  <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?=($estadisticas["visitas"]>0?round($estadisticas["visitas_publicidad"]/$estadisticas["visitas"]*100,0):0)?>% </i> a Publicidades</span>
	</div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
	<div class="left"></div>
	<div class="right">
	  <span class="count_top"><i class="fa fa-money"></i> Total ventas</span>
	  <div class="count green"><?=$estadisticas["total_ventas"]?></div>
	  <span class="count_bottom">Representaci&oacute;n en  <i class="green"><i class="fa fa fa-eur"></i></i> </span>
	</div>
  </div>




</div>


<div class="col-md-8 col-sm-8 col-xs-12">
  <div class="x_panel">
	<div class="x_title">
	  <h2>Line graph<small>Visitas de usuarios al portal</small></h2>
	  <div class="clearfix"></div>
	</div>
	<div class="x_content">
	  <canvas id="lineChart"></canvas>
	</div>
  </div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
                    <div>
                      <div class="x_title">
                        <h2>Top Profiles</h2>
                        <div class="clearfix"></div>
                      </div>
                      <ul class="list-unstyled top_profiles scroll-view">
					  <?php
					    foreach($topprofile as $t) {?>
                        <li class="media event">
                          <a class="pull-left border-aero profile_thumb">
                            <i class="fa fa-user aero"></i>
                          </a>
                          <div class="media-body">
                            <a class="title" href="#"><?=$t->usuario?></a>
                            <p><strong><?=$t->cant_puntos?> </strong> Cantidad de puntos </p>
                            <p> <small><?=$t->cantidad?> Visitas</small>
                            </p>
                          </div>
                        </li>
						<?php }?>
                      </ul>
                    </div>
                  </div>
<script>
var url_estadistica = "<?=site_url("admin/seguridad/dashboard/showvisitxmonth")?>";
</script>