<?

class Model_Users extends Model {

	public function login($db) 
	{
	    if(isset($_POST['submit'])) {
            $login = htmlspecialchars(trim($_POST['login']));
            $password = htmlspecialchars(trim($_POST['password']));
            if($login == '' || $password == '') {
                return 'Заполните поля *';
            }
            $sql = "SELECT * FROM `users` WHERE `login` = '$login'";
            $result = $db->select($sql);
            if (is_array($result) && count($result[0]) > 0 && password_verify($password, $result[0]['psw_hash'])) {
                $_SESSION["login"] = $login;
                $_SESSION["user_id"] = $result[0]['id'];
                header('Location: /tasks/index/');
                die();
            } else {
                return 'Неверный логин или пароль';
            }
        }
	}
}