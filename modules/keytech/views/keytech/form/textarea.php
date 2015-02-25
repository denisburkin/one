<div class="control-group <? echo((isset($errors[$id])) ? 'error' : '') ?>">
	<label class="control-label" for="<?=$id?>"><?=$title?>:</label>

	<div class="controls">
		<textarea class="xlarge" style="width: 98%" id="<?=$id?>" name="<?=$id?>"><?=$form->$id?></textarea>
			<?if (isset($help) && !empty($help))
			{ ?>
				<span class="help-inline "><?=$help?></span>
				<? }?>
				<?if (isset($errors[$id]))
			{ ?>
				<span class="help-inline "> - <?=$errors[$id]?></span>
			<? }?>
	</div>
</div>
