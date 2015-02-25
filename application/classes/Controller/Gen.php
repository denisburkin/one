<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Gen extends Keytech
{
	public $layout = 1;
	public function action_index()
	{
		die(Auth::instance()->hash('new_gen'));
	}
}
