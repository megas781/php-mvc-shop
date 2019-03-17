<?php

class Router
{

    private $routes;

    public function __construct()
    {
        if (file_exists(ROOT . '/config/routes.php')) {
            $this->routes = include(ROOT . '/config/routes.php');
        } else {
            die('маршруты не найдены');
        }
    }

    public function run()
    {

        $theRequest = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $keyPattern => $genericPath) {

            if (preg_match("~$keyPattern~", $theRequest)) {

                //собираем данные из внешнего запроса и создаём внутренний
                $internalPath = preg_replace("~$keyPattern~", $genericPath, $theRequest);

                $segments = explode('/', $internalPath);

                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $controllerAction = 'action' . ucfirst(array_shift($segments));

                $params = $segments;


                $controllerFilePath = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFilePath)) {

                    include_once($controllerFilePath);

                    $controllerObject = new $controllerName;

                    if ($controllerObject != null) {

                        $response = call_user_func_array([$controllerObject, $controllerAction], $params);

                        if ($response != null) {

                            goto cycleCompleted;

                        } else {
                            die("не найден action $controllerAction контроллера $controllerName");
                        }

                    } else {
                        die('не найден контроллер ' . $controllerName);
                    }

                } else {
                    die("не найден файл: " . $controllerFilePath);
                }


            } else {
                continue;
            }

        }

        die('цикл закончен. Ошибка 404 ');

        cycleCompleted:

//        echo 'action успешно выполнен';

    }

}