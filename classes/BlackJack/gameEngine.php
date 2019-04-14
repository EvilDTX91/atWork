<?php

namespace atwork\BlackJack;

class GameEngine
{
    public function gameStart()
    {
        $pullcard = new PullCards();
        $hands = new Hands();
        $cardvalue = new CardValue();
        $playerdata = new PlayerData();
        $dealerdata = new DealerData();

        if (sizeof($hands->getPlayerHands()) < 1) {
            $hands->setPlayerHands($pullcard->getOneCard());

            $newCard = $pullcard->getOneCard();
            while (array_search($newCard, $hands->getPlayerHands()) || array_search($newCard, $hands->getDealerHands())) {
                $newCard = $pullcard->getOneCard();
                echo "++++++++++++++++Player++++++++++++++++++++++ " . $newCard . "</br>";
            }
            $hands->setPlayerHands($newCard);
            //$hands->setPlayerHands($pullcard->getOneCard());

            $newCard = $pullcard->getOneCard();
            while (array_search($newCard, $hands->getPlayerHands()) || array_search($newCard, $hands->getDealerHands())) {
                $newCard = $pullcard->getOneCard();
                echo "++++++++++++++++Dealer++++++++++++++++++++++ " . $newCard . "</br>";
            }
            $hands->setDealerHands($newCard);

            $newCard = $pullcard->getOneCard();
            while (array_search($newCard, $hands->getPlayerHands()) || array_search($newCard, $hands->getDealerHands())) {
                $newCard = $pullcard->getOneCard();
                echo "++++++++++++++++Dealer++++++++++++++++++++++ " . $newCard . "</br>";
            }
            $hands->setDealerHands($newCard);

            //$hands->setDealerHands($pullcard->getOneCard());
            //$hands->setDealerHands($pullcard->getOneCard());
        } else {
            $hands->setPlayerHands($pullcard->getOneCard());
            $hands->setDealerHands($pullcard->getOneCard());
        }

        $playercards = $hands->getPlayerHands();
        for ($i = 0; $i < sizeof($playercards); $i++) {
            $playerdata->setPLAYERCARDSCORE($playerdata->getPLAYERCARDSCORE() + $cardvalue->getCardValue($playercards[$i]));
        }

        $dealercards = $hands->getDealerHands();
        for ($i = 0; $i < sizeof($dealercards); $i++) {
            $dealerdata->setDEALERCARDSCORE($dealerdata->getDEALERCARDSCORE() + $cardvalue->getCardValue($dealercards[$i]));
        }
        /*
        while ($dealerdata->getDEALERCARDSCORE() >= $playerdata->getPLAYERCARDSCORE() && $playerdata->getPLAYERCARDSCORE() <= 21 && $dealerdata->getDEALERCARDSCORE() <= 21) {
            $newFunctions = new PlayerMoves();
            $newFunctions->playerNextMove('newCard');
        }

        while ($playerdata->getPLAYERCARDSCORE() > $dealerdata->getDEALERCARDSCORE() && $dealerdata->getDEALERCARDSCORE() <= 21 && $playerdata->getPLAYERCARDSCORE() <= 21) {
            $dealerScore = $this->dealerAI($playerdata->getPLAYERCARDSCORE(), $dealerdata->getDEALERCARDSCORE());
            $dealerdata->setDEALERCARDSCORE($dealerScore);
        }
        */
    }

    public function dealerAI()
    {
        if ($_SESSION['dealerScore'] < $_SESSION['playerScore'] && $_SESSION['playerScore'] < 22) {
            $pullcard = new PullCards();
            $cardvalue = new CardValue();
            $newCard = $pullcard->getOneCard();
            array_push($_SESSION['dealerCards'], $newCard);
            $newDealerScore = $_SESSION['dealerScore'] + $cardvalue->getCardValue($newCard);

            return $newDealerScore;
        } else {
            return $_SESSION['dealerScore'];
        }
    }
}