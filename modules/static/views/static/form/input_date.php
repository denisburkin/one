<div class="datetime">
    <input id="<?=$id?>" class="form-control datetime_date" name="<?=$id?>" value="<?=date("d.m.Y", $static->$id)?>"/>
    <input id="time" class="form-control datetime_time" value="<?=date("H:i", $static->$id)?>"/>
</div>
<script>
    $("#<?=$id?>").datepicker({
        format: "dd.mm.yyyy",
        language: "ru"
    });
    $('#time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true,
        showMeridian: false
    });
</script>