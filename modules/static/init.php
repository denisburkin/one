<?php defined('SYSPATH') or die('No direct script access.');

/*
 * Статичный материал
 */
Route::set('keytech/static', '(<lang>/)<path>.html', array(
	'path' => '[a-zA-Z0-9-_/]+',
))->defaults(array(
	'controller' => 'Static',
	'action'     => 'index'
));

/*
 * Превью материалов
 */
/*Route::set('keytech/images', 'img/<size>/<id>.jpg', array(
	'size' => '('.implode('|', Kohana::$config->load('static.size')).')',
	'id'   => '[0-9]+'
))->defaults(array(
	'controller' => 'Images',
	'action'     => 'index',
	'size'       => '210x85',
	'id'         => '0'
));*/