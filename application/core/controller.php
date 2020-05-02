<?php

$self_referrer = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == $self_referrer) {
	return;
}

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();	
		$this->db = new Model_DataBase();
        $this->pagination = new Model_Pagination();
        $this->router = new Route();
	}

	function action_index()
	{

	}
}