<div class="clearfix <? echo((isset($errors[$id])) ? 'error' : '') ?>">
		<textarea class="xxlarge" style="width: 98%" id="<?=$id?>" name="<?=$id?>"><?=$form->$id?></textarea>
		<?if (isset($help) && !empty($help)) { ?>
		<span class="help-inline"><?=$help?></span>
		<? }?>
		<?if (isset($errors[$id])) { ?>
		<span class="help-inline"> - <?=$errors[$id]?></span>
		<? }?>
</div>