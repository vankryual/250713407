var iJam;

var sJenis;


iJam = prompt("Masukkan Lama Parkir (jam). ", 1);
sJenis = prompt("Jenis Kendaraan: (M)otor atau Mo(B)il?", "M");

if (iJam > 3 ){
    if (sJenis == "M"){
        alert("Tarif parkir motor  Rp 6.000");
        
    }else{
        alert("Tarif parkir mobil  Rp 12.000");
    }


} else {
    if (sJenis == "M"){
        alert("Tarif parkir motor  Rp 3.000");
        
    }else{
        alert("Tarif parkir mobil  Rp 6.000");
    


    }

}



    
    