<?php
/**
 * API Controler
 */
class ApiController extends Controller
{
	
	private $api;
	private $args;

	function __construct()
	{
		$this->api = new ApiManager('1.0');
		$this->args = new ArgumentsManager();
	}

	/**
	 * Call a API Docummentation
	 */
	public function index()	{
		$this->loadTemplate("api/doc");
	}
	
	/**
	 * API Version Controller
	*/
	public function v1()
	{
		// URL response http://192.168.15.135/promodebolso/api/v1/<userId>/<type>
		/* Start time to responseTime */
		$start = microtime(true);

		$args = func_get_args();
		$size = func_num_args();
		if ($size == 0 || $size > 2) {
			exit($this->args->sendStatus());
		}
		if ($size == 1) {
			if ($args[0] == 'user') {
				if (!isset($_POST['id'])) {
					exit($this->args->sendStatus(3, 0, '', (microtime(true) - $start)));
				}
				$userId = $_POST['id'];
				if (!is_numeric($userId)) {
					exit($this->args->sendStatus(1, 0, '', (microtime(true) - $start)));
				}
				if ($this->api->hasUser($userId)) {
					exit($this->args->sendStatus(9, 0, '', (microtime(true) - $start)));
				}
				$max = $this->api->getVersion()->getMax();
				if (floatval($this->convert($userId)) >= $max) {
					exit($this->args->sendStatus(10, 0, $max, (microtime(true) - $start)));
				}
				$min = $this->api->getVersion()->getMin();
				if (floatval($this->convert($userId)) <= $min) {
					exit($this->args->sendStatus(11, 0, $min, (microtime(true) - $start)));
				}
				$message = " Your ID is {$userId}";
				$this->args->sendStatus(8, 1, $message, (microtime(true) - $start), 0, $userId);
				$this->api->insertUser($userId);
			} else {
				exit($this->args->sendStatus());
			}
		}
		if ($size == 2) {
			$userId = $args[0];
			if (!is_numeric($userId)) {
				exit($this->args->sendStatus(1, 0, '', (microtime(true) - $start)));
			}
			$type = $args[1];
			if (!$this->api->hasType($type)) {
				exit($this->args->sendStatus(2, 0, '', (microtime(true) - $start)));
			}
			// Create a user
			if ($type == 'draw') {
				//Call DrawClass
				if ($this->api->hasUser($userId) && !empty($this->api->isDrawn($userId))) {
					exit($this->args->sendStatus(3, 0, '', (microtime(true) - $start)));
				}
				if (!$this->api->hasProbability()) {
					exit($this->args->sendStatus(4, 0, '', (microtime(true) - $start)));
				}
				$number = $this->api->generate();
				$message = " Your lucky number is {$number}";
				$this->args->sendStatus(5, 1, $message, (microtime(true) - $start), $number, $userId);
				if (!$this->api->hasUser($userId)) {
					$this->api->insert($userId, $number);
				} else {
					$this->api->update($userId, $number);
				}
			}
			if ($type == 'drawn') {
				//Call DrawnClass
				if (!$this->api->hasUser($userId)) {
					exit($this->args->sendStatus(6, 0, '', (microtime(true) - $start)));
				}
				if ($this->api->isDrawn($userId) == '') {
					exit($this->args->sendStatus(12, 0, '', (microtime(true) - $start)));
				}
				$number = $this->api->getNumber($userId);
				$message = " Your lucky number is {$number}";
				$this->args->sendStatus(7, 1, $message, (microtime(true) - $start), $number, $userId);
			}
		}
	}

	private function convert($id = '')
	{
		return (strlen($id) > 2) ? 
			((strlen($id) > 3) ? '' : 0)  . substr($id, 0, -3) . '.' .substr($id, -3) : $id;
	}

}