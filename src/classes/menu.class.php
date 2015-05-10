<?php
class Menu
{
	protected $db;
	public $menus;

	public function __construct(mysqli $db)
	{
		$this->db = $db;
	}

	// add menu to mysql
	public function add($item)
	{
		$item  = $this->db->real_escape_string($item);
		if(!empty($item)){
			$this->db->query("INSERT INTO `category` (`name`) VALUES ('{$item}')");	
		}
	}
	// edit menu name
	public function edit($item)
	{
		$name  = $item['name'];
		$id    = $item['id'];
		
		$name  = $this->db->real_escape_string($name);
		$id    = $this->db->real_escape_string($id);
		if(!empty($item) && !empty($id)){
			$this->db->query("UPDATE `category` SET `name` = {'$item'} WHERE `id` = '{$id}' ");
		}
	}
	// delete menu
	public function delete($id)
	{
		$id  = $this->db->real_escape_string($id);
		if(!empty($id)){
			$this->db->query("DELETE FROM `category` WHERE `id` = '{$id}'");
		}
	}
	// init menu
	public function show()
	{
		$z = '';
		$q = $this->db->query("SELECT `id`, `name` FROM `category`");
		while($r = $q->fetch_assoc()){
			$z .= '<li><a href="'.$r['name'].'">'.$r['name'].'</a></li>';
		}
		$this->menus = $z;
	}
}