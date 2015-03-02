<div class="modal fade" id="cat_del_confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Подтверждение удаления</h3>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить категорию и изображения в ней?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirm">Да</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="mat_del_confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Подтверждение удаления</h3>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить выделенные изображения?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirm">Да</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="header">
    <!--<div id="logo">
        <img src="/this/img/turbion.png">
    </div>-->
    <div id="menu_btn">
        <table cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td class="icon">
                </td>
                <td class="text">
                    <p>Галерея</p>
                </td>
            </tr>
        </table>
    </div>

    <div id="header_content">
        <div class="block check1"><span class="glyphicon glyphicon-custom"><img src="/public/cms/img/check_all.png"></span>
            <div class="text">Выделить всё</div>
        </div>
        <div class="block uncheck"><span class="glyphicon glyphicon-custom"><img src="/public/cms/img/uncheck.png"></span>
            <div class="text">Снять выделение</div>
        </div>
        <div class="block deletephoto"><span class="glyphicon glyphicon-custom"><img src="/public/cms/img/del.png"></span>
            <div class="text">Удалить выделенное</div>
        </div>
    </div>
</div>
<div id="menu">
    <a href="/admin/static"><div class="block">
            <p><span class="glyphicon glyphicon-menu"><img src="/public/cms/img/static.png"></span>Материалы</p>
        </div></a>
    <a href="/admin/album"><div class="block">
            <p><span class="glyphicon glyphicon-menu"><img src="/public/cms/img/album.png"></span>Галерея</p>
    </div></a>
</div>
<div id="main">
    <div id="catalogs">
        <div class="block_">
            <div class="input-group">
                <input id="create_catalog" type="text" class="form-control" placeholder="Создать раздел">
                <span class="input-group-addon glyphicon custom-glyphicon-enter"><img src="/public/cms/img/enter.png"></span>
            </div>
        </div>
        <div class="dynamic_section">
            <?foreach ($tree as $tr) {
                $photo = ORM::factory('Photo')->where('tree_id', '=', $tr->id)->where('sorts', '=', '1')->find();?>
                <div class="block" id="block_<?= $tr->id ?>" data-id="<?= $tr->id ?>">
                    <div class="inner_block" style="background-image:url('/public/album/<?= $tr->id ?>/<?=$photo->id?>.jpg')">
                        <div class="text">
                            <a class="catalog_link" data-id="<?= $tr->id ?>">
                                <p class="title"><?=$tr->name?></p>
                                <input type="text" id="control" class="form-control">
                            </a>
                        </div>
                        <div class="icon-edit">
                            <a class="save" data-id="<?= $tr->id ?>">Сохранить</a>
                        </div>
                        <div class="icon-edit">
                            <a class="cancel" data-id="<?= $tr->id ?>">Отменить</a>
                        </div>
                        <div class="icon-add">
                            <a class="edit" data-id="<?= $tr->id ?>">Редактировать</a>
                        </div>
                        <div class="icon-add">
                            <a class="delete" data-id="<?= $tr->id ?>">Удалить</a>
                        </div>
                    </div>
                </div>

            <? }?>
        </div>
    </div>
    <div id="main_content">
    </div>
</div>

<!-- jQuery File Upload Dependencies -->
<script src="/public/vendor/fileupl/jquery.ui.widget.js"></script>
<script src="/public/vendor/fileupl/jquery.iframe-transport.js"></script>
<script src="/public/vendor/fileupl/jquery.fileupload.js"></script>

<!-- JavaScript Includes -->
<link rel="stylesheet" href="/public/css/admin/album.css"/>

<script src="/public/vendor/fileupl/jquery.knob.js"></script>


<!-- Our main JS file -->
<script src="/public/vendor/fileupl/upload.js"></script>
<script type="text/javascript" src="/public/vendor/blur.js"></script>


<script type="text/javascript" src="/public/vendor/jquery.sortable.min.js"></script>
<script src="/public/cms/js/album.js"></script>




