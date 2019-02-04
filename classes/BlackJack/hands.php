<?php

namespace atwork\classes\BlackJack;
class Hands
{
    private $playerHands = array();
    private $dealerHands = array();

    public function getPlayerHands(): array
    {
        return $this->playerHands;
    }

    public function setPlayerHands($pieceOfCard, $playerHands)
    {
        if ($this->checkPlayerCards($playerHands)) {
            $this->playerHands[$pieceOfCard] = $playerHands;
        } else {

        }
    }

    public function getDealerHands(): array
    {
        return $this->dealerHands;
    }

    public function setDealerHands($pieceOfCard, $dealerHands)
    {
        if ($this->checkDealerCards($dealerHands)) {
            $this->dealerHands[$pieceOfCard] = $dealerHands;
        } else {

        }
    }

    private function checkPlayerCards($newCard)
    {
        if (!array_search($newCard, $this->playerHands)) {
            return true;
        } else {
            return false;
        }
    }

    private function checkDealerCards($newCard)
    {
        if (!array_search($newCard, $this->dealerHands)) {
            return true;
        } else {
            return false;
        }
    }

}