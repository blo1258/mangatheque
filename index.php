<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mangateque</title>
</head>
<body>
    <?php

    require 'vendor/autoload.php';
    require 'vendor/altorouter/altorouter/AltoRouter.php';

    $router = new AltoRouter();
    $router->setBasePath('/mangatheque');

    $router->map('GET', '/', 'ControllerPage#homePage', 'homepage');

    // user
    $router->map('GET', '/user/[i:id]', 'ControllerUser#oneUserById', 'userPage');

    //users
    //$router->map('GET', '/users', 'ControllerUser#listUsers', 'users_list');

    // supprimer
    $router->map('GET', '/user/delete/[i:id]', 'ControllerUser#deleteUser', 'user_delete');

    //register
    

    $match = $router->match();
    
    
    if(is_array($match)) {
        list($controller, $action) = explode("#", $match['target']);
        $obj = new $controller();

       if(is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), $match['params']);
       }

    } else {
        http_response_code(404);
    }

    ?>
