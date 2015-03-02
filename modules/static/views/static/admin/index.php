<div class="modal fade" id="cat_del_confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Подтверждение удаления</h3>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить категорию и материалы в ней?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirm">Да</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="mat_del_confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Подтверждение удаления</h3>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить "<span id="material_to_delete"></span>"?</p>
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
    <div id="menu_btn" data-id="1">
        <table cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td class="icon">
                </td>
                <td class="text">
                    <p>Материалы</p>
                </td>
            </tr>
        </table>
    </div>
    <div id="header_content">
        <div class="block" id="material_new"><span class="glyphicon glyphicon-custom"><img src="/public/cms/img/add.png"></span><div class="text">Новый</div></div>
        <div class="block" id="material_save"><span class="glyphicon glyphicon-custom"><img src="/public/cms/img/ok.png"></span><div class="text">Сохранить</div></div>
        <div class="block" id="material_delete"><span class="glyphicon glyphicon-custom"><img src="/public/cms/img/del.png"></span><div class="text">Удалить</div></div>
      <a href="/ru/logout"><div class="block logout"><span class="glyphicon glyphicon-custom"><img src="/public/cms/img/logout.png"></span><div class="text">Выход</div></div></a>
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
    <div id="timer">
        <p>Хостинг оплачен до</p>
        <p><b>8 сентября</b></p>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                <span class="sr-only">60% Complete</span>
            </div>
        </div>
        <button type="button" class="btn btn-default">Продлить</button>
    </div>
    <div id="catalogs">
        <div class="block_">
            <div class="input-group">
                <input id="create_catalog" type="text" class="form-control" placeholder="Создать раздел">
                <span class="input-group-addon glyphicon custom-glyphicon-enter"><img src="/public/cms/img/enter.png"></span>
            </div>
        </div>
        <div class="dynamic_section">
            <?foreach($tree as $tr){?>
            <div class="block" id="block_<?=$tr->id?>" data-id="<?=$tr->id?>">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td class="text">
                            <a class="catalog_link" data-id="<?=$tr->id?>"><p><?=$tr->name?></p><input type="text" class="form-control"></a>
                        </td>
                        <td class="icon-edit">
                            <a class="save" data-id="<?=$tr->id?>"><span class="glyphicon flaticon"><img src="/public/cms/img/check13.png"></span></a>
                        </td>
                        <td class="icon-edit">
                            <a class="cancel" data-id="<?=$tr->id?>"><span class="glyphicon flaticon"><img src="/public/cms/img/close11.png"></span></a>
                        </td>
                        <td class="icon-add">
                            <a class="edit" data-id="<?=$tr->id?>"><span class="glyphicon flaticon"><img src="/public/cms/img/note6.png"></span></a>
                        </td>
                        <td class="icon-add">
                            <a class="delete" data-id="<?=$tr->id?>"><span class="glyphicon flaticon"><img src="/public/cms/img/waste2.png"></span></a>
                        </td>
                    </tr>
                </table>
            </div>
            <?}?>
        </div>
    </div>
    <div id="materials">
        <div class="block_">
            <div class="input-group">
                <input id="material_search" type="text" class="form-control" placeholder="Поиск">
                <span class="input-group-addon glyphicon glyphicon-search"></span>
            </div>
        </div>
        <div class="dynamic_section">
        </div>
    </div>
    <div id="main_content">
        <form method="post" id="myform" enctype="multipart/form-data">
        </form>
    </div>
</div>

<!--<script src="http://timschlechter.github.io/bootstrap-tagsinput/examples/bower_components/typeahead.js/dist/typeah	ead.min.js"></script>-->


<link href="/public/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
<link href="/public/vendor/datepicker3/css/datepicker3.css" rel="stylesheet" type="text/css"/>
<script src="/public/vendor/datepicker3/js/bootstrap-datepicker.js"></script>
<script src="/public/vendor/datepicker3/js/locales/bootstrap-datepicker.ru.js"></script>
<script src="/public/vendor/typeahead.0.9.3.min.js"></script>
<script src="/public/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="/public/vendor/ckeditor/ckeditor.js"></script>
<script src="/public/cms/js/bootstrap.file-input.js" type="text/javascript"></script>
<script src="/public/cms/js/static.js" type="text/javascript"></script>