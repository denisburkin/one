<textarea <?=isset($class)?'class="'.$class.'"':''?> id="<?=$id?>" name="<?=$id?>" rows="10" cols="80"><?=$static->$id?></textarea>
<script>
    CKEDITOR.replace('<?=$id?>', {
        extraAllowedContent: 'p h1 h2 h3 h4 h5 h6 div span strong;'
    } );
</script>