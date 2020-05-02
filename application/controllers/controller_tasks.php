<?php
class Controller_Tasks extends Controller 
{
	function __construct()
	{
		$this->model = new Model_Task();
		$this->view = new View();
		parent::__construct();
	}

	function index() 
	{
		$data = $this->model->getAllTasksByLimit($this->db, $this->pagination, $this->router);
		$this->view->generate('tasks_view.php', 'template_view.php', $data);
	}

	function add() 
	{
		$data = $this->model->addTask($this->db);
		$this->view->generate('add_task_view.php', 'template_view.php', $data);
	}

    function detail($id)
    {
        $data = $this->model->getTaskById($this->db, $id);
        $this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function edit($id)
    {
        $this->model->editTask($this->db, $id);
        $this->detail($id);
    }
}