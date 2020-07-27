<?php

/**
 * Model initialize class
 */
class Model
{
	
	public function getConnection()
	{
		$conn = new Connection();
		try {
			$conn->getConnection()->exec('
				CREATE TABLE IF NOT EXISTS `sorteio` (
				`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`sorted` DOUBLE(5,3) NOT NULL
			);');
		} catch(PDOException $e) {
			echo 'Error in pdo: ' . $e->getMessage();
			exit;
		}
		return $conn;
	}

}