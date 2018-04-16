<div class="container margin-top-20">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?=site_url()?>"><?=$this->lang->line('breadcrumb_home')?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('breadcrumb_myprofile')?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 col-md-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <?=$this->lang->line('profile_status')?>
                    <?php if($user->status == "1"){?>
                        <span class="badge badge-success badge-pill pull-right">
                                <?=$this->lang->line('profile_status_active')?>
                            </span>
                    <?php } else { ?>
                        <span class="badge badge-danger badge-pill pull-right">
                                <?=$this->lang->line('profile_status_inactive')?>
                            </span>
                    <?php } ?>
                </li>
                <li class="list-group-item">
                    <?=$this->lang->line('profile_publicidad')?>
                    <?php if(!empty($user->publicidad)){?>
                        <img src="<?=base_url()?>assets/img/check.png" width="24" height="24" class="img-fluid pull-right"/>
                    <?php } else { ?>
                        <img src="<?=base_url()?>assets/img/uncheck.png" width="24" height="24" class="img-fluid pull-right"/>
                    <?php } ?>
                </li>
                <li class="list-group-item">
                    <?=$this->lang->line('profile_points')?>
                    <span class="badge badge-success badge-pill pull-right"><?=$user->cant_puntos?></span>
                </li>
                <li class="list-group-item">
                    <?=$this->lang->line('profile_visits')?>
                    <span class="badge badge-success badge-pill pull-right"><?=$user->cant_visitas?></span>
                </li>
            </ul>
        </div>
    </div>
</div>