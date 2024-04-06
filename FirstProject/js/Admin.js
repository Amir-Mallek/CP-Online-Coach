function sevenBoom(arr) {
    arr.forEach(x => {
        let text = x.toString();
        for(let i = 0 ; i <text.length ; i++){
            if (text[i] == '7') console.log("boom");
        }
    })
    console.log("no");
}
sevenBoom([2, 6, 7, 9, 3]);