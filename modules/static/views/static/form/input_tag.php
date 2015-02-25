<input id="<?=$id?>" class="form-control" placeholder="<?=isset($placeholder)?$placeholder:'Теги..'?>" type="text" name="<?=$id?>" value="<?=$value?>"/>
<script>
    $('#<?=$id?>').tagsinput();
    $('#<?=$id?>').tagsinput('input').typeahead({
        prefetch: '/admin/static/get_tags'
    }).bind('typeahead:selected', $.proxy(function (obj, datum) {
            this.tagsinput('add', datum.value);
            this.tagsinput('input').typeahead('setQuery', '');
        }, $('#<?=$id?>')));
</script>