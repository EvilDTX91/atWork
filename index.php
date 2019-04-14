<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$twig = new Twig_Environment(new Twig_Loader_Filesystem('template/'));

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
    $contents = 'modules/blackJackMainMenu.twig';

} else if (isset($_POST['calculatorShow'])) {
    echo "</br>";
    echo "***********************************Hello Calculator! Can you see me!?***********************************</br>";
    echo "</br>";
    $contents = 'modules/calculator.twig';
} else {
    $contents = 'modules/commercials.twig';
}

if (isset($_POST['startPlayBlackJack'])) {
    $contents = 'modules/blackjack.twig';
}

if (isset($_POST['blackJackPlayButton'])) {
    $result = $obj->gameStartNow();

    $_SESSION['playerScore'] = $playerData->getPLAYERCARDSCORE();
    $_SESSION['playerCards'] = $hands->getPlayerHands();
    $_SESSION['dealerScore'] = $dealerData->getDEALERCARDSCORE();
    $_SESSION['dealerCards'] = $hands->getDealerHands();

    $_SESSION['playerCardPictures'] = $pictures->getPlayerCardsPicture();
    $_SESSION['dealerCardPictures'] = $pictures->getDealerCardsPicture();

    $contents = 'modules/blackjack.twig';
}

if (isset($_POST['blackJackCardButton'])) {

    if ($_SESSION['playerScore'] < 21) {
        $playerScore = $_SESSION['playerScore'];
        $playerCards = $_SESSION['playerCards'];

        $newCardPlayer = $playerMoves->playerNextMove('newCard');
        $newScore = $cardValue->getCardValue($newCardPlayer);
        $setScore = ($playerScore + $newScore);
        $playerData->setPLAYERCARDSCORE($setScore);
        $_SESSION['playerScore'] = $playerData->getPLAYERCARDSCORE();
        $_SESSION['playerCardPictures'] = $pictures->getPlayerCardsPicture();
    }
    $contents = 'modules/blackjack.twig';
} else {
    echo "</br></br>No Mr.Peter! No!</br></br>";
}

if (isset($_POST['blackJackExitButton'])) {
    $leftsidetext = 'modules/login.twig';
    $contents = 'modules/commercials.twig';
    session_destroy();
}

if (isset($_POST['profileLogout'])) {
    $leftsidetext = 'modules/login.twig';
    session_destroy();
}

if (isset($_POST['blackJackHoldButton'])) {

    $dealerScore = $_SESSION['dealerScore'];
    $dealerCards = $_SESSION['dealerCards'];

    $dealerNewScore = $gameEngine->dealerAI();
    $dealerScore = $dealerNewScore;
    $dealerData->setDEALERCARDSCORE($dealerScore);
    $_SESSION['dealerScore'] = $dealerScore;
    $_SESSION['dealerCardPictures'] = $pictures->getDealerCardsPicture();

    $winner = $win->checkWinner($_SESSION['playerScore'], $dealerScore);
    $contents = 'modules/blackjack.twig';
}

if (isset($_POST['blackJackNewGameButton'])) {
    $result = $obj->gameStartNow();

    $_SESSION['playerScore'] = $playerData->getPLAYERCARDSCORE();
    $_SESSION['playerCards'] = $hands->getPlayerHands();
    $_SESSION['dealerScore'] = $dealerData->getDEALERCARDSCORE();
    $_SESSION['dealerCards'] = $hands->getDealerHands();

    $_SESSION['playerCardPictures'] = $pictures->getPlayerCardsPicture();
    $_SESSION['dealerCardPictures'] = $pictures->getDealerCardsPicture();

    $contents = 'modules/blackjack.twig';
}

if (isset($_POST['sendLoginRequest'])) {
    $_SESSION['username'] = $_POST['usernameLogin'];
    $leftsidetext = 'modules/profile.twig';
} else {
    if (isset($_SESSION['username'])) {
        $leftsidetext = 'modules/commercials.twig';
    } else {
        $leftsidetext = 'modules/login.twig';
    }
}

if (isset($_POST['forgotPasswordLogin'])) {
    echo "hello";
    $leftsidetext = 'modules/forgotPassword.twig';
}

if (isset($_POST['profileShow'])) {
    $leftsidetext = 'modules/profile.twig';
}

if (isset($_POST['registerNewUser'])) {
    $leftsidetext = 'modules/register.twig';
}


if (isset($_POST['sendRegisterForm'])) {

    $username = $_POST['registerUsernameInput'];
    $password = $_POST['registerPasswordInput'];
    $email = $_POST['registerEmailInput'];
    $firstname = $_POST['registerFirstnameInput'];
    $lastname = $_POST['registerLastnameInput'];
    $dateofbirth = $_POST['registerYearInput'] . $_POST['registerMonthInput'] .$_POST['registerDayInput'];

    echo "</br>" . $dateofbirth . "</br>";

    $userData = new \atwork\Auth\Register\registerValidator;
    $newMemberData = $userData->validateUserData($username,$password,$email,$firstname,$lastname,$dateofbirth);

    $register = new \atwork\Auth\Register\Register();
    $userdata = new \atwork\Auth\Register\UserData();
    $newMember = $register->initRegistNewMember($userdata);
}
/*
$connection = new \atwork\Database\Connection();
$connect = $connection->getConnection();
        'playerScore' => $_SESSION['playerScore'],
        'dealerScore' => $_SESSION['dealerScore'],
        'playerCards' => $_SESSION['playerCards'],
        'playerCardPictures' => $_SESSION['playerCardPictures'],
        'dealerCards' => $_SESSION['dealerCards'],
        'dealerCardPictures' => $_SESSION['dealerCardPictures'],
*/

$twig->display('index.twig',
    [
        'session' => $_SESSION,
        'winner' => $winner,
        'contents' => $contents,
        'leftsidetext' => $leftsidetext
    ]);