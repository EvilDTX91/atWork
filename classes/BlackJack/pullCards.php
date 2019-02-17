<?php

namespace atwork\BlackJack;

class PullCards {
    public function getOneCard()
    {
        $cardNumber = random_int(0,51);

         return Cards::getCards($cardNumber);
    }
}