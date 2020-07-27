<?php
/**
 * API Controller version
 */
class ApiManager extends Model
{
	private $version;
	
	function __construct($version = '')
	{
		$this->version = new API(99.999);
	}

	public function getVersion()
	{
		return $version;
	}

	public function hasType($type = '')
	{
		//sortear, sorteado
		return in_array($type, ['draw', 'drawn']);
	}

	public function hasUser($id = 0)
	{
		$query = $this->getConnection()->result(
			'SELECT * FROM `sorteio` WHERE `id` = :id', [':id' => $id]);
		return ($query && count($query) > 0);
	}

	public function hasNumber($sorted = 0)
	{
		$query = $this->getConnection()->result(
			'SELECT * FROM `sorteio` WHERE `sorted` = :sorted', [':sorted' => $sorted]);
		return ($query && count($query) > 0);
	}

	public function getNumber($id = 0)
	{
		$query = $this->getConnection()->result(
			'SELECT `sorted` FROM `sorteio` WHERE `id` = :id', [':id' => $id]);
		return $query[0];
	}

	public function isDrawn($id = 0)
	{
		$query = $this->getConnection()->result(
			'SELECT `sorted` FROM `sorteio` WHERE `id` = :id', [':id' => $id]);
		if (is_bool($query)) 
			return $query;
		return empty($query[0]);
	}

	public function update($user = 0, $sorted = 0)
	{
		$query = $this->getConnection()->result(
			'UPDATE `sorteio` SET `sorted` = :sorted WHERE `id` = :id', [
				':id' => $user,
				':sorted' => $sorted
			]);
		return $query;
	}

	public function insertUser($id = 0)
	{
		$query = $this->getConnection()->result(
			'INSERT INTO `sorteio` (`id`) VALUES (:id)', [
				':id' => $id
			]);
		return $query;
	}

	public function insert($user, $sorted = 0)
	{
		$query = $this->getConnection()->result(
			'INSERT INTO `sorteio` (`id`, `sorted`) VALUES (:id, :sorted)', [
				':id' => $user,
				':sorted' => $sorted
			]);
		return $query;
	}

	//O limite é de 99.999 float aleatório, logo, 99.999 é o limit de ids
	//Outra maneira seria criar uma tabela com 99.999 numeros não repetidos e dps atrelar os ids
	public function hasProbability()
	{
		$query = $this->getConnection()->result(
			'SELECT `id` FROM `sorteio` ORDER BY `id` DESC LIMIT 1');
		if (is_bool($query)) 
			return $query;
		$id = (strlen($query[0]) > 3) ? substr($query[0], 0, -3) . '.' .substr($query[0], -3) : $query[0];
		return (!empty($query) && floatval($id) != $this->version->getMax());
	}

	public function generate()
	{
		//SELECT FORMAT(RAND() * 99.999, 3) AS random FROM sorteio WHERE random NOT IN (SELECT sorteio.sorted FROM sorteio)
		do {
			$random = number_format($this->version->generateNumber(), 3);
		} while ($this->hasNumber($random));
		return $random;
	}
}