<?php

namespace atwork\classes\BlackJack;

class PlayerData
{
    private $USERNAME;
    private $EMAIL;
    private $MONEY;

    public function getUSERNAME() : string
    {
        return $this->USERNAME;
    }

    public function setUSERNAME($USERNAME)
    {
        $this->USERNAME = $USERNAME;
    }

    public function getEMAIL() : string
    {
        return $this->EMAIL;
    }

    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;
    }

    public function getMONEY() : integer
    {
        return $this->MONEY;
    }

    public function setMONEY($MONEY)
    {
        $this->MONEY = $MONEY;
    }

}