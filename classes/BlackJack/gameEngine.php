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
            $winner = new Winner();

            if (sizeof($hands->getPlayerHands()) < 1) {
                $hands->setPlayerHands(0, $pullcard->getOneCard());
                $hands->setPlayerHands(1, $pullcard->getOneCard());

                $hands->setDealerHands(0, $pullcard->getOneCard());
                $hands->setDealerHands(1, $pullcard->getOneCard());
            } else {
                $hands->setPlayerHands(sizeof($hands->getPlayerHands()) + 1, $pullcard->getOneCard());
                $hands->setDealerHands(sizeof($hands->getDealerHands()) + 1, $pullcard->getOneCard());
            }

            $playercards = $hands->getPlayerHands();
            print_r($playercards);

            for ($i = 0; $i < sizeof($playercards); $i++) {
                $playerdata->setPLAYERCARDSCORE($playerdata->getPLAYERCARDSCORE() + $cardvalue->getCardValue($playercards[$i]));
            }

            $dealercards = $hands->getDealerHands();
            print_r($dealercards);

            for ($i = 0; $i < sizeof($dealercards); $i++) {
                $dealerdata->setDEALERCARDSCORE($dealerdata->getDEALERCARDSCORE() + $cardvalue->getCardValue($dealercards[$i]));
            }


            echo '</br>PlayerCards: ' . implode(' ', $hands->getPlayerHands()) . ' Player Points: ' . $playerdata->getPLAYERCARDSCORE();
            echo '</br>DealerCards: ' . implode(' ', $hands->getDealerHands()) . ' Dealer Points: ' . $dealerdata->getDEALERCARDSCORE();
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
            echo '</br>The winner is: ' . $winner->checkWinner($playerdata->getPLAYERCARDSCORE(), $dealerdata->getDEALERCARDSCORE());
    }

    public function dealerAI($playerscore, $dealerscore)
    {
        if ($dealerscore < $playerscore) {
            $hands = new Hands();
            $pullcard = new PullCards();
            $cardvalue = new CardValue();

            $dealercards = $_SESSION['dealerCards'];

            $hands->setDealerHands(sizeof($dealercards), $pullcard->getOneCard());
            $_SESSION['dealerCards'] = $hands->getDealerHands();
            $dealercards = $_SESSION['dealerCards'];

            $newDealerScore = $dealerscore + $cardvalue->getCardValue($dealercards[sizeof($dealercards) - 1]);
            echo "</br>Dealer pull a card...";
            echo '</br>DealerCards: ' . implode(' ', $hands->getDealerHands()) . '</br>Dealer Points: ' . $newDealerScore . '</br>';

            return $newDealerScore;
        } else {
            return $dealerscore;
        }
    }
}