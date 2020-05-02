<?php

class View
{
	private $model;
	private $controller;

	public function __construct($controller, $model)
	{
		$this->controller = $controller;
		$this->model = $model;
	}
}