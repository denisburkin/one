

<div class="control-group <? echo((isset($errors['_external'][$id])) ? 'error' : '') ?>">

	<label class="control-label" for="<?=$id?>"><?=$title?>:</label>

	<div class="controls">
		<input class="input-xlarge" id="<?=$id?>" name="<?=$id?>" type="password" value="">
			<?if (isset($help) && !empty($help)){ ?>
				<span class="help-inline "><?=$help?></span>
			<? }?>
			<?if (isset($errors['_external'][$id])){?>
				<span class="help-inline "> - <?=$errors['_external'][$id]?></span>
			<?}?>
	</div>
</div>

<?$id = 'password_confirm';?>
<div class="control-group <? echo((isset($errors['_external'][$id])) ? 'error' : '') ?>">

	<label class="control-label" for="<?=$id?>">Подтверждение пароля:</label>

	<div class="controls">
		<input class="input-xlarge" id="<?=$id?>" name="<?=$id?>" type="password" value="">
			<?if (isset($help) && !empty($help)){ ?>
				<span class="help-inline "><?=$help?></span>
			<? }?>
			<?if (isset($errors['_external'][$id])){?>
				<span class="help-inline "> - <?=$errors['_external'][$id]?></span>
			<?}?>
	</div>
</div>


