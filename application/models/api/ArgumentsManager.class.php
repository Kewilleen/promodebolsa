<?php
/**
 * 
 */
class ArgumentsManager
{

	public function sendStatus($id = 0, $type = 0, $custom = '', $time = 0)
	{
		$time = number_format($time, 5);
		header("Content-type: application/json; charset=utf-8");
		$json = json_encode([
			'statusId' => $id,
			'status' => $this->getStatus($type), 
			'message' => $this->getStatusId($id, $custom),
			'responseTime' => "{$time}ms"
		], JSON_PRETTY_PRINT);
		echo $json;
	}

	public function getStatus($typeId = 0) {
		switch ($typeId) {
			case 1:
				return "success";
			default:
				return "error";
		}
	}

	public function getStatusId($errorId = 0, $custom = '') {
		switch ($errorId) {
			case 1:
				return "UserId cannot be string.";
			case 2:
				return "Type not found.";
			case 3:
				return "This user has already been drawn.{$custom}";
			case 4:
				return "The probability has reached the limit.";
			case 5:
				return "Successfully drawn.{$custom}";
			case 6:
				return "UserId not found.{$custom}";
			case 7:
				return "User found!{$custom}";
			case 8:
				return "User create with success!{$custom}";
			case 9:
				return "This user has exists!{$custom}";
			default:
				return "Invalid syntax check the documentation.";
		}
	}
}