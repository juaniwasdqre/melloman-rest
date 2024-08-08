<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    require_once 'app/controllers/disco.api.controller.php';

    $router = new Router();

    #                 endpoint      verbo     controller             método
    $router->addRoute('discos',     'GET',    'DiscosApiController', 'get'); # TaskApiController->get($params)
    $router->addRoute('discos/:ID', 'GET',    'DiscosApiController', 'get');
    $router->addRoute('discos',     'POST',   'DiscosApiController', 'create');
    $router->addRoute('discos/:ID', 'PUT',    'DiscosApiController', 'update');
    $router->addRoute('discos/:ID', 'DELETE', 'DiscosApiController', 'delete');
    
    $router->addRoute('user/token', 'GET',    'UserApiController', 'getToken'   ); # UserApiController->getToken()
    
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
