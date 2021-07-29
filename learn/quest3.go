/*
bubble sort
氣泡排序

function的使用
遞迴的使用
*/

package main

import (
	"fmt"
	"math/rand"
	"time"
)

func main() {

	random_num := generateRandomNumber(0, 100, 10)
	fmt.Println("before bubble sort: ", random_num)

	bubbleSort(random_num, len(random_num))
	fmt.Println("\nafter bubble sort: ", random_num)

}

// 生成隨機數
func generateRandomNumber(start int, end int, count int) []int {

	if end < start || (end-start) < count {
		return nil
	}

	nums := make([]int, 0)
	r := rand.New(rand.NewSource(time.Now().UnixNano()))
	for len(nums) < count {
		num := r.Intn((end - start)) + start

		exist := false
		for _, v := range nums {
			if v == num {
				exist = true
				break
			}
		}

		if !exist {
			nums = append(nums, num)
		}
	}

	return nums
}

// 氣泡排序
func bubbleSort(arr []int, len int) {

	if len == 1 {
		return
	}

	for i := 0; i < len-1; i++ {
		if arr[i] > arr[i+1] {
			arr[i], arr[i+1] = arr[i+1], arr[i]
		}
	}
	bubbleSort(arr, len-1)
}
