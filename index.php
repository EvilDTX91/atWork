<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$twig = new Twig_Environment(new Twig_Loader_Filesystem('template/'));

$template = $twig->load('base.twig');

if (isset($_POST['blackJackShow'])) {
    echo "</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "***********************************Hello world! Can you see me!?***********************************</br>";
    echo "</br>";

    $obj = new atwork\BlackJack\GameEngine;
    $result = $obj->gameStart();
}

$playerData = new \atwork\BlackJack\PlayerData();
$playerScore = $playerData->getPLAYERCARDSCORE();

$dealerData = new \atwork\BlackJack\DealerData();
$dealerScore = $dealerData->getDEALERCARDSCORE();

$hands = new \atwork\BlackJack\Hands();
$playerCards = $hands->getPlayerHands();
$dealerCards = $hands->getDealerHands();

$pictures = new \atwork\BlackJack\CardPictures();
$playerCardPictures = $pictures->getPlayerCardsPicture();
$dealerCardPictures = $pictures->getDealerCardsPicture();

$win = new \atwork\BlackJack\Winner();
$winner = $win->checkWinner($playerScore, $dealerScore);

$twig->display('index.twig',
    [
        'index' => $template,
        'playerScore' => $playerScore,
        'dealerScore' => $dealerScore,
        'playerCards' => $playerCards,
        'playerCardPictures' => $playerCardPictures,
        'dealerCards' => $dealerCards,
        'dealerCardPictures' => $dealerCardPictures,
        'winner' => $winner
    ]);