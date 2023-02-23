<?php
/*
 * yasmf - Yet Another Simple MVC Framework (For PHP)
 *     Copyright (C) 2023   Franck SILVESTRE
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

use PHPUnit\Framework\TestCase;
use function PHPStan\Testing\assertType;

/**
 * Class for testing router objects
 */
class RouterTest extends TestCase
{

    /**
     * Test default controller creation
     *
     * @return void
     */
    public function testCreateController_Default(): void
    {
        // given a router
        $router = new Router();
        // when creating a controller with no parameter specification
        $controller = $router->createController();
        // then the controller is an instance of HomeController
        // defined in namespace "controllers"
        self::assertInstanceOf("controllers\\HomeController", $controller);
    }

    /**
     * Test specified controller creation
     *
     * @return void
     */
    public function testCreateController_Specified(): void
    {
        // given a router
        $router = new Router();
        // and a parameter specifying the controller name as "Dummy"
        $_GET["controller"] = "Dummy";
        // when creating a controller
        $controller = $router->createController();
        // then the controller is an instance of DummyController
        // defined in namespace "controllers"
        self::assertInstanceOf("controllers\\DummyController", $controller);
    }

    /**
     * Test default action creation
     *
     * @return void
     */
    public function testCreateAction_Default(): void
    {
        // given a router
        $router = new Router();
        // when creating an action with no parameter specification
        $action = $router->createAction();
        // then the action is the default one : "index"
        self::assertEquals("index", $action);
    }

    /**
     * Test specified action creation
     *
     * @return void
     */
    public function testCreateAction_Specified(): void
    {
        // given a router
        $router = new Router();
        // and an action parameter
        $_GET["action"] = "theAction";
        // when creating an action
        $action = $router->createAction();
        // then the action is the  one specified by the parameter
        self::assertEquals("theAction", $action);
    }
}
