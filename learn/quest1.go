/*
數字1,2,3,4 , 列出三位數且數字不重覆的組合
*/
package main

import "fmt"

func main() {

	var nums [4]int
	nums[0] = 1
	nums[1] = 2
	nums[2] = 3
	nums[3] = 4

	for _, x := range nums {
		for _, y := range nums {
			for _, z := range nums {

				if (x != y) && (x != z) && (y != z) {
					fmt.Println("組合 : ", x, y, z)
				}
			}
		}
	}

}
