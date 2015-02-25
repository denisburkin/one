<fieldset>
    <legend>
        <a href="/admin/album/addtext/<?=Request::initial()->param('id')?>" class="btn btn-success" style="float: right;"><i class="icon-plus-sign icon-white"></i> Добавить описание</a>

        <a href="/admin/album" class="btn btn-info" style="float: right; margin-right:20px;"><i class=" icon-arrow-left icon-white"></i> Назад</a>
        Фотографии
    </legend>
</fieldset>


    
<form id="upload" method="post" action="/admin/album/upload/<?=Request::initial()->param('id');?>" enctype="multipart/form-data">
    <div id="drop">
        Переместите файлы сюда
        <a>Обзор</a>
        <input type="file" name="upl" multiple />
    </div>

    <ul>

        <!-- The file uploads will be shown here -->
    </ul>

</form>

        


<form action="/admin/album" method="POST" name="myform" id="myform">


    <ul class="sortable grid" id="sortable" style="margin:0;">

        <? foreach ($table as $photo): ?>

            <li draggable="true" id="photo_<?= $photo->id ?>" class="img" >

            <?=
            ((file_exists('./public/album/' . $photo->album_id . '/' . $photo->id . '.jpg') ?
                "<div   style='width: 125px;height:125px; background-image: url(/public/album/"  . $photo->album_id . '/' . $photo->id . ".jpg ); background-size:cover; ' ></div> " : "<video style='width: 100px;height: 100px;' >
     <source src='/public/tour/" . $photo->id . ".mp4' type='video/mp4; codecs='avc1.42E01E, mp4a.40.2'/>
     </video> "))?>

                <input type="checkbox" class="check" value="<?= $photo->id ?>" name="delete[<?= $photo->id ?>]" style="display:inline-block; margin-left: -100px; margin-top:-68px; "/>
                <input type="hidden" value="<?= $photo->id ?>" name="update[<?= $photo->id ?>]" style="display: inline-block; top: 0px; right: 3px; "/></li>
        <? endforeach; ?>



    </ul>


    <input type="hidden" name="album_id" value="<?=Request::initial()->param('id');?>"/>

</form>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Удаление фотографий</h3>
    </div>
    <div class="modal-body">
        <p>Вы уверены, что хотите удалить фото, безвозвратно ?</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="b_delete" aria-hidden="true">Да</a>
        <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Отмена</a>
    </div>
</div>





<div style="clear: both; display:inline-block; margin-top:3%; margin-bottom: 50px">
    <a href="#myModal" role="button" class="btn btn-danger" data-toggle="modal">Удалить фотографии</a>
</div>
<div style="clear: both; display:inline-block; margin-left: 5%;">
    <a href="#select_all" class="btn btn-primary" id="b_select" rel="b_select" >Выделить все</a>
</div>
<div style="clear: both; display:inline-block; margin-left:5%;">
    <a href="#select_none" class="btn btn-primary" id="b_select" rel="b_select" >Снять выделение</a>
</div>
<script type="text/javascript">
    $(document).ready( function() {

        $("a[href='#select_all']").click( function() {

            $('.check:enabled').attr('checked', true);

            return false;
        });


        $("a[href='#select_none']").click( function() {
            $('.check:enabled').attr('checked', false);

            return false;
        });
    });
</script>
<!-- JavaScript Includes -->
        <link rel="stylesheet" href="/this/css/dragdropgallery.css"/>
    
        <script src="/this/vendor/fileupl/jquery.knob.js"></script>

        <!-- jQuery File Upload Dependencies -->
        <script src="/this/vendor/fileupl/jquery.ui.widget.js"></script>
        <script src="/this/vendor/fileupl/jquery.iframe-transport.js"></script>
        <script src="/this/vendor/fileupl/jquery.fileupload.js"></script>

        <!-- Our main JS file -->
        <script src="/this/vendor/fileupl/script.js"></script>



<script type="text/javascript" src="/this/vendor/jquery.sortable.js"></script>

<script type="text/javascript">


        $("#b_delete").click(function () {

            $.ajax({
                type:"POST",
                url:"/admin/album/delete",
                data:$('#myform').serialize(),
                success:function (msg) {
                    if (msg == 'ok') {


                        $(".check:checked").each( function( i, field ) {
                            if (field.name != 'album_id') {
                                $('#photo_' + field.value).remove();
                            }
                        });

                    } else {
                        alert(msg)
                    }
                }
            });
            $('#myModal').modal('toggle');
            return false;
        })

</script>