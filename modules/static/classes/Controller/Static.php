<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Static extends Keytech
{
	public $view = 'static/view';
	public $template = 'themes/ds/layout';
	public $layout = 1;

	public function action_index()
	{
		$static = ORM::factory('Static')
					 ->where('url', '=', (($this->request->param('path')) ? $this->request->param('path') : 'index'))
					 ->find();


		if (empty($static))
		{
			throw new HTTP_Exception_404('Error 404');
		}

		$this->layout         = ( ($config = Kohana::$config->load('static.' . $static->tree_id . '.layout') ) ? $config : 1);
		$this->title          = (empty($static->titleseo)) ? $static->title : $static->titleseo;
		$this->keywords       = $static->keywords;
		$this->description    = $static->description;
		$this->data['static'] = $static;
	}
}
