<?php
/**
 * yasmf - Yet Another Simple MVC Framework (For PHP)
 *     Copyright (C) 2019   Franck SILVESTRE
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU Affero General Public License as published
 *     by the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU Affero General Public License for more details.
 *
 *     You should have received a copy of the GNU Affero General Public License
 *     along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace yasmf;

use controllers;

class Router
{
    public function route($dataSource)
    {
        // set the controller to enrole
        $controllerName = "controllers\\" . HttpHelper::getParam('controller') . "Controller";
        $controller = new $controllerName();
        // set the action to trigger
        $action = HttpHelper::getParam('action') ?: 'defaultAction';
        // trigger the appropriate action and get the resulted view
        $view = $controller->$action($dataSource->getPdo());
        // render the view
        $view->render();
    }
}

