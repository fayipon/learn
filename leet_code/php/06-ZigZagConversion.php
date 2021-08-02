<?php
/*
ZigZag 解說

PAYPALISHIRING , numRow = 3
14字, x = 7 , y=3
  P,  , A,  , H,  , N,
  A, p, L, S, I, I, G,
  Y,  , I,  , R,  ,  ,

加了空白, 21
每四字+2
  
PAYPALISHIRING , numRow = 4
14字, x = 7 , y =4

P, , ,I, , ,I,
A, ,L,S, ,I,N,
Y,A, ,H,R, ,G,
P, , ,I, , , ,

加了空白, 28
每6字+6空白

  
PAYPALISHIRING , numRow = 5
14字, x = 6 , y =5

P, , , ,H, , , ,
A, , ,S,I, , , ,
Y, ,I, ,R, , , ,
P,L, , ,I,G, , ,
A, , , ,N, , , ,

加了空白, 40
每8字+12空白


3 -> 4,2
2* (numRow -1) ＝> 4

4 -> 6,6
2* (numRow -1) ＝> 6

5 -> 8,12
2* (numRow -1) ＝> 8



*/
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    static function convert($s, $numRows) {
        if ($numRows == 1 || $numRows == strlen($s)) {
            return $s;
        }

        $arr = str_split($s);
        $mod = 2 * ($numRows - 1);
        $output = array();
        foreach ($arr as $k=> $v) {
            if ($mod > 0) {
                $t = $k% $mod;
            } else {
                $t = 0;
            }

            if ($t >= $numRows) {
                $t = $mod - $t;
            }

            $output[$t] .= $v;
            
        }
        return implode($output);
    }
}

$s = "wlrbbmqbhcdarzowkkyhiddqscdxrjmowfrxsjybldbefsarcbynecdyggxxpklorellnmpapqfwkhopkmcoqhnwnkuewhsqmgbbuqcljjivswmdkqtbxixmvtrrbljptnsnfwzqfjmafadrrwsofsbcnuvqhffbsaqxwpqcacehchzvfrkmlnozjkpqpxrjxkitzyxacbhhkicqcoendtomfgdwdwfcgpxiqvkuytdlcgdewhtaciohordtqkvwcsgspqoqmsboaguwnnyqxnzlgdgwpbtrwblnsadeuguumoqcdrubetokyxhoachwdvmxxrdryxlmndqtukwagmlejuukwcibxubumenmeyatdrmydiajxloghiqfmzhl";
$numRows = 80;
$return = Solution::convert($s,$numRows);
var_dump($return);
?>
