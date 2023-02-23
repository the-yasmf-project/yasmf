<?php
/*
 * yasmf - Yet Another Simple MVC Framework (For PHP)
 *     Copyright (C) 2022   Franck SILVESTRE
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

use yasmf\DataSource;
use PHPUnit\Framework\TestCase;

/**
 * Test class for DataSource
 */
class DataSourceTest extends TestCase
{
    /**
     * Test getPDO when it should fail
     * @return void
     */
    function test_get_pdo_throws_exception_if_not_valid(): void
    {
        // given a datasource with an invalid datasource name
        $datasource = new DataSource("localhost",
            3333,
            "wrong_name",
            "wrong_user",
            "xxxx",
            "UTF8");
        // when trying to get the PDO
        try {
            $datasource->getPDO();
            self::fail("it should raise a PDO exception");
        } catch(PDOException) {
            self::assertTrue(true);
        }
    }
}
