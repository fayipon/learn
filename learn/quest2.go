/*
有間企業, 要發放業務獎金
當利潤高於0時,低於10萬時, 發放獎金10%
當利潤高於10萬時,低於20萬時, 發放獎金7.5%
當利潤高於20萬時,低於40萬時, 發放獎金5%
當利潤高於40萬時,低於60萬時, 發放獎金3%
當利潤高於60萬時, 低於100萬時,發放獎金1.5%
*/
package main

import (
	"encoding/json"
	"fmt"
	"io"
	"log"
	"strings"
)

const jsonStream = `[
	{"min":0,"max":100000,"percent":10},
	{"min":100000,"max":200000,"percent":7.5},
	{"min":200000,"max":400000,"percent":5},
	{"min":400000,"max":600000,"percent":3},
	{"min":600000,"max":10000000,"percent":1.5}]`

type Message []struct {
	Min     int     `json:"min"`
	Max     int     `json:"max"`
	Percent float32 `json:"percent"`
}

func main() {

	var bouns int

	fmt.Println("请输入利润金额：")
	fmt.Scan(&bouns)

	dec := json.NewDecoder(strings.NewReader(jsonStream))
	for {
		var m Message
		if err := dec.Decode(&m); err == io.EOF {
			break
		} else if err != nil {
			log.Fatal(err)
		}

		for i := range m {
			if (bouns > m[i].Min) && (bouns <= m[i].Max) {
				fmt.Println("應得獎勵: ", m[i].Percent*float32(bouns)/100)
			}
		}
	}

}
