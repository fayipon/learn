<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $nums1 = array_merge($nums1,$nums2);
        sort($nums1);

        $f = floor(count($nums1)/2);
        if(count($nums1) % 2 == 0){
            return ($nums1[$f] + $nums1[$f-1])/2.0;
        }else{
            return $nums1[$f];
        }
    }
}
?>