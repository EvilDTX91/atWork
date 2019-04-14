<?php

namespace atwork\BlackJack;

class GameStart
{
    public function gameStartNow()
    {
        $obj = new GameEngine;
        $obj->gameStart();
    }
}