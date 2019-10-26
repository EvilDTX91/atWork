<?php

namespace atwork\Auth\Register;

use atwork\Database\Connection;

class Register
{

    private $connectionDriver;

    public function initRegistNewMember(UserData $userData)
    {
        //$this->setConnectionDriver(new Connection);

        $username = $userData->getUSERNAME();
        $password = $userData->getPASSWORD();
        $email = $userData->getEMAIL();
        $firstname = $userData->getFIRSTNAME();
        $lastname = $userData->getLASTNAME();
        $dateofbirth = $userData->getDATEOFBIRTH();
        echo "Username: " . $username . "</br>";
        echo "Paasword: " . $password . "</br>";
        echo "E-mail: " . $email . "</br>";
        echo "Firstname: " . $firstname . "</br>";
        echo "Lastname: " . $lastname . "</br>";
        echo "Date Of Birth: " . $dateofbirth . "</br>";

        self::registNewMember($userData);
    }

    private function registNewMember(UserData $userData): void
    {

        $connection = new \atwork\Database\Connection();
        $connect = $connection->getConnection();

        $sql = "INSERT INTO users (username, password, email, firstname, lastname, dateofbirth, userlevel)
VALUES 
('" . $userData->getUsername() . "','" . $userData->getPassword() . "','" . $userData->getEmail() . "',
'" . $userData->getFirstname() . "','" . $userData->getLastname() . "'," . $userData->getDateofbirth() . " , 1)";

        //Connection::getConnection()->query($sql);
        //$this->getConnectionDriver()->getConnection()->query($sql);
        //echo "</br>Registration was succesfull!</br>";

        if ($connect->query($sql)) {
            echo "</br>Registration was succesfull!</br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
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