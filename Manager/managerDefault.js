$(document).ready(function(){
    //------ tampilkan tanggal NOW -------------------
    setTanggal(); //panggil fungsi setTanggal()

    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });

    //------ menandai option aside yg sedang terpilih ----
    $('#aside1').addClass('terpilih'); //asumsikan aside1 yg terpilih
    $('#aside2').hide();

    //------ men-slide option utk aside ----
    $("#minimizeOption").click(function(){
        $('#option').slideToggle("slow"); //klik tampil, klik sembunyi
    });

    $("#aside1").click(function(){aside1();});
    $("#aside2").click(function(){aside2();});
    $("#aside3").click(function(){aside3();});

});

function aside1(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside1 span');
    $("#aside1").addClass('terpilih');
    $("div#konten").load("managerDaftarPeminjaman/managerDaftarPeminjaman.php");
    $("div#gantiHead").load("managerDaftarPeminjaman/headManagerDaftarPeminjaman.php");
}

function aside2(){
    
}

function aside3(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("managerLaporanKeuangan/kontenManagerLaporanKeuangan.php");
    $("div#gantiHead").load("managerLaporanKeuangan/headManagerLaporanKeuangan.php");
}


//------------------ fungsi ketika window di resize --------------
$(window).resize(function(){
    if ($(window).width() > 680) {   //ukuran dekstop
        $("#option").css('display','block');    //option di aside tampil
    }   
    else{   //ukuran smartphone
        $("#option").css('display','none');     //option di aside sembunyi
    }  
});

//----- fungsi menampilkan & sembunyikan tombol utk balik ke atas ---------
function backToTop(){
    var scrollTop = $(window).scrollTop(); //sejauh apa user telah meng-scroll
    if (scrollTop > 120) {  //bila user sudah scroll lebih besar dari 120, tombol ditampilkan
        $('#tombolUp').css('display','block');
    } else { //bila user belum scroll jauh, tombol disembunyikan
        $('#tombolUp').css('display','none');
    }
}

//----------- fungsi utk memasukkan tanggal NOW ke p#tanggal di header ----------
function setTanggal(){ 
    var n =  new Date();
    var day = new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
    var date = n.getDate();
    var month = new Array("Januari", "Februari", "Maret", "April", "Mei", "Agustus", "September", "Oktober", "November", "Desember");
    var year = n.getFullYear();
    //tampilkan dalam format DAY,DATE MONTH YEAR
    $('p#tanggal').text(day[n.getDay()] + ", " + date + " " + month[n.getMonth() + 1] + " " + year);
}