/*
Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.
*/
package main

import "fmt"

func main() {

	nums := make([]int, 5)
	nums[0] = -1
	nums[1] = -2
	nums[2] = -3
	nums[3] = -4
	nums[4] = -5

	tmp := twoSum(nums, -8)
	fmt.Println(tmp)

}

func twoSum(nums []int, target int) []int {

	pos := make([]int, 2)
	var c int

	for k, v := range nums {
		c = target - v
		for kk, eachItem := range nums {

			if eachItem == c && k != kk {
				pos[0] = kk
				pos[1] = k
				break
			}
		}
	}

	return pos
}
