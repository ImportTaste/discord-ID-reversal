package main

import (
	"bufio"
	"fmt"
	"io/ioutil"
	"net/http"
	"os"
)

func GetData(Id string) {
	Data, _ := http.Get("https://cyrustestingv2.000webhostapp.com/UserId.php?UserId=" + Id + "&Json=false")
	Body, _ := ioutil.ReadAll(Data.Body)
	fmt.Println("Tag: " + string(Body))
	fmt.Println("Input a new UserId: ")
}

func Reader() {
	scanner := bufio.NewScanner(os.Stdin)
	for {
		scanner.Scan()
		text := scanner.Text()
		if len(text) != 0 {
			GetData(text)
		}
	}
}

func main() {
	fmt.Println("Input a UserId: ")
	Reader()
}
