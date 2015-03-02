function upload_init(){
    var ul = $('#upload ul');
    $('#drop a').click(function(){
        $(this).parent().find('input').click();
    });
    $('#upload').fileupload({
        dropZone: $('#drop'),
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true,
        add: function (e, data) {
            var tpl = $('<li id="'+data.files[0].name+data.files[0].size+'" class="working" data-img="'+URL.createObjectURL(data.files[0])+ '"><input type="text" value="0" data-width="48" data-height="48"'+
                ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');
            tpl.find('p').text(data.files[0].name).append('<i>' + formatFileSize(data.files[0].size) + '</i>' );
            data.context = tpl.appendTo(ul);
            tpl.find('input').knob();
            tpl.find('span').click(function(){
                if(tpl.hasClass('working')){
                    jqXHR.abort();
                }
                tpl.fadeOut(function(){
                    tpl.remove();
                });
            });
            var jqXHR = data.submit();
        },
        progress: function(e, data){
            var progress = parseInt(data.loaded / data.total * 100, 10);
            data.context.find('input').val(progress).change();
            if(progress == 100){
                data.context.removeClass('working');
                data.context.children('div:first').append('<div style="background-image:url(\''+data.context.data('img')+'\')"></div>');
            }
        },
        fail:function(e, data){
            data.context.addClass('error');
        },
        done: function (e, data) {
            var ids = data.result.split('/');
            $("#sortable").prepend('<li draggable="true" id="photo_'+ids[1]+'" class="img">'
                +'<div class="photo" style="background-image: url(\'/public/album/'  + ids[0] + '/' + ids[1] + '.jpg\');"></div>'
                +'<input type="checkbox" class="check" value="'+ids[1]+'" name="delete['+ids[1]+']" style="display:none;"/>'
                +'<input type="hidden" value="'+ids[1]+'" name="update['+ids[1]+']" style="display: inline-block; top: 0px; right: 3px; "/>'
                +'<div class="title_block" id="title_'+ids[1]+'">'
                + '<table cellspacing="0" cellpadding="0" border="0">'
                + '<tr>'
                + '<td class="text">'
                + '<p class="title_name">Введите название</p><input type="text" class="title_input">'
                + '</td>'
                + '<td class="img-edit">'
                + '<a class="title_save" data-photoid="'+ids[1]+'"><span class="glyphicon flaticon"><img src="/public/cms/img/check13.png"></span></a>'
                + '</td>'
                + '<td class="img-edit">'
                + '<a class="title_cancel" data-photoid="'+ids[1]+'"><span class="glyphicon flaticon"><img src="/public/cms/img/close11.png"></span></a>'
                + '</td>'
                + '<td class="img-add">'
                + '<a class="title_edit" data-photoid="'+ids[1]+'"><span class="glyphicon flaticon"><img src="/public/cms/img/note6.png"></span></a>'
                + '</td>'
                + '</tr>'
                + '</table>'
                + ' </div></li>');
            $('.sortable').unbind('sortupdate', sort);
            $('.sortable').sortable('destroy');
            $('.sortable').sortable().bind('sortupdate', sort);
            sort();
            $(window).resize();
            checkbox1();
            $("#title_save a").click(save_photo);
            $("#title_cancel a").click(title_cancel);
            $("#title_edit a").click(edit_title);
            document.getElementById(data.files[0].name+data.files[0].size).remove();
        }
    });
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }
        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }
        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }
        return (bytes / 1000).toFixed(2) + ' KB';
    }
};