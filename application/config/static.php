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
        '217' => array(
            'inputs' => array(
                '1'  => array(
                    'form'        => 'input',
                    'id'          => 'url',
                    'placeholder' => 'Адрес страницы..',
                    'static'      => ORM::factory('Static')
                )
            )
        ),
        '209' => array(
            'inputs' => array(
/*                '1' => array(
                    'form'        => 'input_date',
                    'id'          => 'dates',
                    'static'      => ORM::factory('Static')
                ),
                '2'  => array(
                    'form'        => 'input',
                    'id'          => 'url',
                    'placeholder' => 'Адрес страницы..',
                    'static'      => ORM::factory('Static')
                ),*/
/*                '3' => array(
                    'form'        => 'textarea',
                    'id'          => 'description',
                    'placeholder' => 'Краткое описание..',
                    'static'      => ORM::factory('Static')
                ),
                '4'  => array(
                    'form'  => 'input_tag',
                    'id'    => 'tags',
                    'value' => ''
                ),*/
                '5'  => array(
                    'form'   => 'input_file',
                    'id'     => 'image',
                    'static' => ORM::factory('Static'),
                    'help'   => ''
                ),
                '6' => array(
                    'form'   => 'checkbox',
                    'id'     => 'view',
                    'helper' => 'Скрыть',
                    'value'  => '1',
                    'static' => ORM::factory('Static')
                )
            )
        ),
        '197' => array(
            'inputs' => array(
                '1'  => array(
                    'form'        => 'input',
                    'id'          => 'url',
                    'placeholder' => 'Адрес страницы..',
                    'static'      => ORM::factory('Static')
                ),
                '2' => array(
                    'form'        => 'textarea',
                    'id'          => 'description',
                    'placeholder' => 'Краткое описание..',
                    'static'      => ORM::factory('Static')
                ),
                '3' => array(
                    'form'        => 'select',
                    'id'          => 'album',
                    'select_id'   => 'album',
                    'select'      => ORM::factory('Tree')->where('module_id', '=', 2)->find_all(),
                    'static'      => ORM::factory('Static')
                ),
                '6' => array(
                    'form'   => 'checkbox',
                    'id'     => 'complete',
                    'helper' => 'Завершено',
                    'value'  => '1',
                    'static' => ORM::factory('Static')
                ),
                '7' => array(
                    'form'   => 'checkbox',
                    'id'     => 'view',
                    'helper' => 'Скрыть',
                    'value'  => '1',
                    'static' => ORM::factory('Static')
                )
            )
        )
    );