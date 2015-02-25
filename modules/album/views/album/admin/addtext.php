<style type="text/css"> .lefts {
    float: left;
}

.rights {
    float: left;
}
</style>

<fieldset>
    <legend>
        <a href="/admin/album" class="btn btn-info" style="float: right; margin-left:20px;"><i class=" icon-arrow-left icon-white"></i> Назад</a>
        Текст
    </legend>
</fieldset>

<form action="/admin/album/addtext/<?=Request::initial()->param('id')?>" method="POST" name="myform" id="myform">

	<? foreach ($table as $foto): ?>
        <div id="foto_<?=$foto->id?>" style="float: left;margin-right:10px;width: 220px;margin-bottom: 10px;">
            <a href="/public/album/<?=$foto->album_id?>/<?=$foto->id?>_big.jpg" class="foto">
                <img class="thumbnail" src="/public/album/<?=$foto->album_id?>/<?=$foto->id?>.jpg" alt=""/>
            </a>
			<input type="text" name="title[<?=$foto->id?>]"   value="<?=$foto->title?>" />
            <textarea id="editor<?=$foto->id?>" class="ckeditor" name="info[<?=$foto->id?>]"  style="width: 94%; "><?=$foto->info?></textarea>
		</div>
	<? endforeach;?>

	<hr style="clear: both;"/>

    <input type="submit" value="Cохранить" name="send" class="btn"/>
</form>

<script type="text/javascript" src="/this/vendor/fancybox2.1.3/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="/this/vendor/fancybox2.1.3/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/this/vendor/fancybox2.1.3/jquery.fancybox.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="/this/vendor/fancybox2.1.3/helpers/jquery.fancybox-buttons.css"/>
<script type="text/javascript" src="/this/vendor/fancybox2.1.3/helpers/jquery.fancybox-buttons.js"></script>
<link rel="stylesheet" type="text/css" href="/this/vendor/fancybox2.1.3/helpers/jquery.fancybox-thumbs.css"/>
<script type="text/javascript" src="/this/vendor/fancybox2.1.3/helpers/jquery.fancybox-thumbs.js"></script>

<script type="text/javascript" src="/this/vendor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('content',
        {
            extraPlugins:'autogrow',
            autoGrow_maxHeight:800,
            removePlugins:'resize'
        });
</script>

<script type="text/javascript">
    $(window).load(function () {
        $('a.foto').fancybox({
            prevEffect:'none',
            nextEffect:'none',

            closeBtn:true,
            arrows:false,
            nextClick:true,

            helpers:{
                thumbs:{
                    width:50,
                    height:50
                }
            }
        });
    });
</script>
