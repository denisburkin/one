<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Igor
 * Date: 10.02.14
 * Time: 3:35
 * To change this template use File | Settings | File Templates.
 */
return
    array(
        '154' => array(
            'layout' => 1,
            'inputs' => array(
//                '1'  => array(
//                    'form'   => 'input_date',
//                    'id'     => 'dates',
//                    'placeholder' => 'Введите дату..',
//                    'static' => ORM::factory('Static'),
//                ),
//                '2'  => array(
//                    'form' => 'input',
//                    'id'          => 'url',
//                    'placeholder' => 'Адрес страницы..',
//                    'static'      => ORM::factory('Static')
//                ),
//                '3'  => array(
//                    'form'  => 'input_tag',
//                    'id'    => 'tags',
//                    'value' => ''
//                ),
                '4'  => array(
                    'form'   => 'input_file',
                    'id'     => 'image',
                    'static' => ORM::factory('Static'),
                    'help'   => ''
                ),
            )
        ),
        '161' => array(
            'inputs' => array(
                '1'  => array(
                    'form' => 'input',
                    'id'          => 'url',
                    'placeholder' => 'Адрес страницы..',
                    'static'      => ORM::factory('Static')
                ),
                '2'  => array(
                    'form'   => 'input_date',
                    'id'     => 'dates',
                    'placeholder' => 'Дата..',
                    'static' => ORM::factory('Static')
                ),
                '3'  => array(
                    'form'   => 'input_file',
                    'id'     => 'image',
                    'static' => ORM::factory('Static'),
                    'help'   => ''
                )
            )
        ),
        '162' => array(
            'inputs' => array(
                '1'  => array(
                    'form'   => 'input_file',
                    'id'     => 'image',
                    'static' => ORM::factory('Static'),
                    'help'   => ''
                )
            )
        ),
        '163' => array(
            'inputs' => array(
                '1'  => array(
                    'form'  => 'input_tag',
                    'id'    => 'tags',
                    'placeholder' => 'Город..',
                    'value' => ''
                )
            )
        ),
        '164' => array(
            'inputs' => array(
                '1'  => array(
                    'form'  => 'input_tag',
                    'id'    => 'tags',
                    'placeholder' => 'Город..',
                    'value' => ''
                )
            )
        )
    );