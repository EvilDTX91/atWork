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

    public function setPlayerHands($playerNewCard)
    {
        if (self::checkPlayerCards($playerNewCard)) {
            array_push(self::$playerHands, $playerNewCard);
            //self::$playerHands[$pieceOfCard] = $playerNewCard;
        } else {

        }
    }

    public function getDealerHands(): array
    {
        return self::$dealerHands;
    }

    public function setDealerHands($dealerNewCard)
    {
        if (self::checkDealerCards($dealerNewCard)) {
            array_push(self::$dealerHands, $dealerNewCard);
            //self::$dealerHands[$pieceOfCard] = $dealerNewCard;
        } else {

        }
    }

    private function checkPlayerCards($newCard)
    {
        if (array_search($newCard, self::$playerHands)) {
            return false;
        } else {
            return true;
        }
    }

    private function checkDealerCards($newCard)
    {
        if (array_search($newCard, self::$dealerHands)) {
            return false;
        } else {
            return true;
        }
    }

}