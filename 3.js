const cetak_gambar = (num) => {
    if(num % 2 != 0){
        let mid = num/2+0.5;
        for(let i = 1; i <= num; i++) {
            let output = "";
            for(let j = 1; j <= num; j++) {
                if(((j == 1 && (i == 1 || i == mid || i == num)) || (j == num && (i == 1 || i == mid || i == num)) || j == mid || i == mid) && !(i == mid && j == mid)){
                    output += "+";
                } else {
                    output += "#";
                } 
            }
            console.log(output);
        };
    } else {
        console.log("Harus angka ganjil")
    }
};
cetak_gambar(7);

