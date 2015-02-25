<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by KeyTech.
 * Developer: DenisBurkin
 * Date: 03.12.11
 * Time: 2:23
 * Основной контроллер | вкл. авторизацию.
 */
class Controller_KeytechMedia extends Controller
{
	public function action_index()
	{
		// Get the file path from the request
		$file = $this->request->param('file');

		// Find the file extension
		$ext = pathinfo($file, PATHINFO_EXTENSION);

		// Remove the extension from the filename
		$file = substr($file, 0, -(strlen($ext) + 1));

		if ($file = Kohana::find_file('media', $file, $ext))
		{
			// Check if the browser sent an "if-none-match: <etag>" header, and tell if the file hasn't changed
			$this->response->check_cache(sha1($this->request->uri()) . filemtime($file), $this->request);
			$this->response->body(file_get_contents($file));
			$this->response->headers('content-type', File::mime_by_ext($ext));
			$this->response->headers('last-modified', date('r', filemtime($file)));
		}
		else
		{
			// Return a 404 status
			$this->response->status(404);
		}
	}
}
