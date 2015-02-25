<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Error extends Keytech
{
	/**
	 * @var string
	 */
	protected $_requested_page;

	/**
	 * @var string
	 */
	protected $_message;

	/**
	 * Pre determine error display logic
	 */

	public function before()
	{
		parent::before();

		$this->view   = 'error/index';
		$this->layout = 1;

		$this->data['page'] = URL::site(rawurldecode(Request::initial()->uri()));
		$this->data['error_status'] = '404';

		// Internal request only!
		if (!Request::current()->is_initial())
		{
			if ($message = rawurldecode($this->request->param('message')))
			{
				$this->data['message'] = $message;
			}
		}
		else
		{
			$this->request->action(404);
		}

		$this->response->status((int)$this->request->action());
	}

	/**
	 * Serves HTTP 404 error page
	 */
	public function action_404()
	{

		$static = ORM::factory('static')->where('url', '=', 'error_404')->find();

		$this->title = $static->title;
		$this->data['content']  = $static->content;

		// Here we check to see if a 404 came from our website. This allows the
		// webmaster to find broken links and update them in a shorter amount of time.
		if (isset ($_SERVER['HTTP_REFERER']) AND strstr($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== FALSE)
		{
			// Set a local flag so we can display different messages in our template.
//			$this->local = TRUE;
		}

		// HTTP Status code.
		$this->response->status(404);

		View::bind_global('shirt_id', $this->layout);
	}

	public function action_503()
	{
		$this->data['error_status'] = '503';
		$this->title  = 'Maintenance Mode';
		$this->layout = 1;
	}

	public function action_500()
	{
		$this->data['error_status'] = '500';
		$this->title  = 'Internal Server Error';
		$this->layout = 1;
	}
}