<?php
class Injector
{
	protected $db;
	public $options;

	public function __construct(mysqli $db)
	{
		$this->db = $db;
	}

	public function is_logged()
	{
		return isset($_SESSION['is_logged']) ? true : false;
	}

	public function login($account)
	{
		// user data
		$username = $this->db->real_escape_string($account['username']);
		$password = $this->db->real_escape_string($account['password']);
		// mysql data
		$q = $this->db->query("SELECT `username`, `password` 
							   FROM `users` 
							   WHERE `username` = '{$username}' 
							   AND `password` = '{$password}'");
		if($q->num_rows >= 1){
			$_SESSION['is_logged'] = true;
		}else{
			echo 'Your username or password is wrong';
		}
	}

	public function logout()
	{
		unset($_SESSION['is_logged']);
	}

	public function option($item)
	{	
		$item = $this->db->real_escape_string($item);
		$q = $this->db->query("SELECT `name` FROM `{$item}`");
		$z = '';
		while($r = $q->fetch_assoc()){
			$z .= '<option>'.$r['name'].'</option>';
		}
		$this->options = $z;
	}
}