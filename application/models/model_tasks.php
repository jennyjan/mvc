<?php
Class Model_Task extends Model 
{
	public $userName;
	public $userEmail;
	public $taskText;
    const NUMBER_OF_RECORDS = 3;

    public static function getCountTasks($db)
    {
        $sql = 'SELECT COUNT(id) as count FROM `tasks`';
        $result = $db->execute($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function getSqlSortOrderStr()
    {
        $sortColumn = $_GET['column'];
        $sortOrder = $_GET['sort'];
        return (isset($sortColumn) && isset($sortOrder)) ?  " ORDER BY $sortColumn $sortOrder" : '';
    }

	public function getAllTasksByLimit($db, $pagination, $router)
	{
        $page = (empty(@$_GET['page']) || ($_GET['page'] <= 0)) ? 1 : $_GET['page'];
        $sqlSortOrder = $this->getSqlSortOrderStr();
        $count = $this->getCountTasks($db);
        $limit = self::NUMBER_OF_RECORDS;
        $offset = ($page - 1) * self::NUMBER_OF_RECORDS;
        $sql = "SELECT * FROM `tasks` $sqlSortOrder LIMIT $limit OFFSET $offset";
        $result["pagination"] = $count > self::NUMBER_OF_RECORDS ? $pagination->getPaginationList($count, self::NUMBER_OF_RECORDS, $router) : '';
        $result["hrefSort"] = $router->getQueryString(array('column','sort'));
        $result["data"] = $db->select($sql);
        return $result;
	}

    public static function getTaskById($db, $id)
    {
        $sql = "SELECT * FROM `tasks` WHERE `id` = $id";
        $data["data"] = $db->select($sql);
        return $data;
    }

    public static function getTaskTextById($db, $id)
    {
        $sql = "SELECT `taskText` FROM `tasks` WHERE `id` = $id";
        $data = $db->select($sql);
        return $data[0]['taskText'];
    }

	public function addTask($db)
	{
        if(isset($_POST['submit'])) {
            $userName = htmlspecialchars(trim($_POST['userName']));
            $userEmail = htmlspecialchars(trim($_POST['userEmail']));
            $taskText = htmlspecialchars(trim($_POST['taskText']));

            if (!empty($userEmail) && !filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                return array('error' => array('msg' => 'Неверный формат Email'));
            }

            if ($userName == ''
                || $userEmail == ''
                || $taskText == '') return array('error' => array('msg' => 'Заполните поля'));

            $sql = "INSERT INTO `tasks` (`userName`,`userEmail`,`taskText`) VALUES ('$userName', '$userEmail', '$taskText')";
            return $db->add($sql);
        }
	}

	public function editTask($db, $id)
	{
        if(isset($_POST['submit'])) {
            $taskText = htmlspecialchars(trim($_POST['taskText']));
            $taskStatus = htmlspecialchars(trim($_POST['taskStatus']));

            if ($taskText == '') return array('error' => array('msg' => 'Заполните поля'));

            $taskTextInBase = $this->getTaskTextById($db, $id);
            if($taskTextInBase != $taskText) {
                $sqlAdminEditPart = ',`isCorrectByAdmin` = 1';
            }

            $sql = "UPDATE `tasks` SET `taskText` = '$taskText', `taskStatus` = '$taskStatus'$sqlAdminEditPart  WHERE `id` = $id";
            return $db->update($sql);
        }
	}
}