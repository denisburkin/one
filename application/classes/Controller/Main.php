<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Main extends Keytech
{
//	public $auth_required = true;
	public $layout = 1;

	public function action_index()
	{

		$this->layout = 1;
		$this->title        = '';
		$this->view         = 'main/index';
		$this->data['main'] = '1';
		$this->data['news'] = ORM::factory('Static')->where('tree_id','=','209')->and_where('view','=','0')->order_by('id', 'DESC')->limit(4)->find_all();

	}
}
