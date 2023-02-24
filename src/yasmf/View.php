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
 * Class representing view objects
 */
class View
{
    private string $relativePath;

    /**
     * @var array<string, mixed> the map containing the parameters for the view
     */
    private array $viewParams = array();

    /**
     * Construct a new view object
     *
     * @param string $relativePath the relative path to the file containing the presentation code
     */
    public function __construct(string $relativePath)
    {
        $this->relativePath = $relativePath;
    }

    /**
     * Set a variable that the view will be able to manipulate
     *
     * @param string $key the name of the variable
     * @param mixed $value the value of the variable
     * @return $this the update current view
     */
    public function setVar(string $key, mixed $value) : View
    {
        $this->viewParams[$key] = $value;
        return $this;
    }

    /**
     * Get var corresponding to given key
     *
     * @param string $key the name of the variable
     * @return mixed the value of the variable
     */
    public function getVar(string $key) : mixed {
        return $this->viewParams[$key];
    }

    /**
     * Render the view mixing presentation code get from the relative path
     * with the set variables
     *
     * @param string $prefixToRelativePath the prefix to the relative path
     * @return void
     */
    public function render(string $prefixToRelativePath = '') : void
    {
        // convert view params in variables accessible by the php file
        extract($this->viewParams);
        // "enroll" the php file used to build and send the response
        require_once $_SERVER['DOCUMENT_ROOT'] . "/$prefixToRelativePath" . "/$this->relativePath.php";
    }

    /**
     * @return string the relative path
     */
    public function getRelativePath(): string
    {
        return $this->relativePath;
    }

}