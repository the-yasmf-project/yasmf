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



/**
 * Class representing objects in charge of routing the request to the right controller
 * and the right action
 */
class Router
{
    private ComponentFactory $componentFactory;

    /**
     * @param ComponentFactory $componentFactory component factory
     */
    function __construct(ComponentFactory $componentFactory) {
        $this->componentFactory = $componentFactory;
    }

    /**
     * Route the request to the right controller and right action
     * @param string $prefixToRelativePath
     * @param DataSource|null $dataSource the datasource used to connect to the database if needed
     * @return void
     * @throws NoControllerAvailableForName when controller not found
     */
    public function route(string $prefixToRelativePath = '', DataSource $dataSource = null): void
    {
        // set the controller to enroll
        $controller = $this->createController();
        // set the action to trigger
        $action = $this->createAction();
        // trigger the appropriate action and get the resulted view
        if ($dataSource != null) {
            $result_view = $controller->$action($dataSource->getPdo());
        } else {
            $result_view = $controller->$action();
        }
        // render the view
        $result_view->render($prefixToRelativePath);
    }

    /**
     * @return mixed the controller object that will process the request
     * @throws NoControllerAvailableForName when controller not found
     */
    public function createController(): mixed
    {
        $controller_name = HttpHelper::getParam('controller') ?: 'Home';
        return $this->componentFactory->buildControllerByName($controller_name);
    }

    /**
     * @return string the name of the action to trigger
     */
    public function createAction(): string
    {
        return HttpHelper::getParam('action') ?: 'index';
    }
}

