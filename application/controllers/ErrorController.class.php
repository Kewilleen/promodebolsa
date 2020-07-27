<?php
/**
 * Error Controler
 */
class ErrorController extends Controller
{
	
	/**
	 * Call a error index page
	 */
	public function index()	{
		$path = $_SERVER['REQUEST_URI'];
		$data = array(
			"page" => $path
		);
		$this->loadTemplate("error", $data);
	}
	
}