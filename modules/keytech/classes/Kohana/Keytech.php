<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by KeyTech.
 * Developer: DenisBurkin
 * Date: 03.12.11
 * Time: 2:23
 * Основной контроллер | вкл. авторизацию.
 */
class Kohana_Keytech extends Controller
{
	/*
	*	Параметры контроллера Администратора по умолчанию
	*/
	public $template = 'themes/admin/layout';
	public $view = 'themes/admin/index';

	/*
	 * Заголовок
	 */
	public $title = 'Ключевая технология';
	public $description = '';
	public $keywords = '';
	public $layout = FALSE;
	public $data = array();

	public $auth_required = FALSE;
	public $secure_actions = FALSE;

	/*
	 * Включючение проверки авторизации
	 */
	public $admin_controller = FALSE;

	public function before()
	{
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Datum aus Vergangenheit
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", FALSE);
		header("Pragma: no-cache");

		$lng = Request::instance()->param( 'lang' );

		i18n::$lang = $lng . '-' . $lng;
//		$ulogin = Ulogin::factory();

//		if (!$ulogin->mode())
//		{
//			$this->data['ulogin'] = $ulogin->render();
//		}
//		else
//		{
//			try
//			{
//				$ulogin->login();
//			} catch (ORM_Validation_Exception $e)
//			{
//				$this->data['ulogin_errors'] = $e->errors('');
//			}
//		}

		$action_name = Request::current()->action();

		if (($this->auth_required !== FALSE && Auth::instance()->logged_in($this->auth_required) === FALSE)
//			||
//			(is_array($this->secure_actions)
//			&& array_key_exists($action_name, $this->secure_actions)
//			&& Auth::instance()->logged_in($this->secure_actions[$action_name]) === FALSE)
		)
		{
			if (Auth::instance()->logged_in())
			{
				Request::initial()->redirect('ru/user/noaccess', 301);
			}
			else
			{
				if ($_SERVER['REQUEST_URI'] != 'ru/login')
				{
					$session = Session::instance();
					$session->set('auth_redirect', $_SERVER['REQUEST_URI']);
				}

				HTTP::redirect('ru/login');
			}
		}

		/*
		 * Проверка авторизации
		 */
		/*		if ($this->admin_controller AND Auth::instance()->logged_in() == FALSE)
				{
					if ($_SERVER['REQUEST_URI'] != '/login')
					{
						$session = Session::instance();
						$session->set('auth_redirect', $_SERVER['REQUEST_URI']);
						Request::initial()->redirect('/login');
					}
				}

		*/

		$this->data['config'] = Kohana::$config->load('keytech');

		View::bind_global('title', $this->title);
		View::bind_global('keywords', $this->keywords);
		View::bind_global('description', $this->description);
		View::bind_global('config', $this->data['config']);

		define('lang',  $lng);

		parent::before();
	}
	public function action_login()
	{

		$this->layout = 3;
		$this->view = 'keytech/loginin';

		if (Auth::instance()->logged_in() == TRUE)
		{
			Request::initial()->redirect('/admin');
		}

		if (isset($_POST['btnsubmit']))
		{
			$login    = Arr::get($_POST, 'login', '');
			$password = Arr::get($_POST, 'password', '');

			if (Auth::instance()->login($login, $password))
			{

				$session       = Session::instance();
				$auth_redirect = $session->get('auth_redirect', '');

				die($auth_redirect);

				$session->delete('auth_redirect');

				Request::initial()->redirect($auth_redirect);
			}
			else
			{
				$this->data["error"] = TRUE;
			}
		}
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		Request::initial()->redirect('/');
	}

	public function after()
	{
		$this->keywords          = (empty($this->keywords)) ? str_replace(' ', ', ', $this->title) : $this->keywords;
		$this->description       = (empty($this->description)) ? $this->title : $this->description;

		/*
		 * Template
		 */
		$this->template          = new View( ($this->layout ? $this->data['config']['layout'][$this->layout] : 'keytech/layout') , $this->data);
		$this->template->content = new View($this->view, $this->data);

		/*
		 * Render
		*/
		$this->response->body($this->template->render());

		parent::after();
	}
}
