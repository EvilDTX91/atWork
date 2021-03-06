<?php

namespace atwork\classes\BlackJack;
class Cards
{
    private static $CARDS = array('H1', 'H2', 'h3', 'H4', 'H5', 'H6', 'H7', 'H8', 'H9', 'H10', 'HJ', 'HQu', 'HK', 'HA',
                                    'S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'SJ', 'SQ', 'SK', 'SA',
                                    'D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10', 'DJ', 'DQ', 'DK', 'DA',
                                    'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'CJ', 'CQ', 'CK', 'CA');
    //private static $CARDTYPES = array('Hearts', 'Spades', 'Diamonds', 'Clubs'); //kör,pikk,káró,treff

    public static function getCards($number)
    {
        return self::$CARDS[$number];
    }
}