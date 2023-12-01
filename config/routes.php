<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
 
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {

        // Users Routes
        $builder->connect('/add-user', ['controller' => 'Users', 
                              'action' => 'addUser']);
        $builder->connect('/edit-user/:id', ['controller' => 'Users', 
                              'action' => 'editUser'],
                 ["pass" => ["id"]]);
        $builder->connect('/delete-user/:id', ['controller' => 'Users', 
                              'action' => 'deleteUser'], 
                 ["pass" => ["id"]]);
        $builder->connect('/list-users', ['controller' => 'Users', 
                             'action' => 'listUsers']);
    
    });
     
};