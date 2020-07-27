<?php
/**
 * Router Manager
 */
class RouterManager extends Router
{
	
	private $path;

	function __construct()
	{
		$this->path = explode('/', $_GET['path']);
	}

	/**
	 * Run Routers to Controller Manager
	 */
	public function run()
	{
		if ($this->hasPath()) {
			$controllerName = $this->getController();
			if (class_exists($controllerName)) {
				if ($this->hasAction($controllerName)) {
					$this->setParams(array_slice($this->path, 2));
				}
			} else {
				$this->setControllerName("Error");
			}
		}
		$obj = [$this->getController(), $this->getAction(), $this->getParams()];
		call_user_func_array([new $obj[0], $obj[1]], $obj[2]);
	}

	/**
	 * Gets the path.
	 *
	 * @return     array  The path.
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * Sets the path.
	 *
	 * @param      array  $path   The path
	 */
	public function setPath($path = [])
	{
		$this->path = $path;
	}

	/**
	 * Determines if it has path.
	 *
	 * @return     boolean  True if has path, False otherwise.
	 */
	public function hasPath()
	{
		if (isset($this->path[0]) && $this->path[0] != null) {
			$this->setControllerName(ucfirst($this->path[0]));
			return true;
		}
		return false;
	}

	/**
	 * Determines if it has action.
	 *
	 * @return     boolean  True if has action, False otherwise.
	 */
	public function hasAction($controllerName)
	{
		if (count($this->path) > 1 && !empty($this->path[1]) && $this->path[1] != '') {
			if (method_exists($controllerName, $this->path[1])) {
				$this->setAction($this->path[1]);
				return true;
			} else {
				$this->setControllerName("Error");
			}
		}
	}

}