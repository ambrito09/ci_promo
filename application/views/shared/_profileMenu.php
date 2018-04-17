<h1 class="logo"><a href="<?=site_url()?>"><?=$this->lang->line('site_name')?></a></h1>
<i class="fa fa-arrow-right menu-close"></i>
<?php if ($this->session->userdata("loggedIn")){?>
    <a href="<?=site_url("profile/myprofile")?>"><?=$this->lang->line('link_myprofile')?></a>
    <a href="<?=site_url("profile/getPoints")?>"><?=$this->lang->line('link_getpoints')?></a>
    <a href="<?=site_url("profile/upgrade")?>"><?=$this->lang->line('link_upgradeacc')?></a>
    <!--a href="<?=site_url("profile/transactions")?>"><?=$this->lang->line('link_viewtransactions')?></a-->
    <a href="<?=site_url("home/logout")?>"><?=$this->lang->line('link_logout')?></a>
<?php } ?>



<?php if ($this->session->userdata("lang") === "en"){?>
    <a href="<?=site_url("home/language/it")?>">
        <?=$this->lang->line('link_lang_it')?>
        <img src="<?=base_url()?>assets/img/flags/IT.png"/>
    </a>
<?php } else {?>
    <a href="<?=site_url("home/language/en")?>">
        <?=$this->lang->line('link_lang_en')?>
        <img src="<?=base_url()?>assets/img/flags/US.png"/>
    </a>
<?php }?>
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-dribbble"></i></a>
<a href="#"><i class="fa fa-envelope"></i></a>