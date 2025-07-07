<?php 
require 'vendor/autoload.php';
require 'vendor/altorouter/altorouter/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('/mangatheque');

$router->map('GET', '/', 'ControllerPage#homePage', 'homepage');

//USER
$router->map('GET', '/user/[i:id]', 'ControllerUser#oneUserById', 'userPage');
$router->map('GET', '/user/delete/[i:id]', 'ControllerUser#deleteUserById', 'userDelete');
$router->map('GET|POST', '/user/update/[i:id]', 'ControllerUser#updateUser', 'userUpdate');

$match = $router->match();

if(is_array($match)){
    list($controller, $action) = explode("#", $match['target']);
    $obj = new $controller();

    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
    }
} else {
    http_response_code(404);
}