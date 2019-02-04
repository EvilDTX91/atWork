<?php

namespace atwork\classes\BlackJack;

class PlayerData
{
    private $USERNAME;
    private $EMAIL;
    private $USERMONEY;

    public function getUSERNAME(): string
    {
        return $this->USERNAME;
    }

    public function setUSERNAME($USERNAME)
    {
        $this->USERNAME = $USERNAME;
    }

    public function getEMAIL(): string
    {
        return $this->EMAIL;
    }

    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;
    }

    public function getUSERMONEY(): integer
    {
        return $this->USERMONEY;
    }

    public function setUSERMONEY($USERMONEY)
    {
        $this->USERMONEY = $USERMONEY;
    }

}