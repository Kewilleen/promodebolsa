<?php 
/**
 * PDO Connection
 */
class Connection
{
	private static $conn = null;

	public function getConnection()
	{
		try {
			$mysql = unserialize(mysql);
			self::$conn = new PDO('mysql:host=' . $mysql['host'] . ';dbname=' . $mysql['db'] . ';charset=utf8', $mysql['user'], $mysql['pass']);
		} catch(PDOException $e) {
			echo 'Error in pdo: '.$e->getMessage();
			exit;
		}
		return self::$conn;
	}
	
	public function result($sql, $data = [], $getAll = false) {
		$stmt = self::$conn->prepare($sql);
		foreach($data as $param => $value) {
			$value = $this->test_input($value);
			$stmt->bindValue($param, $value);
		}
		$stmt->execute();
		return ($getAll) ? $stmt->fetchAll() : $stmt->fetch(); 
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

}