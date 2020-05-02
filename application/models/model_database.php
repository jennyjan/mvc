<?php

class Model_DataBase extends Model
{
	public function __construct()
	{		
		$this->mysqli = false;
		$this->servername = 'localhost'; 
		$this->username  = 'root';
		$this->password = ''; 
		$this->dbname = 'mvc'; 
		$this->connect();
	}

	public function __destruct() 
	{
		$this->disconnect();
	}

	public function connect()
	{
		if (!$this->mysqli) {			
			$this->mysqli = @new mysqli($this->servername, $this->username, $this->password, $this->dbname);		
			if (!$this->mysqli) {
				$this->status_fatal = true;
				echo 'Connection BDD failed';
				die();
			} 
			if ($this->mysqli->connect_errno) {
			    printf("Connect failed: %s\n", $this->mysqli->connect_error);
			    exit();
			} else {
				$this->status_fatal = false;
			}
		} 
		return $this->mysqli;		
	}

	public function disconnect()
	{
		if($this->mysqli) {
	        if(@mysqli_close()) {
	            $this->mysqli = false; 
	            return true; 
	        } else {
	            return false; 
	        }
	    }
	}

    public function execute($sql)
    {
        $mysqli = $this->mysqli;
        $res = $mysqli->query($sql) or die ("Could not query: " .$mysqli->error);
        return $res;
    }

	public function select($sql)
	{
		$mysqli = $this->mysqli;
		$res = $mysqli->query($sql) or die ("Could not query: " .$mysqli->error);
		return $res->fetch_all(MYSQLI_ASSOC);
	}

	public function update($sql){
		$mysqli = $this->mysqli;
		$res = $mysqli->query($sql) or die ("Could not query: " .$mysqli->error);
		if ($res == false) {
			return false;
		} else {
            return array('result' => array('msg' => 'Данные обновлены'));
		}
	}

	public function add($sql){
		$mysqli = $this->mysqli;
		$res = $mysqli->query($sql) or die ("Could not query: " .$mysqli->error);
		if ($res == false) {
			return false;
		} else {
            return array('result' => array('msg' => 'Данные добавлены'));
		}
	}
}
