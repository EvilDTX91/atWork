<?php

namespace atwork\classes;
class CardValue
{
    public function getCardValue($cardname)
    {
        return cardValue($cardname);
    }

    private static function cardValue($cardname)
    {
        Switch ($cardname) {
            case 'H1':
                return 1;
                break;
            case 'H2':
                return 2;
                break;
            case 'H3':
                return 3;
                break;
            case 'H4':
                return 4;
                break;
            case 'H5':
                return 5;
                break;
            case 'H6':
                return 6;
                break;
            case 'H7':
                return 7;
                break;
            case 'H8':
                return 8;
                break;
            case 'H9':
                return 9;
                break;
            case 'H10':
                return 10;
                break;
            case 'HJ':
                return 10;
                break;
            case 'HQ':
                return 10;
                break;
            case 'HK':
                return 10;
                break;
            case 'HA':
                return 10;
                break;
            case 'S1':
                return 1;
                break;
            case 'S2':
                return 2;
                break;
            case 'S3':
                return 3;
                break;
            case 'S4':
                return 4;
                break;
            case 'S5':
                return 5;
                break;
            case 'S6':
                return 6;
                break;
            case 'S7':
                return 7;
                break;
            case 'S8':
                return 8;
                break;
            case 'S9':
                return 9;
                break;
            case 'S10':
                return 10;
                break;
            case 'SJ':
                return 10;
                break;
            case 'SQ':
                return 10;
                break;
            case 'SK':
                return 10;
                break;
            case 'SA':
                return 10;
                break;
            case 'D1':
                return 1;
                break;
            case 'D2':
                return 2;
                break;
            case 'D3':
                return 3;
                break;
            case 'D4':
                return 4;
                break;
            case 'D5':
                return 5;
                break;
            case 'D6':
                return 6;
                break;
            case 'D7':
                return 7;
                break;
            case 'D8':
                return 8;
                break;
            case 'D9':
                return 9;
                break;
            case 'D10':
                return 10;
                break;
            case 'DJ':
                return 10;
                break;
            case 'DQ':
                return 10;
                break;
            case 'DK':
                return 10;
                break;
            case 'DA':
                return 10;
                break;
            case 'C1':
                return 1;
                break;
            case 'C2':
                return 2;
                break;
            case 'C3':
                return 3;
                break;
            case 'C4':
                return 4;
                break;
            case 'C5':
                return 5;
                break;
            case 'C6':
                return 6;
                break;
            case 'C7':
                return 7;
                break;
            case 'C8':
                return 8;
                break;
            case 'C9':
                return 9;
                break;
            case 'C10':
                return 10;
                break;
            case 'CJ':
                return 10;
                break;
            case 'CQ':
                return 10;
                break;
            case 'CK':
                return 10;
                break;
            case 'CA':
                return 10;
                break;
            default :
                return 0;
                break;
        }
    }

}