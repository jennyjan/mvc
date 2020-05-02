<?
Class Model_Access extends Model
{
	public static $permissions = array(
	'admin' => array(
	    'users'       => array('index', 'login', 'logout'),
        'tasks'      => array('index', 'add', 'edit', 'detail'),
	  ),
	  'guest' => array(
	    'users'       => array('login', 'logout'),
		'tasks'      => array('index', 'add'),
	  )
	);

	public function checkRole($db, $userid)
	{
		$sql = "SELECT role.name AS role FROM role INNER JOIN users on users.role_id = role.id WHERE users.id = $userid";
		$res = $db->select($sql);
		if(!empty($res[0]['role'])) {
			return $res[0]['role'];
		}
		return false;
	}
}