<div class="control-group" id="control_<?=$id?>">
    <input id="<?=$id?>" name="<?=$id?>" type="file" title="Выберите файл"/>
    <p class="help-block">
    <?if (isset($help) && !empty($help))
    { ?>
        <?=$help?>
    <? }?>
    </p>
</div>