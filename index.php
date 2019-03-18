<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$twig = new Twig_Environment(new Twig_Loader_Filesystem('template/'));

$playerScore = '';
$dealerScore = '';
$playerCards = '';
$playerCardPictures = '';
$dealerCards = '';
$dealerCardPictures = '';
$winner = '';
$contents = 'modules/commercials.twig';
$leftsidetext = '';

$obj = new \atwork\BlackJack\GameStart();
$playerData = new \atwork\BlackJack\PlayerData();
$dealerData = new \atwork\BlackJack\DealerData();
$hands = new \atwork\BlackJack\Hands();
$newCard = new \atwork\BlackJack\PullCards();
$cardValue = new atwork\BlackJack\CardValue();
$pictures = new \atwork\BlackJack\CardPictures();
$win = new \atwork\BlackJack\Winner();
$gameEngine = new atwork\BlackJack\GameEngine();
$playerMoves = new \atwork\BlackJack\PlayerMoves();

if (isset($_POST['blackJackShow'])) {
    echo "</br>";
    echo "***********************************Hello BlackJack! Can you see me!?***********************************</br>";
    echo "</br>";

    $result = $obj->gameStartNow();
    $playerScore = $playerData->getPLAYERCARDSCORE();
    $dealerScore = $dealerData->getDEALERCARDSCORE();
    $playerCards = $hands->getPlayerHands();
    $dealerCards = $hands->getDealerHands();
    $playerCardPictures = $pictures->getPlayerCardsPicture();
    $dealerCardPictures = $pictures->getDealerCardsPicture();

    $_SESSION['playerScore'] = $playerScore;
    $_SESSION['playerCards'] = $hands->getPlayerHands();
    $_SESSION['dealerScore'] = $dealerScore;
    $_SESSION['dealerCards'] = $hands->getDealerHands();

    $_SESSION['asd'] = "</br>Fuk you!</br>";

    $contents = 'modules/blackjack.twig';

} else if (isset($_POST['calculatorShow'])) {
    echo "</br>";
    echo "***********************************Hello Calculator! Can you see me!?***********************************</br>";
    echo "</br>";
    $contents = 'modules/calculator.twig';
} else {
    $contents = 'modules/commercials.twig';
}

if (isset($_POST['blackJackCardButton'])) {
    $playerMoves->playerNextMove('newCard');

    /*$playerScore = $playerData->getPLAYERCARDSCORE();
    $dealerScore = $dealerData->getDEALERCARDSCORE();
    $playerCards = $hands->getPlayerHands();
    $dealerCards = $hands->getDealerHands();*/

    $playerScore = $_SESSION['playerScore'];
    $dealerScore = $_SESSION['dealerScore'];
    $playerCards = $_SESSION['playerCards'];
    $dealerCards = $_SESSION['dealerCards'];

    $newCardPlayer = $newCard->getOneCard();
    $newCardAdd = $hands->setPlayerHands(sizeof($playerCards), $newCardPlayer);
    $_SESSION['playerCards'] = $hands->getPlayerHands();
    $newScore = $cardValue->getCardValue($newCardPlayer);
    $setScore = ($playerScore + $newScore);
    $playerData->setPLAYERCARDSCORE($setScore);
    $playerScore = $playerData->getPLAYERCARDSCORE();
    $playerCardPictures = $pictures->getPlayerCardsPicture();

    $dealerNewScore = $gameEngine->dealerAI($playerScore, $dealerScore);
    $dealerScore = $dealerNewScore;
    $_SESSION['dealerScore'] = $dealerScore;
    $dealerData->setDEALERCARDSCORE($dealerScore);
    $dealerCardPictures = $pictures->getDealerCardsPicture();

    $winner = $win->checkWinner($playerScore, $dealerScore);

    echo "Succesfull! </br></br> Datas: </br>" . "Card:" . $newCardPlayer . "</br> Value: " . $newScore . "</br> New Score: " . $setScore;
    $contents = 'modules/blackjack.twig';
} else {
    echo "</br></br>No Mr.Peter! No!</br></br>";
}

if (isset($_POST['blackJackExitButton'])) {
    $contents = 'modules/commercials.twig';
}

/*
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
*/

if (isset($_POST['sendLoginRequest'])) {
    $leftsidetext = 'modules/commercials.twig';
} else if (isset($_POST['forgotPasswordLogin'])) {
    $leftsidetext = 'modules/forgotPassword.twig';
} else {
    $leftsidetext = 'modules/login.twig';
}
/*
$connection = new \atwork\Database\Connection();
$connect = $connection->getConnection();
*/

$twig->display('index.twig',
    [
        'playerScore' => $playerScore,
        'dealerScore' => $dealerScore,
        'playerCards' => $playerCards,
        'playerCardPictures' => $playerCardPictures,
        'dealerCards' => $dealerCards,
        'dealerCardPictures' => $dealerCardPictures,
        'winner' => $winner,
        'contents' => $contents,
        'leftsidetext' => $leftsidetext
    ]);