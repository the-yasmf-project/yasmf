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

use PDO;

/**
 * Class representing the datasource used in the application
 */
class DataSource
{
    private string $host;
    private int $port;
    private string $dbName;
    private string $user;
    private string $pass;
    private string $charset;

    /**
     * Construct a new DataSource object
     *
     * @param string $host the host name or address the DBMS is hosted
     * @param int $port the port the DBMS listen to
     * @param string $db_name the name  of the database
     * @param string $user the login to connect to the database
     * @param string $pass the password to connect to the database
     * @param string $charset the charset used by the database
     */
    public function __construct(string $host, int $port, string $db_name, string $user, string $pass, string $charset)
    {
        $this->host = $host;
        $this->port = $port;
        $this->dbName = $db_name;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;
    }

    /**
     * @return PDO the PDO object to connect to the database
     */
    public function getPDO(): PDO
    {
        $ds_name = "mysql:host=$this->host;port=$this->port;dbname=$this->dbName;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_PERSISTENT => true
        ];

        return new PDO($ds_name, $this->user, $this->pass, $options);
    }

}