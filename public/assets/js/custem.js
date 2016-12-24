 window.setTimeout("waktu()",1000); 
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var yy = date.getYear();
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var year = (yy < 1000) ? yy + 1900 : yy;
            var tanggalSekarang = day + " " + months[month] + " " + year+" ";
       
            function waktu() { 
            
               setTimeout("waktu()",1000); 
                var tanggal = new Date(); 
                document.getElementById("tanggalSekarang").innerHTML = tanggalSekarang;
                document.getElementById("jam").innerHTML = tanggal.getHours(); 
                document.getElementById("menit").innerHTML = tanggal.getMinutes();
                document.getElementById("detik").innerHTML = tanggal.getSeconds();
            }