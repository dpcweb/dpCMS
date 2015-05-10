<?php
class Injector
{
	protected $db;

	public function __construct(mysqli $db)
	{
		$this->db = $db;
	}
}