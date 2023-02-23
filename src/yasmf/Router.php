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

/**
 * Class representing objects in charge of routing the request to the right controller
 * and the right action
 */
class Router
{
    /**
     * Route the request to the right controller and right action
     * @param DataSource|null $dataSource the datasource used to connect to the database if needed
     * @return void
     */
    public function route(DataSource $dataSource = null): void
    {
        // set the controller to enroll
        $controller_name = HttpHelper::getParam('controller') ?: 'Home';
        $controller_qualified_name = "controllers\\" . $controller_name . "Controller";
        $controller = new $controller_qualified_name();
        // set the action to trigger
        $action = HttpHelper::getParam('action') ?: 'index';
        // trigger the appropriate action and get the resulted view
        if ($dataSource != null) {
            $result_view = $controller->$action($dataSource->getPdo());
        } else {
            $result_view = $controller->$action();
        }

        // render the view
        $result_view->render();
    }
}

