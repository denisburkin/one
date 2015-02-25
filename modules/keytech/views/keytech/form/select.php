<div class="control-group <? echo((isset($errors[$id])) ? 'error' : '') ?>">
	<label class="control-label" for="<?=$id?>"><?=$title?>:</label>

            <div class="controls">
				<select name="<?=$id?>" id="<?=$id?>">

					<? if (is_object($select)) foreach ($select as $item): ?>

					<option value="<?=$item->id?>"  <?=(($form->$select_id == $item->id) ? 'SELECTED="selected"' : '')?> >
						<? if ( isset($item->lvl) ) echo str_repeat('&nbsp;', ($item->lvl - 1) * 4) . htmlspecialchars($item->name); else echo htmlspecialchars($item->name); ?>
					</option>

					<? endforeach;?>

					<? if (is_array($select)) foreach ($select as $key => $value): ?>

					<option value="<?=$key?>"  <?=((isset($form->$select_id) AND $form->$select_id == $key) ? 'SELECTED="selected"' : '')?> >
						<?=htmlspecialchars($value)?>
					</option>

					<? endforeach;?>
				</select>
				<? if (isset($help) && !empty($help)){?>
					<span class="help-inline"><?=$help?></span>
				<? }?>

				<?if (isset($errors[$id])){?>
					<span class="help-inline"> - <?=$errors[$id]?></span>
				<? }?>
       </div>
</div>