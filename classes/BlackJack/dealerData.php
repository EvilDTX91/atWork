<?php

namespace atwork\classes\BlackJack;

class DealerData
{
    private $DEALERMONEY;

    public function getDEALERMONEY(): integer
    {
        return $this->DEALERMONEY;
    }

    public function setDEALERMONEY($DEALERMONEY): integer
    {
        $this->DEALERMONEY = $DEALERMONEY;
    }
}