<?php

namespace atwork\Auth;

use atwork\Database\Connection;

class Session
{
    /**
     * @var Connection
     */
    private $connectionDriver;
    private $userIP;

    public function loginSession($usernamelogin)
    {
        $this->createSession($usernamelogin);
    }

    public function logoutSession($usernamelogout)
    {
        $this->removeSession($usernamelogout);
    }

    private function createSession($usernamelogin)
    {
        $this->setConnectionDriver(new Connection);
        $username = $usernamelogin;
        $sessionID = session_id();
        $userIP = $this->getUserIP();

        $sql = "INSERT INTO sessions(username, sessionname, ip)
                VALUES
                ('" . $username . "','" . $sessionID . "','" . $userIP . "')";
        $result = $this->getConnectionDriver()->getConnection()->query($sql);

        if ($result) {
            echo "Login was succesfull! Session created!";
        } else {
            echo "Error:" . $sql . "</br>" . mysqli_error($result) . mysqli_error($this->getConnectionDriver()->getConnection());
        }
    }

    private function removeSession($usernamelogout)
    {
        $this->setConnectionDriver(new Connection);
        $username = $usernamelogout;
        $userIP = $this->getUserIP();

        $sql = "DELETE FROM sessions WHERE username='" . $username . "' AND ip='" . $userIP . "'";
        $result = $this->getConnectionDriver()->getConnection()->query($sql);

        if ($result) {
            echo "Logout was succesfull!Your session deleted!";
        } else {
            echo "Error:" . $sql . "</br>" . mysqli_error($result);
        }
    }

    private function getUserIP()
    {

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $this->userIP = $_SERVER['HTTP_CLIENT_IP'];
        } //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } //whether ip is from remote address
        else {
            $this->userIP = $_SERVER['REMOTE_ADDR'];
        }
        return $this->userIP;
    }

    /**
     * @return Connection
     */
    public function getConnectionDriver(): Connection
    {
        return $this->connectionDriver;
    }

    /**
     * @param Connection $connectionDriver
     */
    public function setConnectionDriver(Connection $connectionDriver): void
    {
        $this->connectionDriver = $connectionDriver;
    }
}