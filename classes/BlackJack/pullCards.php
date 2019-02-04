<?php

namespace atwork\classes\BlackJack;

class PullCards {
    public function getOneCard()
    {
        $cardNumber = random_int(0,55);

         return Cards::getCards($cardNumber);
    }
}