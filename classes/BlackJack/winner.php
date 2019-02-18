<?php

namespace atwork\BlackJack;

class Winner extends GameEngine
{
    public function checkWinner($playerscore,$dealerscore)
    {
        /*
        $playerscore = new PlayerData();
        $dealerscore = new DealerData();
        $ps = $playerscore->getPLAYERCARDSCORE();
        echo "</br>" . $ps . ", ";
        $ds = $dealerscore->getDEALERCARDSCORE();
        echo $ds . "</br>";
        */

        if ($playerscore < $dealerscore && $dealerscore <= 21) {
            return 'Dealer Win!';
        } else if ($playerscore < $dealerscore && $dealerscore > 21) {
            return 'Player Win!';
        }  else if ($playerscore > $dealerscore && $playerscore > 21) {
            return 'Dealer Win!';
        }  else if ($playerscore > $dealerscore && $playerscore <= 21) {
            return 'Player Win!';
        } else if ($playerscore == $dealerscore) {
            return 'It is Draw!';
        } else {
            return 'Error!';
        }
    }

    private function checkScore($score)
    {

    }
}