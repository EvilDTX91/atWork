<?php

namespace atwork\BlackJack;

class PlayerMoves
{

    public function playerNextMove($nextMove)
    {
        if ($nextMove == 'newCard') {
            $newCardPlayer=$this->playerNewCard();
            return $newCardPlayer;
        } else if ($nextMove == 'PlayerExit') {

        } else {

        }
    }

    private function playerNewCard()
    {
        $pullcard = new PullCards();
        $playerData = new PlayerData();
        $cardValue = new CardValue();

        $newCardPlayer = '';

        while(array_search($newCardPlayer, $_SESSION['playerCards']) || $newCardPlayer == '' || array_search($newCardPlayer, $_SESSION['dealerCards']))
        {
            $playerScore = $_SESSION['playerScore'];
            $newCardPlayer = $pullcard->getOneCard();
            echo "+++++++++++++++++++++++++++++++++++++++++++++++++";
        }
        array_push($_SESSION['playerCards'], $newCardPlayer);

        $newScore = $cardValue->getCardValue($newCardPlayer);
        $setScore = ($playerScore + $newScore);
        $playerData->setPLAYERCARDSCORE($setScore);

        return $newCardPlayer;
    }
}