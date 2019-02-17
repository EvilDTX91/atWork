<?php

namespace atwork\BlackJack;
class Hands
{
    private static $playerHands = array();
    private static $dealerHands = array();

    public function getPlayerHands(): array
    {
        return self::$playerHands;
    }

    public function setPlayerHands($pieceOfCard, $playerHands)
    {
        if (self::checkPlayerCards($playerHands)) {
            self::$playerHands[$pieceOfCard] = $playerHands;
        } else {

        }
    }

    public function getDealerHands(): array
    {
        return self::$dealerHands;
    }

    public function setDealerHands($pieceOfCard, $dealerHands)
    {
        if (self::checkDealerCards($dealerHands)) {
            self::$dealerHands[$pieceOfCard] = $dealerHands;
        } else {

        }
    }

    private function checkPlayerCards($newCard)
    {
        if (!array_search($newCard, Self::$playerHands)) {
            return true;
        } else {
            return false;
        }
    }

    private function checkDealerCards($newCard)
    {
        if (!array_search($newCard, self::$dealerHands)) {
            return true;
        } else {
            return false;
        }
    }

}