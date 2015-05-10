<?php
class Template
{
	protected $dir;
	protected $template;
	protected $menu;
	protected $articles;

	public function __construct(Menu $menu, Articles $articles)
	{
		$this->menu = $menu;
		$this->articles = $articles;
	}

	// set template
	public function set($name)
	{
		$this->template = $name;
	}
	
	// set directory for templates
	public function dir($dir)
	{
		$this->dir = $dir;
	}

	// return all templates aviabile
	public function templates()
	{
		$templates = scandir($this->dir);
		foreach($templates as $template){
			echo '<li>'.$template.'</li>';
		}
	}

	// show template
	public function read($page)
	{
		// get code of template
		$exist = scandir($this->dir.'/'.$this->template);
		if(in_array($page, $exist)){
			$s = file_get_contents($this->dir.'/'.$this->template.'/'.$page);
		}else{
			$s = '<html><h1>Page not found</h1></html>';
		}

		// template engine replace
		$s = str_replace("{BASE_DIR}", $this->dir.'/'.$this->template, $s);
		$s = str_replace("{MENU}", $this->menu->menus, $s);
		$s = str_replace("{ARTICLES}", $this->articles->article, $s);
				
		// render page
		echo $s;	
	}
}

