

<div class="control-group <? echo((isset($errors[$id])) ? 'error' : '') ?>">

	<label class="control-label" for="<?=$id?>"><?=$title?>:</label>

	<div class="controls">
		<input class="input-xlarge" id="<?=$id?>" name="<?=$id?>" type="password" value="">
			<?if (isset($help) && !empty($help)){ ?>
				<span class="help-inline "><?=$help?></span>
			<? }?>
			<?if (isset($errors[$id])){?>
				<span class="help-inline "> - <?=$errors[$id]?></span>
			<?}?>
	</div>
</div>

