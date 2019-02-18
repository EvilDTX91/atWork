<?php

namespace atwork\BlackJack;

class DealerData
{
    private static $DEALERCARDSCORE;

    public function getDEALERCARDSCORE(): int
    {
        if (self::$DEALERCARDSCORE == null) {
            return 0;
        } else {
            return self::$DEALERCARDSCORE;
        }
    }

    public function setDEALERCARDSCORE($DEALERCARDSCORE): void
    {
        self::$DEALERCARDSCORE = $DEALERCARDSCORE;
    }
}