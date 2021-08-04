<?php
function nestedAnagrams($s, $t) {

    $var_columns = array("s","t");
    foreach($var_columns as $kk => $vv) {

        $key = $$vv. "_tmp";
        $key = explode(" ",$$vv);
        foreach ($key as $k => $v) {
            $tmp = str_split($v);
            sort($tmp);
            $data[] = $tmp;
        }
    }

    if (($data[0] == $data[2]) && ($data[1] == $data[3])) {
        return true;
    }
    returm false;

}

$s = "bored cat";
$t = "act robed";
nestedAnagrams($s, $t);
?>