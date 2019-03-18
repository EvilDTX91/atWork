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

        /*$playerScore = $playerData->getPLAYERCARDSCORE();
        $playerCards = $hands->getPlayerHands();*/

        $playerScore = $_SESSION['playerScore'];
        $playerCards = $_SESSION['playerCards'];

        print_r($playerCards);
        $newCardPlayer = $pullcard->getOneCard();
        $hands->setPlayerHands(sizeof($playerCards), $newCardPlayer);
        $_SESSION['playerCards'] = $hands->getPlayerHands();
        $playerCards = $_SESSION['playerCards'];

        $newScore = $cardValue->getCardValue($newCardPlayer);
        $setScore = ($playerScore + $newScore);
        $playerData->setPLAYERCARDSCORE($setScore);
        $playerScore = $playerData->getPLAYERCARDSCORE();

        echo "</br>";
        print_r($playerCards);
        echo "</br>Player pull new card..." . $playerCards[sizeof($playerCards)-1] . "</br> Player New Score: " . $playerScore;
    }
}