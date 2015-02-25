<select name="<?=$id?>" id="<?=$id?>">

    <option value="0" <?=(($static->$select_id == 0) ? 'SELECTED="selected"' : '')?>>&nbsp;</option>

    <? if (is_object($select)) foreach ($select as $item): ?>

        <option value="<?=$item->id?>"  <?=(($static->$select_id == $item->id) ? 'SELECTED="selected"' : '')?> >
            <? if ( isset($item->lvl) ) echo str_repeat('&nbsp;', ($item->lvl - 1) * 4) . htmlspecialchars($item->name); else echo htmlspecialchars($item->name); ?>
        </option>

    <? endforeach;?>

    <? if (is_array($select)) foreach ($select as $key => $value): ?>

        <option value="<?=$key?>"  <?=((isset($static->$select_id) AND $static->$select_id == $key) ? 'SELECTED="selected"' : '')?> >
            <?=htmlspecialchars($value)?>
        </option>

    <? endforeach;?>
</select>