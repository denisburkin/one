<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by KeyTech.
 * Developer: DenisBurkin
 * Date: 03.12.11
 * Time: 2:23
 * Основной контроллер | вкл. авторизацию.
 */
class Controller_Keytech extends Keytech
{
	public $title         = 'Панель Администратора';
	public $template      = 'keytech/layout';
	public $view 		  = 'keytech/index';
	public $auth_required = FALSE;
	public $admin_controller = TRUE;

	public function action_login()
	{
		if (Auth::instance()->logged_in())
		{
			Controller::redirect('/', 301);
		}

		$this->view   = 'keytech/login';
		$this->title  = 'Вход в систему';
		$errors       = FALSE;

		if (HTTP_Request::POST == $this->request->method())
		{
			$login    = $this->request->post('login');
			$password = $this->request->post('password');
			$remember = $this->request->post('remember');

			if (Auth::instance()->login($login, $password, $remember))
			{
				$session       = Session::instance();
				$auth_redirect = $session->get('auth_redirect', '');

				$session->delete('auth_redirect');
				//  Message::set(Message::SUCCESS, 'Вы успешно залогинились!');
				Controller::redirect($auth_redirect, 301);
			}
			$errors = 'Не правильный логин/email или пароль.';
			// Message::set(Message::ERROR, 'Не правильный логин/email или пароль.');
		}

		$this->data['errors'] = $errors;
	}

	public function action_noaccess()
	{
		$this->view   = 'user/noaccess';
		$this->title  = 'Доступ запрещён';
		$this->layout = 1;
		$errors       = FALSE;

		$this->data['errors'] = $errors;
	}

	public function action_register()
	{
		die('Off');

		if (Auth::instance()->logged_in())
		{
			Controller::redirect('/', 301);
		}

		$this->view   = 'user/register';
		$this->title  = 'Регистрация';
		$this->layout = 1;
		$errors       = FALSE;
		$users        = ORM::factory('user');

		if (HTTP_Request::POST == $this->request->method())
		{
			try
			{
				$users->username = Arr::get($_POST, 'username');
				$users->password = Arr::get($_POST, 'password');
				$users->email    = Arr::get($_POST, 'email');

				$users->create_user($this->request->post(), array(
																 'username',
																 'password',
																 'email',
															));

//				$role = ORM::factory('role')->where('name', '=', 'login')->find();
//				$users->add('roles', $role);

				Auth::instance()->force_login($users->username);

				Controller::redirect('/', 301);
			} catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('');
			}
		}

		$this->data['form']   = $users;
		$this->data['errors'] = $errors;
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		Controller::redirect('/');
	}

}
