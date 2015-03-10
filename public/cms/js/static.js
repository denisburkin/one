/**
 * Created with JetBrains PhpStorm.
 * User: Igor
 * Date: 31.01.14
 * Time: 15:07
 * To change this template use File | Settings | File Templates.
 */
$.cash = [];
$(document).ready(function(){
//    $(document).ajaxStart(function() {
//        $(".loader").show();
//    });
//    $(document).ajaxComplete(function() {
//        $(".loader").hide();
//    });
    $("#menu_btn").bind("click", menu_open);
    $(".catalog_link").bind("click", catalog_load);
    $(".edit").click(edit);
    $(".delete").click(catalog_delete_confirm);
    $(".save").click(save);
    $(".cancel").click(cancel);
    $('.langTab').bind('click', select_lang);
    $(".catalog_link:first").click();
    $('#create_catalog').keypress(function (e) {
        if (e.which == 13 && $(this).val() != '') {
            catalog_create()
        }
    });
    $(".custom-glyphicon-enter img").bind("click", catalog_create);
    $('#cat_del_confirm').on('hidden.bs.modal', function (e) {
        $("#cat_del_confirm .confirm").data("id", "").unbind("click", catalog_delete);
    });
    $('#mat_del_confirm').on('hidden.bs.modal', function (e) {
        $("#material_to_delete").html("");
        $("#mat_del_confirm .confirm").data("id", "").unbind("click", material_delete);
    });
    //setTimeout(function(){$("#materials .block:first").click();}, 750);
    $("#material_new").bind("click", material_new);
    $("#material_save").bind("click", material_save);
    $("#material_delete").bind("click", material_delete_confirm);
    $("#material_search").keyup(function(){delay(search, 500)});
})

function search()
{
    var $html = "";
    var $val = encodeURIComponent($("#material_search").val());
    var $id = $("#catalogs .active").data("id");
    $.post("/admin/static/materials_search", "id="+$id+"&key="+$val, function(data){
        $.each($.parseJSON(data), function(key, material){
            $html += '<div class="block" data-id="'+material['id']+'" id="material_'+material['id']+'"><div class="header">'+material['title']+'</div><div class="date">&nbsp;'+material['dates_update']+'</div><div class="short_content">'+material['content']+'</div></div>';
        });
        $("#materials .dynamic_section").html($html);
        $("#materials .block").bind("click", material_edit);
    });
}
var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();
function catalog_create()
{
    $.post("/admin/static/catalog_edit", "name="+$('#create_catalog').val(), function(){
        $('#create_catalog').val('');
        catalog_update();
    });
}
function catalog_update()
{
    $.getJSON("/admin/static/catalog_update", function(data){
        var $id = $("#catalogs .active").data("id");
        var $html = "";
        $.each(data, function(key, catalog){
            $html += '<div class="block" id="block_'+catalog['id']+'" data-id="'+catalog['id']+'"><table cellspacing="0" cellpadding="0" border="0"><tr><td class="text"><a class="catalog_link" data-id="'+catalog['id']+'"><p>'+catalog['name']+'</p><input type="text" class="form-control"></a></td><td class="icon-edit"><a class="save" data-id="'+catalog['id']+'"><span class="glyphicon glyphicon-ok"></span></a></td><td class="icon-edit"><a class="cancel" data-id="'+catalog['id']+'"><span class="glyphicon glyphicon-remove"></span></a></td><td class="icon-add"><a class="edit" data-id="'+catalog['id']+'"><span class="glyphicon glyphicon-pencil"></span></a></td><td class="icon-add"><a class="delete" data-id="'+catalog['id']+'"><span class="glyphicon glyphicon-trash"></span></a></td></tr></table></div>';
        });
        $("#catalogs .dynamic_section").html($html);
        $(".catalog_link").bind("click", catalog_load);
        $(".edit").click(edit);
        $(".delete").click(catalog_delete_confirm);
        $(".save").click(save);
        $(".cancel").click(cancel);
        $("#block_"+$id).addClass("active");
        $("#block_"+$id+" .catalog_link").unbind("click", catalog_load);
    });
}
function edit()
{
    var $id = $(this).data("id");
    var $content = $("#block_"+$id+" .text p").html();
    $("#block_"+$id+" .text input").val($content);
    edit_on($id);
}
function catalog_delete_confirm()
{
    var $id = $(this).data("id");
    $("#cat_del_confirm .confirm").data("id", $id).bind("click", catalog_delete);
    $("#cat_del_confirm").modal("show");
}
function catalog_delete()
{
    var $id = $(this).data("id");
    $("#cat_del_confirm").modal("hide");
    $.post("/admin/static/catalog_delete", "id="+$id, function(data){
        document.getElementById("block_"+$id).remove();
        $("#catalogs .block:first .catalog_link").click();
    });
}
function cancel()
{
    var $id = $(this).data("id");
    edit_off($id);
}
function save()
{
    var $id = $(this).data("id");
    var $content = $("#block_"+$id+" .text input").val();
    if($("#block_"+$id+" .text p").html() != $content)
    {
        $.post("/admin/static/catalog_edit", "id="+$id+"&name="+$content, function(){
            $("#block_"+$id+" .text p").html($content);
        });
    }
    edit_off($id);
}
function edit_on(id)
{
    $("#block_"+id).addClass("edit");
}
function edit_off(id)
{
    $("#block_"+id).removeClass("edit");
}
function material_edit_on()
{
    $("#material_save").addClass("edit");
    $("#material_delete").addClass("edit");
}
function material_edit_off()
{
    $("#material_save").removeClass("edit");
    $("#material_delete").removeClass("edit");
}
function catalog_load()
{
    var $id = $(this).data("id");
    if(typeof($.cash[$id]) == "undefined")
    {
        materials_load($id);
    }
    else
    {
        catalog_output($id);
    }
}
function catalog_output(id, current)
{
    var $html = "";
    current = typeof current !== 'undefined' ? current : null;
    $.each($.cash[id], function(key, material){
        $html += '<div class="block" data-id="'+material['id']+'" id="material_'+material['id']+'"><div class="header">'+material['title']+'</div><div class="date">&nbsp;'+material['dates_update']+'</div><div class="short_content">'+material['content']+'</div></div>';
    });
    if(current == null)
    {
        var $active = $("#catalogs .block.active").data("id");
        $("#block_"+$active+" .catalog_link").bind("click", catalog_load);
        edit_off($active);
        $("#block_"+$active).removeClass("active");
        material_edit_off();
        $("#material_new").removeClass("edit");
        $("#block_"+id).addClass("active");
        $("#block_"+id+" .catalog_link").unbind("click", catalog_load);
        $("#materials .dynamic_section").html($html);
        $("#materials .block").bind("click", material_edit);
        $("#materials .block:first").click();
        $("#material_new").addClass("edit");
    }
    else
    {
        $("#materials .dynamic_section").html($html);
        $("#materials .block").bind("click", material_edit);
        $("#material_"+current).click();
    }
}
function materials_load(id, current)
{
    current = typeof current !== 'undefined' ? current : null;

//	Ajax("/admin/static/materials_load",
//		{
//			dataType: 'json',
//			data: {},
//			done    : function (data){
//				$.cash[id] = $.parseJSON(data);
//				catalog_output(id, current);
//			}
//		}
//	);

    $.post("/admin/static/materials_load", "id="+id, function(data){
        $.cash[id] = $.parseJSON(data);
        catalog_output(id, current);
    });
}

