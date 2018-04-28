var cek;

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
    $("#aside1").click(function(){aside1();});
    $("#aside2").click(function(){aside2();});
    $("#aside3").click(function(){aside3();});
    $("#aside4").click(function(){aside4();});
    $("#aside5").click(function(){aside5();});
    $("#aside6").click(function(){aside6();});
    $("#aside7").click(function(){aside1();});
    $("#aside8").click(function(){aside2();});
    $("#aside9").click(function(){aside3();});
    $("#aside10").click(function(){aside4();});
    $("#aside11").click(function(){aside5();});
    $("#aside12").click(function(){aside6();});
    $("#aside13").click(function(){aside1();});
    $("#aside14").click(function(){aside2();});
    $("#aside15").click(function(){aside3();});
    $("#aside16").click(function(){aside4();});
    $("#aside17").click(function(){aside5();});
    $("#aside18").click(function(){aside6();});
    $("#aside19").click(function(){aside1();});
    $("#aside20").click(function(){aside2();});
    $("#aside21").click(function(){aside3();});
    $("#aside22").click(function(){aside4();});
    $("#aside23").click(function(){aside5();});
    $("#aside24").click(function(){aside6();});
    $("#aside25").click(function(){aside1();});
    $("#aside26").click(function(){aside2();});
    $("#aside27").click(function(){aside3();});
});

$(window).on('load', function () {
    var c = $.session.get('page');
    if(c == null || c == 1)
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
    else if(c == 9)
        aside9();
    else if(c == 10)
        aside10();
    else if(c == 11)
        aside11();
    else if(c == 12)
        aside12();
    else if(c == 13)
        aside13();
    else if(c == 14)
        aside14();
    else if(c == 15)
        aside15();
    else if(c == 16)
        aside16();
    else if(c == 17)
        aside17();
    else if(c == 18)
        aside18();
    else if(c == 19)
        aside19();
    else if(c == 20)
        aside20();
    else if(c == 21)
        aside6();
    else if(c == 22)
        aside22();
    else if(c == 23)
        aside23();
    else if(c == 24)
        aside24();
    else if(c == 25)
        aside25();
    else if(c == 26)
        aside26();
    else if(c == 27)
        aside27();
});

function aside1(){
    $("#aside2").hide();
    $("#aside3").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside1 span');
    $("#aside1").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Daftar%20Karyawan/KontenHRDDaftarKaryawan.php");
    $("div#gantiHead").load("HRD%20-%20Daftar%20Karyawan/HeadHRDDaftarKaryawan.php");
    $.session.set('page','1');
}
function aside2(){
    $("#aside3").hide();
    $("#aside2").show();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").addClass('terpilih');
    $("div#konten").load("../HRD%20-%20Data%20Karyawan/KontenHRDDataKaryawan.php");
    $("div#gantiHead").load("../HRD%20-%20Data%20Karyawan/HeadHRDDataKaryawan.php");
    $.session.set('page','2');
}
function aside3(){
    $("#aside2").hide();
    $("#aside3").show();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Edit%20Karyawan/KontenHRDEditKaryawan.php");
    $("div#gantiHead").load("HRD%20-%20Edit%20Karyawan/HeadHRDEditKaryawan.php");
    $.session.set('page','3');
}
function aside4(){
    $("#aside2").hide();
    $("#aside3").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside4 span');
    $("#aside4").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Tambah%20Karyawan/KontenHRDTambahKaryawan.php");
    $("div#gantiHead").load("HRD%20-%20Tambah%20Karyawan/HeadHRDTambahKaryawan.php");
    $.session.set('page','4');
}
function aside5(){
    $("#aside2").hide();
    $("#aside3").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside5 span');
    $("#aside5").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Daftar%20Jabatan/KontenHRDDaftarJabatan.php");
    $("div#gantiHead").load("HRD%20-%20Daftar%20Jabatan/HeadHRDDaftarJabatan.php");
    $.session.set('page','5');
}
function aside6(){
    $("#aside2").hide();
    $("#aside3").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside6 span');
    $("#aside6").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Tambah%20Jabatan/KontenHRDTambahJabatan.php");
    $("div#gantiHead").load("HRD%20-%20Tambah%20Jabatan/HeadHRDTambahJabatan.php");
    $.session.set('page','6');
}

function pencetTRPengembalian(temp){
    //alert(temp.html());
    if($(temp).css("background-color") == "rgba(0, 100, 0, 0.6)") $(temp).removeClass("green");
    else {
        $(temp).addClass("green");
    }
}

function pencetTR(temp){
    var idMember = temp.children("td:nth-of-type(2)").html();
    var namaMember = temp.children("td:nth-of-type(3)").html();
    var email = temp.children("td:nth-of-type(4)").html();
    var gender = temp.children("td:nth-of-type(5)").html();
    var noIdentitas = temp.children("td:nth-of-type(6)").html(); 
    $("#popup").fadeIn();
    $("#blur").fadeIn();
    $("#popupIdMember").text(": "+idMember);
    $("#popupNamaMember").text(": "+namaMember);
    $("#popupEmail").text(": "+email);
    $("#popupGender").text(": "+gender);
    $("#popupNoIdentitas").text(": "+noIdentitas);
}

function pencetBlur(){
    $("#popup").css('display','none');
    $("#blur").css('display','none');
}

function searchNama(){
    var a = $("#inputID").val();
    $.ajax({
        type : 'post',
        data : {'id':a},
        url: 'PHP/Kasir%20-%20peminjaman/getNama.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#namaMember").val(response);
        }
     });
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