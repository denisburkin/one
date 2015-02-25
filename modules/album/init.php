<?php defined('SYSPATH') or die('No direct script access.');

Route::set('album', 'album(/<action>)(/<id>)(/<id2>)',
	array(
	    'id' 	=> '[0-9]+',
		'id2' 	=> '[0-9]+',
    ))
	->defaults(array(
		'controller' => 'album',
		'action'     => 'page',
		'id'      => '1',
	));

