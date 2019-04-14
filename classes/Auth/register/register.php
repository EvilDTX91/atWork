<?php

namespace atwork\Auth\Register;

use atwork\Database\Connection;

class Register
{

    private $connectionDriver;

    public function initRegistNewMember(UserData $userData)
    {

        $username = $userData->getUSERNAME();
        $password = $userData->getPASSWORD();
        $email = $userData->getEMAIL();
        $firstname = $userData->getFIRSTNAME();
        $lastname = $userData->getLASTNAME();
        $dateofbirth = $userData->getDATEOFBIRTH();
        echo $username . "</br>";
        echo $password . "</br>";
        echo $email . "</br>";
        echo $firstname . "</br>";
        echo $lastname . "</br>";
        echo $dateofbirth . "</br>";

        self::registNewMember($userData);
    }

    private function registNewMember(UserData $userData): void
    {
        $sql = "INSERT INTO users (username, password, email, firstname, lastname, dateofbirth)
VALUES 
(" . $userData->getUsername() . "," . $userData->getPassword() . "," . $userData->getEmail() . "," . $userData->getFirstname() . "," . $userData->getLastname() . "," . $userData->getDateofbirth() . ")";

        $this->getConnectionDriver()->getConnection()->query($sql);
    }

    public function getConnectionDriver(): Connection
    {
        return $this->connectionDriver;
    }

    public function setConnectionDriver(Connection $connectionDriver): void
    {
        $this->connectionDriver = $connectionDriver;
    }


}

?>