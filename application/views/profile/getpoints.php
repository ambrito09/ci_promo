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
                        <?=$this->lang->line('breadcrumb_getpoints')?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="alert alert-success" role="alert">
                <?=str_replace("{points}", $user->cant_puntos, $this->lang->line('points_info'))?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"><?=$this->lang->line('points_hdrpoints')?></th>
                            <th scope="col"><?=$this->lang->line('points_hdrprice')?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pointsOffers as $offer) :?>
                        <tr>
                            <th scope="row">
                                <input type="radio" name="pointsOffer" id="pointsOffer1" value="<?=$offer->id?>">
                            </th>
                            <td>
                                <?=$offer->puntos?>
                            </td>
                            <td>
                                &euro;<?=$offer->precio?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <input type="button" value="<?=$this->lang->line("points_buypoints")?>" class="btn btn-success rounded pull-right">
        </div>
    </div>
</div>