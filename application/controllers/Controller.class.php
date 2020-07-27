<?php 
class Controller
{
	/**
	 * Loads a view.
	 *
	 * @param      string  $view   The view
	 * @param      array   $data   The data
	 */
	private function loadView($view = '', $data = []) 
	{
		extract($data);
		require_once "application/views/{$view}.php";
	}

	/**
	 * Loads a template.
	 *
	 * @param      string  $view   The view
	 * @param      array   $data   The data
	 */
	public function loadTemplate($view = '', $data = [])
	{
		$this->loadView($view, $data);
	}

	public function redirect($page, $default = true)	{
		if ($default) {
			header("Location: " . website . $page);
		} else {
			header("Location: " . $page);
		}
		exit;
	}
}