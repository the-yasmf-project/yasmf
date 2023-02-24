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
use function PHPUnit\Framework\assertEquals;

class ViewTest extends TestCase
{

    private View $view;
    private string $relativePath;

    public function setUp(): void
    {
        parent::setUp();
        // given a relative path
        $this->relativePath ="the/path";
        // and a view initialzed with the relative path :
        $this->view = new View($this->relativePath);
    }

    public function test__construct()
    {
        // expected the getRelativePath returns the one of initialization
        self::assertEquals($this->relativePath, $this->view->getRelativePath());
    }

    public function testSetVar()
    {
        // given some var passed to the view
        $this->view->setVar("key1", "one string");
        $tab = ['a','b'];
        $this->view->setVar("key2", $tab );
        // then getVar provides expeted results
        self::assertEquals("one string",$this->view->getVar("key1"));
        self::assertSame($tab, $this->view->getVar("key2"));
        self::assertNull($this->view->getVar("key3"));
    }
}
