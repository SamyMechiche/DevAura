<?php
session_start();
require_once('./vendor/autoload.php');
require_once('./vendor/altorouter/altorouter/AltoRouter.php');

$router = new AltoRouter();
$router->setBasePath('/DevAura');

$router->map('GET', '/', 'ControllerSubcategory#home', 'home');
$router->map('GET', '/feed', 'ControllerPost#feed', 'feed');

$router->map('GET', '/login', 'ControllerUser#displayForms', 'login');

$router->map('POST', '/login', 'ControllerUser#handleForms', 'handleForms');

$router->map('GET', '/logout', 'ControllerUser#logout', 'logout');

$router->map('GET', '/cate_souscate', 'ControllerSubcategory#getPost', 'catSouscat');

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