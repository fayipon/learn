/**
 * @param {number[]} nums
 * @param {number} target
 * @return {number[]}
 */
var twoSum = function(nums, target) {
    var obj = nums.entries();
    for(let [k,val] of obj){
        delete nums[k];
        var k2 = nums.indexOf(target-val);
        if (k2 != -1) {
            return [k,k2];
        }
    }
    return [];
};
/*
Runtime: 152 ms, faster than 24.37% of JavaScript online submissions for Two Sum.
Memory Usage: 41.4 MB, less than 16.05% of JavaScript online submissions for Two Sum.
*/
