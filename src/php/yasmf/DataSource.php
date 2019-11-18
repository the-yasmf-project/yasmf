<?php


namespace yasmf;


use PDO;

class DataSource
{
    private $host;
    private $port;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function __construct($host, $port, $db, $user, $pass, $charset)
    {
        $this->host = $host;
        $this->port = $port;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;
    }

    public function getPDO()
    {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($dsn, $this->user, $this->pass, $options);
        return $pdo;
    }

}