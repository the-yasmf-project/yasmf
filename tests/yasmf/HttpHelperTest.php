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

class HttpHelperTest extends TestCase
{
    /**
     * Test getParam when null expected
     *
     * @return void
     */
    public function testGetParam_NullResult(): void
    {
        // given: no params in _GET neither in _POST
        // expected null as result
        self::assertNull(HttpHelper::getParam("No_value_for_this_key"));
    }

    /**
     * Test getParam when a _GET param is set
     *
     * @return void
     */
    public function testGetParam_GET(): void
    {
        // given: a param in _GET
        $_GET["param1"] = "value1";
        // expected null as result
        self::assertEquals("value1",HttpHelper::getParam("param1"));
    }

    /**
     * Test getParam when a _POST param is set
     *
     * @return void
     */
    public function testGetParam_POST(): void
    {
        // given: a param in _GET
        $_POST["param1"] = "value1";
        // expected null as result
        self::assertEquals("value1",HttpHelper::getParam("param1"));
    }
}
