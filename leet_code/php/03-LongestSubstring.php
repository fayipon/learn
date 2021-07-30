<?php

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $max = $len = 0;
        $current = "";
        for ($i=0;$i<strlen($s);$i++) {
            if (strpos($current, $s[$i]) !== false) {
                $current = substr($current, strpos($current, $s[$i])+1);
                $len = strlen($current);
            }
            $current .= $s[$i];
            $len++; 
            $max = max($max, $len);
        }
        
        return $max;
    }