function select_lang(){
    $id = $(this).data('id');
    if($id==''){
        $('#main_content .active.in').removeClass('in');
        setTimeout(function(){
            $('#main_content .active').removeClass('active');
            $('#title').addClass('active').addClass('in');
            $('#cke_content').addClass('active').addClass('in');
            $(window).resize();
        }, 150);
    }
    else{
        $('#main_content .active.in').removeClass('in');
        setTimeout(function(){
            $('#main_content .active').removeClass('active');
            $('#title'+$id).addClass('active').addClass('in');
            $('#cke_content'+$id).addClass('active').addClass('in');
            $(window).resize();
        }, 150);
    }
}
function material_edit()
{
    var $id = $(this).data("id");
    var $tree = $("#catalogs .block.active").data("id");
    var $html = "";
    $.post("/admin/static/material_load", "id="+$id+"&tree_id="+$tree, function(data){
        material_edit_off();
        data= $.parseJSON(data);
        if(data.length > 4)
        {
            $html += '<table cellspacing="0" cellpadding="0" border="0" style="width: 100%"><tr><td>';
            $html += data[0];
            $html += data[2];
            $html += '</td><td class="langTd"><img class="langTab" data-id="" src="/public/cms/img/ru.jpg"></td><td class="langTd"><img class="langTab" data-id="_en" src="/public/cms/img/en.jpg"></td><td class="configTd"><a id="config_btn"><span class="glyphicon glyphicon-cog"></span></a></td></tr></table>';
        }
        else
        {
            $html += '<table cellspacing="0" cellpadding="0" border="0" style="width: 100%"><tr><td>';
            $html += data[0];
            $html += data[2];
            $html += '</td><td class="langTd"><img class="langTab" data-id="" src="/public/cms/img/ru.jpg"></td><td class="langTd"><img class="langTab" data-id="_en" src="/public/cms/img/en.jpg"></td></tr></table>';
        }
        $html += '<hr>' + data[1] + data[3];
        if(data.length > 4)
        {
            $html += '<div id="config"><h3>Дополнительные параметры</h3><hr>';
            for(var $i=4; $i < data.length; $i++)
            {
                $html += data[$i];
            }
            $html += '</div>';
        }
        $("#materials .active").bind("click", material_edit).removeClass('active');
        $("#material_"+$id).unbind("click", material_edit).addClass('active');
        $("#material_save").data("id", $id);
        $("#material_delete").data("id", $id);
        $("#main_content form").html($html);
        $('.langTab').bind('click', select_lang);
        if(data.length > 4)
        {
            $("#config_btn").bind("click", config_open);
            $("input[type=file]").change(photo_save);
            $('input[type=file]').bootstrapFileInput();
        }
        setTimeout(function(){$(window).resize();}, 200);
        setTimeout(function(){
            $("#cke_content_en").addClass('tab');
            $("#cke_content").addClass('tab').addClass('active').addClass('in');
        }, 200);
        material_edit_on();
    })
}
function material_new()
{
    material_edit();
    $("#material_save").data("id", null);
}
function material_save()
{
    var $id = $(this).data("id");
    var $tree = $("#catalogs .block.active").data("id");
    serialize();
    $.post("/admin/static/material_edit", "id="+$id+"&tree_id="+$tree+"&"+$("#myform").serialize(), function(data){
        materials_load($tree, $id);
    });
}
function photo_save()
{
    /*if($("#materials .block.active").length){
        var $id = $("#materials .block.active").data("id");
    }
    else{
        $("#material_save").click();
        while(!$("#materials .block.active").length){}
        $("#config_btn").click();
        var $id = $("#materials .block.active").data("id");
    }*/
    var $id = $("#materials .block.active").data("id");
    var $tree = $("#catalogs .block.active").data("id");
    var $input_id = $(this).attr("id");
    var form = document.getElementById("myform");
    var fd = new FormData();
    fd.append('id', $id);
    fd.append('tree_id', $tree);
    fd.append('input', $input_id);
    fd.append($input_id, document.getElementById($input_id).files[0]);
    $.ajax({
        type: 'POST',
        url: '/admin/static/photo_save',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            $("#control_"+$input_id).find(".help-block:first").html("<img src='/public/static/"+$id+".jpg?"+new Date().getTime()+"' width='150' align='left' /><a id='delete_photo_"+$id+"' class='btn' data-id='"+$id+"'>удалить</a>");
            $('#delete_photo_'+$id).bind('click', delete_photo);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}
function material_delete_confirm()
{
    var $id = $(this).data("id");
    $("#material_to_delete").html($("#materials .active .header").html());
    $("#mat_del_confirm .confirm").data("id", $id).bind("click", material_delete);
    $("#mat_del_confirm").modal("show");
}
function material_delete()
{
    var $id = $(this).data("id");
    $("#mat_del_confirm").modal("hide");
    var $tree = $("#catalogs .block.active").data("id");
    $.post("/admin/static/material_delete", "id="+$id, function(data){
        materials_load($tree);
    });
}
function delete_photo()
{
    var $id = $(this).data("id");
    $.post("/admin/static/delete_photo", "id="+$id, function(data){
        $("#delete_photo_"+$id).parent(".help-block").html("");
    });
}
function config_open()
{
    $("#config").css("left", "+="+$("#config").outerWidth());
    $("#config_btn").unbind("click", config_open);
    setTimeout(function(){$("#config_btn").bind("click", config_close);}, 1000);
}
function config_close()
{
    $("#config").css("left", "-="+$("#config").outerWidth());
    $("#config_btn").unbind("click", config_close);
    setTimeout(function(){$("#config_btn").bind("click", config_open);}, 1000);
}
function menu_open()
{
    $("#menu").css("top", $("#header").outerHeight());
    $("#menu_btn").unbind("click", menu_open);
    setTimeout(function(){$("#menu_btn").bind("click", menu_close);}, 750);
}
function menu_close()
{
    $("#menu").css("top", $("#header").outerHeight()-$("#menu").outerHeight()-20);
    $("#menu_btn").unbind("click", menu_close);
    setTimeout(function(){$("#menu_btn").bind("click", menu_open);}, 750);
}
window.onresize = function () {
    $("#cke_content .cke_contents").css({"height": window.innerHeight - $("#header").outerHeight() -  $("#title").outerHeight() - 9 - $("#cke_content .cke_top").outerHeight() - 8});
    $("#cke_content_en .cke_contents").css({"height": window.innerHeight - $("#header").outerHeight() -  $("#title").outerHeight() - 9 - $("#cke_content_en .cke_top").outerHeight() - 8});
}
function serialize()
{
    var editor1 = CKEDITOR.instances.content_en;
    var editor = CKEDITOR.instances.content;
    $("#content").val(editor.getData());
    $("#content_en").val(editor1.getData());
}