<?php
namespace atwork\classes;
class Cards
{
    private static $CARDS = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace');
    private static $CARDTYPES = array('Hearts','Spades','Diamonds','Clubs'); //kör,pikk,káró,treff

    public static function getCards()
    {
        return self::$CARDS;
    }
    public static function getCardTypes()
    {
        return self::$CARDTYPES;
    }
}