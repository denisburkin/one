<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Main extends Keytech
{
//	public $auth_required = true;
	public $layout = 1;

	public function action_index()
	{

		$this->layout       = 1;
		$this->title        = '';
		$this->view         = 'main/index';
		$this->data['main'] = '1';
		$this->data['news'] = ORM::factory('Static')
								 ->where('tree_id', '=', '209')
								 ->and_where('view', '=', '0')
								 ->order_by('id', 'DESC')
								 ->limit(4)
								 ->find_all();
	}

	public function action_product()
	{
		$this->layout          = 2;
		$this->title           = 'ПРОДУКЦИЯ И ПРОИЗВОДСТВО';
		$this->view            = 'main/product';
		$this->data['pages']   = ORM::factory('Static')
									->where('tree_id', '=', '218')
									->and_where('view', '=', '0')
									->order_by('id', 'ASC')
									->find_all();
		$this->data['pagesid'] = ($this->request->param('id') > 0) ? $this->request->param('id') : 595;
		$this->data['page']    = ORM::factory('Static', $this->data['pagesid']);
	}

	public function action_area()
	{
		$this->layout = 2;
		$this->title  = 'Район промысла';
		$this->view   = 'main/area';
	}

	public function action_sales()
	{
		$this->layout = 2;
		$this->title  = 'СБЫТ ПРОДУКЦИИ';
		$this->view   = 'main/sales';

		$this->data['page'] = ORM::factory('Static', 598);
	}

	public function action_about()
	{
		$this->layout = 2;
		$this->title  = 'О НАС';
		$this->view   = 'main/about';

		$this->data['page'] = ORM::factory('Static', 599);
	}

	public function action_contact()
	{
		$this->layout        = 2;
		$this->title         = 'КОНТАКТЫ И РЕКВИЗИТЫ';
		$this->view          = 'main/contact';
		$this->data['pages'] = ORM::factory('Static')
								  ->where('tree_id', '=', '219')
								  ->and_where('view', '=', '0')
								  ->order_by('id', 'ASC')
								  ->find_all();
		$this->data['page']  = ORM::factory('Static', 600);
	}

	public function action_send()
	{

		if (isset($_POST) && !empty($_POST) && isset($_POST['ms']) )
		{
			$message_body = "Имя : " . (isset($_POST['email']) ? $_POST['email'] : 'аноним') . "\r\nТелефон : " . $_POST['ms'];
			$headers = "Mime-Version: 1.0\n";
//	$headers .= "Content-Type: text/html; charset=UTF-8";
			$headers .= "From: info@turbion.net";
			$headers = "Mime-Version: 1.0\n";
			$headers .= "Content-Type: text/plain;charset=UTF-8\n";
			$headers .= "From: Turbion <info@turbion.net>";

			mb_send_mail('m@denisburkin.ru', "Заявка - Turbion", $message_body, $headers);
			mb_send_mail('vektorny@yandex.ru', "Заявка - Turbion", $message_body, $headers);

		}

		exit;
	}

}
