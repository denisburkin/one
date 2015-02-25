<?php
/**
 * Created by KeyTech.
 * Developer: DenisBurkin
 * Date: 03.12.11
 * Time: 4:15
 * To change this template use File | Settings | File Templates.
 */
return
	array(
		'menu'  => array(
			'admin' => array(
				'static'=> 'Материалы',
			),
			'top'        => array(
				'Главная' => '/',
				'О нас'   => '/index.html',
			),
		),
		'layout'=> array(
			1 => array(
				'title'            => 'По умолчанию',
				'template'         => 'themes/bootstrap/layout',
			),
			2 => array(
				'title'            => 'Главная',
				'template'         => 'themes/bootstrap/layout_index'
			),
		)
	);