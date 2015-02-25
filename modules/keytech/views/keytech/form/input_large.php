<div class="control-group <? echo((isset($errors[$id])) ? 'error' : '') ?>">
	<label class="control-label" for="<?=$id?>"><?=$title?>:</label>

	<div class="controls">
        <div  class="input">
		<input class="input-xxlarge" id="<?=$id?>" name="<?=$id?>" type="text" value="<?=htmlspecialchars($form->$id)?>" style="max-width: 500px;">

            <? if (isset($help) && !empty($help) && $help=='.html'):?>
               <span class="add-on">.html</span>
            <? elseif (isset($help) && !empty($help)):?>
				<span class="help-inline"><?=$help?></span>
		    <? endif;?>

            <?if (isset($errors[$id])):?>
				<span class="help-inline "> - <?=$errors[$id]?></span>
            <? endif;?>
        </div>
	</div>
</div>