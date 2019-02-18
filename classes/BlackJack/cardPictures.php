<?php

namespace atwork\BlackJack;

class CardPictures
{
    public function getPlayerCardsPicture(): array
    {
        $hands = new Hands();
        $playerCards = $hands->getPlayerHands();
        echo "</br>";
        echo "</br>";
        print_r($playerCards);
        echo "</br>";
        $playerPictureCards = Array();

        for ($i = 0; $i < sizeof($playerCards); $i++) {
            $playerPictureCards[$i] = self::cardPicture($playerCards[$i]);
        }
        return $playerPictureCards;
    }

    public function getDealerCardsPicture(): array
    {
        $hands = new Hands();
        $dealerCards = $hands->getDealerHands();
        print_r($dealerCards);
        echo "</br>";
        echo "</br>";
        $dealerPictureCards = Array();

        for ($i = 0; $i < sizeof($dealerCards); $i++) {
            $dealerPictureCards[$i] = self::cardPicture($dealerCards[$i]);
        }
        return $dealerPictureCards;

    }

    private function cardPicture($card)
    {
        Switch ($card) {
            case 'C2' :
                return 'cardPictures/2C.png';
                break;

            case 'C3':
                return 'cardPictures/3C.png';
                break;

            case 'C4' :
                return 'cardPictures/4C.png';
                break;

            case 'C5':
                return 'cardPictures/5C.png';
                break;

            case 'C6' :
                return 'cardPictures/6C.png';
                break;

            case 'C7':
                return 'cardPictures/7C.png';
                break;

            case 'C8' :
                return 'cardPictures/8C.png';
                break;

            case 'C9':
                return 'cardPictures/9C.png';
                break;

            case 'C10' :
                return 'cardPictures/10C.png';
                break;

            case 'CJ':
                return 'cardPictures/JC.png';
                break;

            case 'CQ' :
                return 'cardPictures/QC.png';
                break;

            case 'CK':
                return 'cardPictures/KC.png';
                break;

            case 'CA' :
                return 'cardPictures/AH.png';
                break;

            case 'H2' :
                return 'cardPictures/2H.png';
                break;

            case 'H3':
                return 'cardPictures/3H.png';
                break;

            case 'H4' :
                return 'cardPictures/4H.png';
                break;

            case 'H5':
                return 'cardPictures/5H.png';
                break;

            case 'H6' :
                return 'cardPictures/6H.png';
                break;

            case 'H7':
                return 'cardPictures/7H.png';
                break;

            case 'H8' :
                return 'cardPictures/8H.png';
                break;

            case 'H9':
                return 'cardPictures/9H.png';
                break;

            case 'H10' :
                return 'cardPictures/10H.png';
                break;

            case 'HJ':
                return 'cardPictures/JH.png';
                break;

            case 'HQ' :
                return 'cardPictures/QH.png';
                break;

            case 'HK':
                return 'cardPictures/KH.png';
                break;

            case 'HA' :
                return 'cardPictures/AH.png';
                break;

            case 'D2' :
                return 'cardPictures/2D.png';
                break;

            case 'D3':
                return 'cardPictures/3D.png';
                break;

            case 'D4' :
                return 'cardPictures/4D.png';
                break;

            case 'D5':
                return 'cardPictures/5D.png';
                break;

            case 'D6' :
                return 'cardPictures/6D.png';
                break;

            case 'D7':
                return 'cardPictures/7D.png';
                break;

            case 'D8' :
                return 'cardPictures/8D.png';
                break;

            case 'D9':
                return 'cardPictures/9D.png';
                break;

            case 'D10' :
                return 'cardPictures/10D.png';
                break;

            case 'DJ':
                return 'cardPictures/JD.png';
                break;

            case 'DQ' :
                return 'cardPictures/QD.png';
                break;

            case 'DK':
                return 'cardPictures/KD.png';
                break;

            case 'DA' :
                return 'cardPictures/AD.png';
                break;

            case 'S2' :
                return 'cardPictures/2S.png';
                break;

            case 'S3':
                return 'cardPictures/3S.png';
                break;

            case 'S4' :
                return 'cardPictures/4S.png';
                break;

            case 'S5':
                return 'cardPictures/5S.png';
                break;

            case 'S6' :
                return 'cardPictures/6S.png';
                break;

            case 'S7':
                return 'cardPictures/7S.png';
                break;

            case 'S8' :
                return 'cardPictures/8S.png';
                break;

            case 'S9':
                return 'cardPictures/9S.png';
                break;

            case 'S10' :
                return 'cardPictures/10S.png';
                break;

            case 'SJ':
                return 'cardPictures/JS.png';
                break;

            case 'SQ' :
                return 'cardPictures/QS.png';
                break;

            case 'SK':
                return 'cardPictures/KS.png';
                break;

            case 'SA' :
                return 'cardPictures/AS.png';
                break;

            default :
                return 'cardPictures/green_back.png';
                break;
        }
    }
}