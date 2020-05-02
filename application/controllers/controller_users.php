<?
class Controller_Users extends Controller 
{
	function __construct() {
		$this->model = new Model_Users();
		$this->view = new View();
		parent::__construct();
	}

	function login() 
	{
		$data = $this->model->login($this->db);	
		$this->view->generate('login_view.php', 'template_view.php', $data);	
	}

	function logout()
	{
		session_destroy();
		ob_start(); 
		header('Location:/');
		ob_end_flush(); 
	}
}