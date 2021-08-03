<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        foreach ($nums as $k => $v) {
            unset($nums[$k]);
            if ($k2 = array_search($target - $v, $nums)) {
                return [$k, $k2];
            }
        }
        return [];
    }
}
?>