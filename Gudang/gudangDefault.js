$(document).ready(function(){
    //------ tampilkan tanggal NOW -------------------
    setTanggal(); //panggil fungsi setTanggal()

    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });

    //------ menandai option aside yg sedang terpilih ----
    //$('#aside1').addClass('terpilih'); //asumsikan aside1 yg terpilih

    //------ men-slide option utk aside ----
    $("#minimizeOption").click(function(){
        $('#option').slideToggle("slow"); //klik tampil, klik sembunyi
    });

    $.session.set('page','1');

    $("#aside1").click(function(){
        aside1();
    });
    $("#aside2").click(function(){
        aside2();
    });
    $("#aside3").click(function(){
        aside3();
    });
    $("#aside4").click(function(){
        aside4();
    });
    $("#aside5").click(function(){
        aside5();
    });
    $("#aside6").click(function(){
        aside6();
    });
    $("#aside7").click(function(){
        aside7();
    });
    $("#aside8").click(function(){
        aside8();
    });
});

$(window).on('load', function () {
        var c = $.session.get('page');
        if(c==1)
            aside1();
        else if(c == 2)
            aside2();
        else if(c == 3)
            aside3();
        else if(c == 4)
            aside4();
        else if(c == 5)
            aside5();
        else if(c == 6)
            aside6();
        else if(c == 7)
            aside7();
        else if(c == 8)
            aside8();
    });
//------------------ fungsi ketika window di resize --------------
$(window).resize(function(){
    if ($(window).width() > 680) {   //ukuran dekstop
        $("#option").css('display','block');    //option di aside tampil
    }   
    else{   //ukuran smartphone
        $("#option").css('display','none');     //option di aside sembunyi
    }  
});

function aside1(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside1 span');
    $("#aside1").addClass('terpilih');
    $("div#konten").load("Gudang%20-%20Daftar%20Komik/daftarKomik.php");
    $("div#gantiHead").load("Gudang%20-%20Daftar%20Komik/headDaftarKomik.php");
    $.session.set('page','1');
}

function aside2(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").addClass('terpilih');
    $("div#konten").load("Gudang%20-%20Tambah%20Komik/tambahKomik.html");
    $("div#gantiHead").load("Gudang%20-%20Tambah%20Komik/headTambahKomik.html");
    $.session.set('page','2');
}

function aside3(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("Gudang%20-%20Daftar%20Penerbit/daftarPenerbit.php");
    $("div#gantiHead").load("Gudang%20-%20Daftar%20Penerbit/headDaftarPenerbit.php");
    $.session.set('page','3');
}

function aside4(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside4 span');
    $("#aside4").addClass('terpilih');
    $("div#konten").load("Gudang%20-%20Tambah%20Penerbit/tambahPenerbit.html");
    $("div#gantiHead").load("Gudang%20-%20Tambah%20Penerbit/headTambahPenerbit.html");
    $.session.set('page','4');
}

function aside5(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside5 span');
    $("#aside5").addClass('terpilih');
    $("div#konten").load("Gudang%20-%20Daftar%20Pengarang/daftarPengarang.php");
    $("div#gantiHead").load("Gudang%20-%20Daftar%20Pengarang/headDaftarPengarang.php");
    $.session.set('page','5');
}

function aside6(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside6 span');
    $("#aside6").addClass('terpilih');
    $("div#konten").load("Gudang%20-%20Tambah%20Pengarang/tambahPengarang.html");
    $("div#gantiHead").load("Gudang%20-%20Tambah%20Pengarang/headTambahPengarang.html");
    $.session.set('page','6');
}

function aside7(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside7 span');
    $("#aside7").addClass('terpilih');
    $("div#konten").load("Gudang%20-%20Daftar%20Supplier/daftarSupplier.php");
    $("div#gantiHead").load("Gudang%20-%20Daftar%20Supplier/headDaftarSupplier.php");
    $.session.set('page','7');
}

function aside8(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside8 span');
    $("#aside8").addClass('terpilih');
    $("div#konten").load("Gudang%20-%20Tambah%20Supplier/tambahSupplier.html");
    $("div#gantiHead").load("Gudang%20-%20Tambah%20Supplier/headTambahSupplier.html");
    $.session.set('page','8');
}

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