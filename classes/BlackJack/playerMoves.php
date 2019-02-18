<?php

namespace atwork\BlackJack;

class PlayerMoves
{

    public function playerNextMove($nextMove)
    {
        if ($nextMove == 'newCard') {
            $this->playerNewCard();
        } else if ($nextMove == 'PlayerExit') {

        } else {

        }
    }

    private function playerNewCard()
    {
        $hands = new Hands();
        $pullcard = new PullCards();
        $playerData = new PlayerData();
        $cardValue = new CardValue();

        $hands->setPlayerHands(sizeof($hands->getPlayerHands()), $pullcard->getOneCard());
        $playercards = $hands->getPlayerHands();
        $playerNewScore = $playerData->getPLAYERCARDSCORE() + $cardValue->getCardValue($playercards[sizeof($playercards)-1]);
        $playerData->setPLAYERCARDSCORE($playerNewScore);

        echo "</br>";
        print_r($playercards);
        echo "</br>Player pull new card..." . $playercards[sizeof($playercards)-1] . "</br> Player New Score: " . $playerData->getPLAYERCARDSCORE();
    }
}