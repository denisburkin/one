<div class="control-group <? echo((isset($errors[$id])) ? 'error' : '') ?>">
	<label class="control-label" for="<?=$id?>"><?=$title?>:</label>

	<div class="controls">
		<input id="<?=$id?>" name="<?=$id?>" type="file" >
			<?if (isset($help) && !empty($help))
			{ ?>
			<p class="help-block"><?=$help?></p>
			<? }?>
				<?if (isset($errors[$id]))
			{ ?>
				<span class="help-inline "> - <?=$errors[$id]?></span>
			<? }?>
	</div>
</div>