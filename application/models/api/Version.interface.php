<?php
/**
  Version used to Controller recurses
*/
interface Version {

	public function getMin();
	public function isMin($number);

	public function getMax();
	public function isMax($number);

	public function generateNumber();
}