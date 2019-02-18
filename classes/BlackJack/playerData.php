<?php

namespace atwork\BlackJack;

class PlayerData
{
    private static $USERNAME;
    private static $EMAIL;
    private static $USERMONEY;
    private static $PLAYERCARDSCORE;

    public function getPLAYERCARDSCORE(): int
    {
        if (self::$PLAYERCARDSCORE == null) {
            return 0;
        } else {
            return self::$PLAYERCARDSCORE;
        }
    }

    public function setPLAYERCARDSCORE($PLAYERCARDSCORE): void
    {
        self::$PLAYERCARDSCORE = $PLAYERCARDSCORE;
    }

    public function getUSERNAME(): string
    {
        return self::$USERNAME;
    }

    public function setUSERNAME($USERNAME)
    {
        self::$USERNAME = $USERNAME;
    }

    public function getEMAIL(): string
    {
        return self::$EMAIL;
    }

    public function setEMAIL($EMAIL)
    {
        self::$EMAIL = $EMAIL;
    }

    public function getUSERMONEY(): integer
    {
        return self::$USERMONEY;
    }

    public function setUSERMONEY($USERMONEY)
    {
        self::$USERMONEY = $USERMONEY;
    }

}