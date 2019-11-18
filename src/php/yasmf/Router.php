<?php

namespace yasmf;

use controllers;

class Router
{

    public function route($dataSource)
    {

        // set controllers with the current model
        $controllerName = "controllers\\" . HttpHelper::get('controller') . "Controller";
        $controller = new $controllerName();
        // set action to trigger
        $action = HttpHelper::get('action') ?: 'defaultAction';

        // trigger the appropriate action and get the resulted view
        $view = $controller->$action($dataSource->getPdo());

        // render the view
        $view->render();
    }
}

