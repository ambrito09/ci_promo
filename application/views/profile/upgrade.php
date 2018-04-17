<div class="container margin-top-20">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?=site_url()?>"><?=$this->lang->line('breadcrumb_home')?></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?=site_url("profile/myprofile")?>"><?=$this->lang->line('breadcrumb_myprofile')?></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?=$this->lang->line('breadcrumb_upgrade')?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"><?=$this->lang->line('upgrade_hdrtype')?></th>
                        <!--th scope="col"><?=$this->lang->line('upgrade_hdrprice')?></th-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($accountTypes as $type) :?>
                        <tr>
                            <th scope="row">
                                <input type="radio" name="pointsOffer" id="pointsOffer1" value="<?=$type->id?>">
                            </th>
                            <td>
                                <?=$type->value?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <input type="button" value="<?=$this->lang->line("upgrade_btn")?>" class="btn btn-success rounded pull-right">
        </div>
    </div>
</div>