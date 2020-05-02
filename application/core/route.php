<?php
class Route
{
    static private $defaultControllerName = 'tasks';
    static private $defaultModelName = 'index';

    private function getParsedUriParts()
    {
        $routeParts = array();
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])) {
            static::$defaultControllerName = $routes[1];
        }
        if (!empty($routes[2])) {
            static::$defaultModelName = $routes[2];
        }
        $routeParts['controller'] = static::$defaultControllerName;
        $routeParts['action'] = static::$defaultModelName;
        $routeParts['params'] = $routes[3];
        return $routeParts;
    }

    private function callMethodOfController($routePartsArr)
    {
        $modelName = 'Model_'.$routePartsArr['controller'];
        $controllerName = 'Controller_'.$routePartsArr['controller'];
        $modelFile = strtolower($modelName).'.php';
        $modelPath = "application/models/".$modelFile;

        if(file_exists($modelPath)) {
            include $modelPath;
        }
        $controllerFile = strtolower($controllerName).'.php';
        $controllerPath = "application/controllers/".$controllerFile;

        if(file_exists($controllerPath)) {
            $access = new Model_Access();
            $db = new Model_DataBase();
            $userId = $_SESSION["user_id"];
            if(empty($userId)) {
                $role = "guest";
            } else {
                $role = $access->checkRole($db, $userId);
                $_SESSION["role"] = $role;
            }
            if (array_key_exists($routePartsArr['controller'], $access::$permissions[$role])
                && in_array($routePartsArr['action'], $access::$permissions[$role][$routePartsArr['controller']])) {
                empty($routePartsArr['params']) ? call_user_func(array(new $controllerName, $routePartsArr['action'])) : call_user_func(array(new $controllerName, $routePartsArr['action']), $routePartsArr['params']);
            } else {
                header('Location: /users/login/');
            }
        }
        else {
            Route::setErrorPage();
        }
    }

	public static function run()
	{
        $routePartsArr = self::getParsedUriParts();
        self::callMethodOfController($routePartsArr);
	}

    public function getQueryString($paramName)
    {
        $uri = $_SERVER['REQUEST_URI'];
        $query = parse_url($uri, PHP_URL_QUERY);
        parse_str($query, $params);
        if(is_array($paramName)) {
            foreach($paramName as $paramNameItem){
                unset($params[$paramNameItem]);
            }
        } else {
            unset($params[$paramName]);
        }
        $newUrl = str_replace($query, '', $uri);
        $sign = (empty($query)) ? '?' : '';
        $queryString = http_build_query($params);
        $queryString = $queryString != "" ? $queryString."&amp;" : "";
        return $newUrl.$sign.$queryString;
    }

    function setErrorPage()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}