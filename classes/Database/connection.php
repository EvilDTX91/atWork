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

    private
    function setConnectionData($host, $dbusername, $dbpassword, $database)
    {
        if (isset($host)) {
            $this->HOST = $host;
        } else {
            $this->HOST = 'localhost';
        }
        if (isset($database)) {
            $this->DATABASE = $database;
        } else {
            $this->DATABASE = 'root';
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

    public function getConnection(): \mysqli
    {
        if ($this->connection === null) {
            self::setConnectionData('localhost', 'root', '', 'atwork');
            self::setConnection();
        }
        return $this->connection;
    }

    private function setConnection(): void
    {
        $connection = new \mysqli($this->HOST, $this->DBUSERNAME, $this->DBPASSWORD, $this->DATABASE);
        mysqli_set_charset($connection, "utf8");
        $this->connection = $connection;

        echo "</br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxConnection Enstabilaized!xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</br>";
    }
}