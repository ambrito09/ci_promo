<div class="container margin-top-20">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?=site_url()?>"><?=$this->lang->line('breadcrumb_home')?></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?=site_url()?>"><?=$this->lang->line('breadcrumb_myprofile')?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('breadcrumb_createannounce')?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <p>
                <?php foreach ($idiomas as $lang){?>
                    <a class="btn btn-default" onclick="ShowForm(this)" data-controls="form<?=$lang->lang?>" href="#">
                        <img src="<?=base_url()?>/assets/img/flags/<?=strtoupper($lang->lang)?>.png" alt=""/> <?=strtoupper($lang->name)?>
                    </a>
                <?php }?>
            </p>
        </div>
    </div>
    <div class="row">
        <form id="savePublicity" method="post" action="<?=site_url("profile/saveannounce/")?>" onsubmit="return validateForm()">
            <div class="col-12 form-announces">
                <div class="col-2">
                    <input type="text" readonly class="form-control-plaintext" id="staticControl" value="<?=$this->lang->line("announce_email")?>"/>
                </div>
                <div class="col-4">
                    <input type="text" readonly class="form-control-plaintext" id="announceEmail" value="<?=$this->session->userdata("emailS")?>"/>
                </div>
                <div class="col-2 align-middle">
                    <input type="text" readonly class="form-control-plaintext" id="staticControl" value="<?=$this->lang->line("announce_phone")?>"/>
                </div>
                <div class="col-4">
                    <?php $phone = "";
                        if ($publicidad != null)
                            $phone = $publicidad->numero_telefono;
                    ?>
                    <input type="text" class="form-control" name="announcePhone" id="announcePhone" value="<?=$phone?>" placeholder="<?=$this->lang->line("announce_phonePlaceholder")?>"/>
                </div>
            </div>
            <div class="col-12 form-announces">
                <div class="col-2">
                    <input type="text" readonly class="form-control-plaintext" id="staticControl" value="<?=$this->lang->line("announce_province")?>"/>
                </div>
                <div class="col-4">
                    <select name="announceProvince" id="announceProvince" class="form-control">
                        <option value="0"><?=$this->lang->line("announce_provincePlaceholder")?></option>
                        <?php foreach ($provincias as $prov){?>
                            <?php if ($publicidad != null && $publicidad->id_provincia == $prov->id){?>
                                <option value="<?=$prov->id ?>" selected="selected"><?=$prov->value?></option>
                            <?php } else { ?>
                                <option value="<?=$prov->id ?>"><?=$prov->value?></option>
                            <?php }?>
                        <?php }?>
                    </select>
                </div>
                <div class="col-2">
                    <input type="text" readonly class="form-control-plaintext" id="staticControl" value="<?=$this->lang->line("announce_zone")?>"/>
                </div>
                <div class="col-4">
                    <?php $zone = "";
                    if ($publicidad != null)
                        $zone = $publicidad->zona;
                    ?>
                    <input type="text" class="form-control" name="announceZone" id="announceZone" value="<?=$zone?>" placeholder="<?=$this->lang->line("announce_zonePlaceholder")?>"/>
                </div>
            </div>
            <div class="col-12 form-announces">
                <div class="col-2">
                    <input type="text" readonly class="form-control-plaintext" id="staticControl" value="<?=$this->lang->line("announce_servicios")?>"/>
                </div>
                <div class="col-4">
                    <select name="announceServices" id="announceServices" multiple="multiple" size="5" class="form-control">
                        <?php foreach ($servicios as $serv){?>
                            <?php
                                $is_present = false;
                                foreach ($publicidad->serv_publicidad as $sp)
                                {
                                    if($sp->id_servicio==$serv->id_servicio)
                                    {
                                        $is_present = true;
                                        break;
                                    }
                                }
                            ?>
                            <?php if(!$is_present){?>
                                <option value="<?=$serv->id_servicio ?>"><?=$serv->value?></option>
                            <?php }?>
                        <?php }?>
                    </select>
                </div>
                <div class="col-2">
                    <input type="button" name="btnLeft" id="btnLeft" onclick="MoveLeft()" value="<" class="btn btn-default btn-sm"/>
                    <input type="button" name="btnRight" id="btnRight" onclick="MoveRight()" value=">" class="btn btn-default btn-sm"/>
                </div>
                <div class="col-4">
                    <select name="announceServicesSelected[]" id="announceServicesSelected" multiple="multiple" size="5" class="form-control">
                        <?php foreach ($publicidad->serv_publicidad as $serv){?>
                            <option value="<?=$serv->id_servicio ?>" selected="selected"><?=$serv->value?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <?php foreach ($idiomas as $lang){?>
                <?php $show = $lang->lang == $this->session->userdata("lang")?"show":"" ?>
                <?php
                    $title = "";
                    $content = "";
                    if ($publicidad != null)
                    {
                        foreach ($publicidad->publicidad_lang as $item)
                        {
                            if ($lang->id == $item->id_lang)
                            {
                                $title = $item->titulo_publicidad;
                                $content = $item->contenido_publicidad;
                                break;
                            }
                        }
                    }
                ?>
                <div class="col-12 collapse multi-collapse <?=$show?>" id="form<?=$lang->lang?>" style="padding-right: 0px;padding-left: 0px;">
                    <div class="col-12 form-announces">
                        <input name="announceTitulo<?=$lang->lang?>" id="announceTitulo<?=$lang->lang?>" class="form-control" placeholder="<?=$this->lang->line("announce_tituloPlaceholder")?>" value="<?=$title?>"/>
                    </div>
                    <div class="col-12 form-announces">
                        <textarea name="announceContent<?=$lang->lang?>" id="announceContent<?=$lang->lang?>" cols="30" rows="10" class="form-control" placeholder="<?=$this->lang->line("announce_contentPlaceholder")?>"><?=$content?></textarea>
                    </div>
                </div>
            <?php }?>
            <div class="col-12 form-announces">
                <input type="submit" name="btnSubmit" value="<?=$this->lang->line("announce_btnSubmit")?>" class="btn btn-success btn-sm float-right" />
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function ShowForm(btn)
    {
        var target = $(btn).attr("data-controls");

        $(".multi-collapse").removeClass("show");
        $("#" + target).addClass("show");
    }

    function MoveLeft()
    {
        $("#announceServicesSelected option:selected").each(function () {
            var selOption = $(this);
            $(this).remove();
            $("#announceServices").append(selOption);
        });
    }

    function MoveRight()
    {
        $("#announceServices option:selected").each(function () {
            var selOption = $(this);
            $(this).remove();
            $("#announceServicesSelected").append(selOption);
        });
    }

    function validateForm()
    {
        var isValid = true;
        $("textarea").each(function () {
           if($.trim($(this).val()) == "")
           {
               isValid = false;
               $(this).addClass("border border-danger");
           }
           else
           {
               $(this).removeClass("border border-danger");
           }
        });

        $(".multi-collapse > div > input").each(function(){
            if($.trim($(this).val()) == "")
            {
                isValid = false;
                $(this).addClass("border border-danger");
            }
            else
            {
                $(this).removeClass("border border-danger");
            }
        });

        if($.trim($("#announcePhone").val()) == "")
        {
            isValid = false;
            $("#announcePhone").addClass("border border-danger");
        }
        else
        {
            $("#announcePhone").removeClass("border border-danger");
        }

        if($("#announceProvince").val() == 0)
        {
            isValid = false;
            $("#announceProvince").addClass("border border-danger");
        }
        else
        {
            $("#announceProvince").removeClass("border border-danger");
        }

        if($.trim($("#announceZone").val()) == "")
        {
            isValid = false;
            $("#announceZone").addClass("border border-danger");
        }
        else
        {
            $("#announceZone").removeClass("border border-danger");
        }

        if($("#announceServicesSelected > option").length == 0)
        {
            isValid = false;
            $("#announceServicesSelected").addClass("border border-danger");
        }
        else
        {
            $("#announceServicesSelected > option").each(function () {
               console.log($(this).prop("selected", true));
            });
            $("#announceServicesSelected").removeClass("border border-danger");
        }

        return isValid;
    }
</script>