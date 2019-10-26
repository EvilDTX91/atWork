<?php

namespace atwork\Auth;

use atwork\Database\Connection;

class Login
{
    private $connectionDriver;
    private $USERDATA;
    private $USERNAME;
    private $PASSWORD;

    public function userLogin($username, $password)
    {
        $this->setUSERNAME($username);
        $this->setPASSWORD($password);
        $this->setConnectionDriver(new Connection);
        self::loginCheck();
        $setUserProfileData = new ProfileData;
        $setUserProfileData->setProfileData($this->USERDATA);
    }

    private function loginCheck()
    {
        if (!$this->USERDATA) {
            if (isset($this->USERNAME) && isset($this->PASSWORD)) {
                $sql = "SELECT * FROM users WHERE username='$this->USERNAME' AND password='$this->PASSWORD'";
                $result = $this->getConnectionDriver()->getConnection()->query($sql);
                //$this->setUSERDATA($result);

                if ($result) {
                    echo "</br>Fuck was succesfull!</br>";
                    echo "number of rows: " . $result->num_rows;
                    $this->setUSERDATA($result);
                    $createSession = new Session();
                    $createSession->loginSession($this->USERNAME);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($result) . "<br>" . mysqli_error($this->getConnectionDriver()->getConnection());
                }
            }

        }
        return $this->USERDATA;
    }

    public function getConnectionDriver(): Connection
    {
        return $this->connectionDriver;
    }

    public function setConnectionDriver(Connection $connectionDriver): void
    {
        $this->connectionDriver = $connectionDriver;
    }

    /**
     * @return string
     */
    public function getUSERNAME(): string
    {
        return $this->USERNAME;
    }

    /**
     * @param string $USERNAME
     */
    public function setUSERNAME(string $USERNAME): void
    {
        $this->USERNAME = $USERNAME;
    }

    /**
     * @return string
     */
    public function getPASSWORD(): string
    {
        return $this->PASSWORD;
    }

    /**
     * @param string $PASSWORD
     */
    public function setPASSWORD(string $PASSWORD): void
    {
        $this->PASSWORD = $PASSWORD;
    }

    /**
     * @return array
     */
    public function getUSERDATA(): object
    {
        return $this->USERDATA;
    }

    /**
     * @param array $USERDATA
     */
    public function setUSERDATA(object $USERDATA): void
    {
        $this->USERDATA = $USERDATA;
    }
}