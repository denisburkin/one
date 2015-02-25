<?php
class Model_Photo extends ORM
{
    protected $_has_many = array(
        'trees'	=> array(
            'model'       => 'tree',
            'foreign_key' => 'id',
        )
    );
}