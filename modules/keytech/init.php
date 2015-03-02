<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виртуальна папка с файлами
 */
/*Route::set('keytech/public', 'admin/public(/<file>)', array('file' => '.+'))
	->defaults(array(
	'controller' => 'keytechmedia',
	'action'     => 'index',
	'file'       => NULL,
));*/


/*
 * Вход и выход
 */
Route::set('keytech/logout', '(<lang>)(/)logout')->defaults(array(
	'controller' => 'keytech',
	'action'     => 'logout'
));

Route::set('keytech/login', '(<lang>)(/)login')->defaults(array(
	'controller' => 'keytech',
	'action'     => 'login'
));

/*
 * Панель администратора
 */
Route::set('keytech/admin', '<directory>(/<controller>(/<action>(/<id>(/<id2>))))', array(
	'directory'  => 'admin',
	'id'         => '[0-9]+'
))->defaults(array(
	'directory'   => 'admin',
	'controller'  => 'static',
	'action'      => 'index',
	'id'          => '0',
	'id2'         => '0'
));
