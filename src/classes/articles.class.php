<?php
class Articles
{
	protected $db;
	public $article;

	public function __construct(mysqli $db)
	{
		$this->db = $db;
	}

	public function add($item)
	{
		$content = $item['content'];
		$title   = $item['title'];

		$content = $this->db->real_escape_string($content);
		$title   = $this->db->real_escape_string($title);
		if(!empty($content) && !empty($title)){
			$this->db->query("INSERT INTO `articles` (`title`, `content`) VALUES ('{$title}', '$content')");
		}
	}

	public function edit($item)
	{
		$id   = $item['id'];
		$name = $item['name'];
		$content = $item['content'];

		$id   = $this->db->real_escape_string($id);
		$name = $this->db->real_escape_string($name);
		$content = $this->db->real_escape_string($content);

		if(!empty($id) && !empty($name)){
			$this->db->query("UPDATE `articles` SET `name` = '{$name}' , `content` = '{$content}'");
		}

	}

	public function delete($id)
	{
		$id  = $this->db->real_escape_string($id);
		if(!empty($id)){
			$this->db->query("DELETE FROM `category` WHERE `id` = '{$id}'");
		}
	}

	public function show()
	{
		$z = '';
		$q = $this->db->query("SELECT `id`, `title`, `content`, `data` FROM `articles`");
		while($r = $q->fetch_assoc()){
			$z .= '
			<h2>'.$r['title'].'</h2>
			'.$r['content'].'
			<hr />';
		}
		$this->article = $z;
	}
}