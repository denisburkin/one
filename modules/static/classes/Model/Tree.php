<?php
class Model_Tree extends ORM
{
	public function rules()
	{
		return array(
			'name' => array(
				array('not_empty'),
			)
		);
	}
}