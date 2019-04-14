<?php

namespace atwork\Database;

use mysqli;

class Connection
{
    private $connection;
    private $HOST;
    private $DBUSERNAME;
    private $DBPASSWORD;
    private $DATABASE;

    private function setConnectionData($host, $dbusername, $dbpassword, $database)
    {
        if (isset($host)) {
            $this->HOST = $host;
        } else {
            $this->HOST = 'localhost';
        }
        if (isset($database)) {
            $this->DATABASE = $database;
        } else {
            $this->DATABASE = 'atwork';
        }
        if (isset($dbusername)) {
            $this->DBUSERNAME = $dbusername;
        } else {
            $this->DBUSERNAME = 'atwork';
        }
        if (isset($dbpassword)) {
            $this->DBPASSWORD = $dbpassword;
        } else {
            $this->DBPASSWORD = '';
        }
    }

    private function setConnection(): void
    {
        $connection = new \mysqli($this->HOST, $this->DBUSERNAME, $this->DBPASSWORD, $this->DATABASE);
        mysqli_set_charset($connection, "utf8");
        $this->connection = $connection;
    }

    public function getConnection(): \mysqli
    {
        if ($this->connection === null) {
            self::setConnectionData('localhost', 'atwork', '', 'atwork');
            self::setConnection();
        }
        return $this->connection;
    }
}