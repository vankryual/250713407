function fn_Valform(){
            var sMsg = "";
            var snama = document.getElementById("nama").value;
            var semail = document.getElementById("email").value;
            var sumur = document.getElementById("umur").value;
            var skategori = document.getElementById("Kategori").value;
            var sRandom = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;


            if (document.getElementById("nama").value == ""){
                sMsg += "\n* Anda Belum Mengisi Nama";
            }
            if (document.getElementById("email").value == ""){
                sMsg += "\n* Anda Belum Mengisi email";
            }else if(!sRandom.test(semail)){
                sMsg += "\n* Format email Tidak Valid";
            }
            if (document.getElementById("umur").value == ""){
                sMsg += "\n* Anda Belum Mengisi Umur";
            }
            if (document.getElementById("Kategori").value == ""){
                sMsg += "\n* Anda Belum Memilih Jenis Acara";
            }

            var umur = parseInt(sumur);
            var info = "";

            if (umur < 15 || umur > 60) {
                sMsg += "\n* Umur harus berupa angka di antara 15 sampai 60 tahun";
            } else if (umur <= 25) {
             info = "PesertaMahasiswa";
             } else {
             info = "Peserta Umum";
             }

           
            if (sMsg !=  "") {
                alert ("peringatan:\n" + sMsg);
                return false;
            } else {
                return true;
            }
        }