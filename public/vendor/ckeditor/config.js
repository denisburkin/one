/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.language = 'ru';
    config.uiColor = "#EFEFEF";
    config.toolbar = [
        ['Undo', 'Redo'],
        [ 'Bold', 'Italic', 'Underline', 'RemoveFormat' ],
        ['StrikeThrough', 'NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'Outdent', 'Indent'],
        ['Image', 'Table', 'Link', 'Unlink', 'Flash'],
        ['PasteText', 'PasteFromWord', 'Replace'],
	    { name: 'styles', items: [ 'Font', 'FontSize' , 'TextColor' ] },
        [ 'Source'],
        [ 'Maximize']
    ];
	config.removePlugins = 'resize,elementspath';
	config.extraAllowedContent = 'iframe[*]'
	config.allowedContent = true;
	config.extraPlugins = 'iframe';
	config.filebrowserBrowseUrl = '/public/vendor/elfinder/elfinder.html?mode=file';
	config.filebrowserImageBrowseUrl = '/public/vendor/elfinder/elfinder.html?mode=image';
	config.filebrowserFlashBrowseUrl = '/public/vendor/elfinder/elfinder.html?mode=flash';
    config.removePlugins = 'resize,elementspath';
	//config.contentsCss = ['/public/vendor/bootstrap-3.3.2/css/bootstrap.min.css', '/public/css/style.css'];
	config.contentsCss = ['/public/vendor/bootstrap-3.3.2/css/bootstrap.min.css'];

	config.fillEmptyBlocks = true;
	config.forceEnterMode = true;
	config.ignoreEmptyParagraph = true;
	config.autoParagraph = false;
	config.fillEmptyBlocks= "&#8203;";

	//	config.useb = true;
/*
	<link href="/css/bootstrap.min.css" rel="stylesheet">

		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
			<link href="/css/flexslider.css" rel="stylesheet">
				<link href="/css/styles.css" rel="stylesheet">
					<link href="/css/queries.css" rel="stylesheet">
						<link href="/css/animate.css" rel="stylesheet">*/
};
CKEDITOR.dtd.$removeEmpty['i'] = false;
CKEDITOR.dtd.$removeEmpty['span'] = false;
