<?php
require_once('./vendor/autoload.php');
require_once('./vendor/altorouter/altorouter/AltoRouter.php');

$router = new AltoRouter();
$router->setBasePath('/DevAura');

$router->map('GET', '/', 'ControllerSubcategory#home', 'home');
$router->map('GET', '/feed', 'ControllerPost#feed', 'feed');

$match = $router->match();



if(is_array($match)){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
    }
    else{
        echo "Error: can't call $action on $controller";
    }
}