var cek;

$(document).ready(function(){
    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });
    //-------- kalau poup nya di scroll, panggil fungsi scrollDown(), biar simbolnya hilang-----
    $("#popupScroll").on('scroll', function () {
        scrollDown();
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
    $("#aside7").click(function(){aside7();});
    $("#aside8").click(function(){aside8();});
    $("#aside9").click(function(){aside9();});
    $("#aside10").click(function(){aside10();});
    $("#aside11").click(function(){aside11();});
    $("#aside12").click(function(){aside12();});
    $("#aside13").click(function(){aside13();});
    $("#aside14").click(function(){aside14();});
    $("#aside15").click(function(){aside15();});
    $("#aside16").click(function(){aside16();});
    $("#aside17").click(function(){aside17();});
    $("#aside18").click(function(){aside18();});
    $("#aside19").click(function(){aside19();});
    $("#aside20").click(function(){aside20();});
    $("#aside21").click(function(){aside21();});
    $("#aside22").click(function(){aside22();});
    $("#aside23").click(function(){aside23();});
    $("#aside24").click(function(){aside24();});
    $("#aside25").click(function(){aside25();});
    $("#aside26").click(function(){aside26();});
    $("#aside27").click(function(){aside27();});

    //menyembunyikan navigasi
    $("#aside7").hide();
    $("#aside8").hide();
    $("#aside9").hide();
    $("#aside10").hide();
    $("#aside11").hide();
    $("#aside12").hide();
    $("#aside13").hide();
    $("#aside14").hide();
    $("#aside15").hide();
    $("#aside16").hide();
    $("#aside17").hide();
    $("#aside18").hide();
    $("#aside19").hide();
    $("#aside20").hide();
    $("#aside21").hide();
    $("#aside22").hide();
    $("#aside23").hide();
    $("#aside24").hide();
    $("#aside25").hide();
    $("#aside26").hide();
    $("#aside27").hide();
    $("#aside28").hide();

    $("#asidehr7").hide();
    $("#asidehr8").hide();
    $("#asidehr9").hide();
    $("#asidehr10").hide();
    $("#asidehr11").hide();
    $("#asidehr12").hide();
    $("#asidehr13").hide();
    $("#asidehr14").hide();
    $("#asidehr15").hide();
    $("#asidehr16").hide();
    $("#asidehr17").hide();
    $("#asidehr18").hide();
    $("#asidehr19").hide();
    $("#asidehr20").hide();
    $("#asidehr21").hide();
    $("#asidehr22").hide();
    $("#asidehr23").hide();
    $("#asidehr24").hide();
    $("#asidehr25").hide();
    $("#asidehr26").hide();
    $("#asidehr27").hide();
    $("#asidehr28").hide();
    //menyembunyikan navigasi
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
    else if(c == 28)
        aside28();

});

function aside1(){
    $("#aside7").hide();
    $("#aside8").hide();
    $("#aside9").hide();
    $("#aside10").hide();
    $("#aside11").hide();
    $("#aside12").hide();
    $("#aside13").hide();
    $("#aside14").hide();
    $("#aside15").hide();
    $("#aside16").hide();
    $("#aside17").hide();
    $("#aside18").hide();
    $("#aside19").hide();
    $("#aside20").hide();
    $("#aside21").hide();
    $("#aside22").hide();
    $("#aside23").hide();
    $("#aside24").hide();
    $("#aside25").hide();
    $("#aside27").hide();
    $("#aside28").hide();

    $("#asidehr7").hide();
    $("#asidehr8").hide();
    $("#asidehr9").hide();
    $("#asidehr10").hide();
    $("#asidehr11").hide();
    $("#asidehr12").hide();
    $("#asidehr13").hide();
    $("#asidehr14").hide();
    $("#asidehr15").hide();
    $("#asidehr16").hide();
    $("#asidehr17").hide();
    $("#asidehr18").hide();
    $("#asidehr19").hide();
    $("#asidehr20").hide();
    $("#asidehr21").hide();
    $("#asidehr22").hide();
    $("#asidehr23").hide();
    $("#asidehr24").hide();
    $("#asidehr25").hide();
    $("#asidehr27").hide();
    $("#asidehr28").hide();
    if($("#aside6").is(":hidden")){
        $("#aside6").show();
        $("#asidehr6").show();
    }
    else{
        $("#aside6").hide();
        $("#asidehr6").hide();
    }
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside1 span');
    $("#aside1").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20daftar%20komik/KontenKasirDaftarKomik.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20daftar%20komik/HeadKasirDaftarKomik.php");
    $.session.set('page','1');
}
function aside2(){
    $("#aside6").hide();
    $("#aside15").hide();
    $("#aside16").hide();
    $("#aside17").hide();
    $("#aside18").hide();
    $("#aside19").hide();
    $("#aside20").hide();
    $("#aside21").hide();
    $("#aside22").hide();
    $("#aside23").hide();
    $("#aside24").hide();
    $("#aside25").hide();
    $("#aside26").hide();
    $("#aside27").hide();
    $("#aside28").hide();

    $("#asidehr6").hide();
    $("#asidehr15").hide();
    $("#asidehr16").hide();
    $("#asidehr17").hide();
    $("#asidehr18").hide();
    $("#asidehr19").hide();
    $("#asidehr20").hide();
    $("#asidehr21").hide();
    $("#asidehr22").hide();
    $("#asidehr23").hide();
    $("#asidehr24").hide();
    $("#asidehr25").hide();
    $("#asidehr27").hide();
    $("#asidehr28").hide();
    if($("#aside7").is(":hidden")){
        $("#aside7").show();
        $("#asidehr7").show();
        $("#aside8").show();
        $("#asidehr8").show();
        $("#aside9").show();
        $("#asidehr9").show();
        $("#aside10").show();
        $("#asidehr10").show();
        $("#aside11").show();
        $("#asidehr11").show();
        $("#aside12").show();
        $("#asidehr12").show();
        $("#aside13").show();
        $("#asidehr13").show();
        $("#aside14").show();
        $("#asidehr14").show();
    }
    else{
        $("#aside7").hide();
        $("#asidehr7").hide();
        $("#aside8").hide();
        $("#asidehr8").hide();
        $("#aside9").hide();
        $("#asidehr9").hide();
        $("#aside10").hide();
        $("#asidehr10").hide();
        $("#aside11").hide();
        $("#asidehr11").hide();
        $("#aside12").hide();
        $("#asidehr12").hide();
        $("#aside13").hide();
        $("#asidehr13").hide();
        $("#aside14").hide();
        $("#asidehr14").hide();
    }
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20daftar%20komik/KontenKasirDaftarKomik.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20daftar%20komik/HeadKasirDaftarKomik.php");
    $.session.set('page','2');
}
function aside3(){
    $("#aside6").hide();
    $("#aside7").hide();
    $("#aside8").hide();
    $("#aside9").hide();
    $("#aside10").hide();
    $("#aside11").hide();
    $("#aside12").hide();
    $("#aside13").hide();
    $("#aside14").hide();
    $("#aside19").hide();
    $("#aside20").hide();
    $("#aside21").hide();
    $("#aside22").hide();
    $("#aside23").hide();
    $("#aside24").hide();
    $("#aside25").hide();
    $("#aside26").hide();

    $("#asidehr6").hide();
    $("#asidehr7").hide();
    $("#asidehr8").hide();
    $("#asidehr9").hide();
    $("#asidehr10").hide();
    $("#asidehr11").hide();
    $("#asidehr12").hide();
    $("#asidehr13").hide();
    $("#asidehr14").hide();
    $("#asidehr19").hide();
    $("#asidehr20").hide();
    $("#asidehr21").hide();
    $("#asidehr22").hide();
    $("#asidehr23").hide();
    $("#asidehr24").hide();
    $("#asidehr25").hide();
    if($("#aside15").is(":hidden")){
        $("#aside15").show();
        $("#asidehr15").show();
        $("#aside16").show();
        $("#asidehr16").show();
        $("#aside17").show();
        $("#asidehr17").show();
        $("#aside18").show();
        $("#asidehr18").show();
    }
    else{
        $("#aside15").hide();
        $("#asidehr15").hide();
        $("#aside16").hide();
        $("#asidehr16").hide();
        $("#aside17").hide();
        $("#asidehr17").hide();
        $("#aside18").hide();
        $("#asidehr18").hide();
        $("#aside27").hide();
        $("#asidehr27").hide();
        $("#aside28").hide();
        $("#asidehr28").hide();
    }
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("HRD/HRD%20-%20Daftar%20Karyawan/KontenHRDDaftarKaryawan.php");
    $("div#gantiHead").load("HRD/HRD%20-%20Daftar%20Karyawan/HeadHRDDaftarKaryawan.php");
    $.session.set('page','3');
}
function aside4(){
    $("#aside6").hide();
    $("#aside7").hide();
    $("#aside8").hide();
    $("#aside9").hide();
    $("#aside10").hide();
    $("#aside11").hide();
    $("#aside12").hide();
    $("#aside13").hide();
    $("#aside14").hide();
    $("#aside15").hide();
    $("#aside16").hide();
    $("#aside17").hide();
    $("#aside18").hide();
    $("#aside24").hide();
    $("#aside25").hide();
    $("#aside26").hide();
    $("#aside27").hide();
    $("#aside28").hide();

    $("#asidehr6").hide();
    $("#asidehr7").hide();
    $("#asidehr8").hide();
    $("#asidehr9").hide();
    $("#asidehr10").hide();
    $("#asidehr11").hide();
    $("#asidehr12").hide();
    $("#asidehr13").hide();
    $("#asidehr14").hide();
    $("#asidehr15").hide();
    $("#asidehr16").hide();
    $("#asidehr17").hide();
    $("#asidehr18").hide();
    $("#asidehr24").hide();
    $("#asidehr25").hide();
    $("#asidehr27").hide();
    $("#asidehr28").hide();
    if($("#aside19").is(":hidden")){
        $("#aside19").show();
        $("#asidehr19").show();
        $("#aside20").show();
        $("#asidehr20").show();
        $("#aside21").show();
        $("#asidehr21").show();
        $("#aside22").show();
        $("#asidehr22").show();
        $("#aside23").show();
        $("#asidehr23").show();
    }
    else{
        $("#aside19").hide();
        $("#asidehr19").hide();
        $("#aside20").hide();
        $("#asidehr20").hide();
        $("#aside21").hide();
        $("#asidehr21").hide();
        $("#aside22").hide();
        $("#asidehr22").hide();
        $("#aside23").hide();
        $("#asidehr23").hide();
    }
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside4 span');
    $("#aside4").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20peminjaman/KontenKasirPeminjaman.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20peminjaman/HeadKasirPeminjaman.php");
    $.session.set('page','4');
}
function aside5(){
    $("#aside6").hide();
    $("#aside7").hide();
    $("#aside8").hide();
    $("#aside9").hide();
    $("#aside10").hide();
    $("#aside11").hide();
    $("#aside12").hide();
    $("#aside13").hide();
    $("#aside14").hide();
    $("#aside15").hide();
    $("#aside16").hide();
    $("#aside17").hide();
    $("#aside18").hide();
    $("#aside19").hide();
    $("#aside20").hide();
    $("#aside21").hide();
    $("#aside22").hide();
    $("#aside23").hide();
    $("#aside26").hide();
    $("#aside27").hide();
    $("#aside28").hide();

    $("#asidehr6").hide();
    $("#asidehr7").hide();
    $("#asidehr8").hide();
    $("#asidehr9").hide();
    $("#asidehr10").hide();
    $("#asidehr11").hide();
    $("#asidehr12").hide();
    $("#asidehr13").hide();
    $("#asidehr14").hide();
    $("#asidehr15").hide();
    $("#asidehr16").hide();
    $("#asidehr17").hide();
    $("#asidehr18").hide();
    $("#asidehr19").hide();
    $("#asidehr20").hide();
    $("#asidehr21").hide();
    $("#asidehr22").hide();
    $("#asidehr23").hide();
    $("#asidehr27").hide();
    $("#asidehr28").hide();
    if($("#aside24").is(":hidden")){
        $("#aside24").show();
        $("#asidehr24").show();
        $("#aside25").show();
        $("#asidehr25").show();
    }
    else{
        $("#aside24").hide();
        $("#asidehr24").hide();
        $("#aside25").hide();
        $("#asidehr25").hide();
    }
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside5 span');
    $("#aside5").addClass('terpilih');
    $("div#konten").load("Manager/managerDaftarPeminjaman/managerDaftarPeminjaman.php");
    $("div#gantiHead").load("Manager/managerDaftarPeminjaman/headManagerDaftarPeminjaman.php");
    $.session.set('page','5');
}
function aside6(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside6 span');
    $("#aside6").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Tambah%20Jabatan/KontenHRDTambahJabatan.php");
    $("div#gantiHead").load("HRD%20-%20Tambah%20Jabatan/HeadHRDTambahJabatan.php");
    $.session.set('page','6');
}
function aside7(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside7 span');
    $("#aside7").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20daftar%20komik/KontenKasirDaftarKomik.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20daftar%20komik/HeadKasirDaftarKomik.php");
    $.session.set('page','7');
}
function aside8(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside8 span');
    $("#aside8").addClass('terpilih');
    $("div#konten").load("Gudang/Gudang%20-%20Tambah%20Komik/tambahKomik.html");
    $("div#gantiHead").load("Gudang/Gudang%20-%20Tambah%20Komik/headTambahKomik.html");
    $.session.set('page','8');
}
function aside9(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside9 span');
    $("#aside9").addClass('terpilih');
    $("div#konten").load("Gudang/Gudang%20-%20Daftar%20Penerbit/daftarPenerbit.php");
    $("div#gantiHead").load("Gudang/Gudang%20-%20Daftar%20Penerbit/headDaftarPenerbit.php");
    $.session.set('page','9');
}
function aside10(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside10 span');
    $("#aside10").addClass('terpilih');
    $("div#konten").load("Gudang/Gudang%20-%20Tambah%20Penerbit/tambahPenerbit.html");
    $("div#gantiHead").load("Gudang/Gudang%20-%20Tambah%20Penerbit/headTambahPenerbit.html");
    $.session.set('page','10');
}
function aside11(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside11 span');
    $("#aside11").addClass('terpilih');
    $("div#konten").load("Gudang/Gudang%20-%20Daftar%20Pengarang/daftarPengarang.php");
    $("div#gantiHead").load("Gudang/Gudang%20-%20Daftar%20Pengarang/headDaftarPengarang.php");
    $.session.set('page','11');
}
function aside12(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside12 span');
    $("#aside12").addClass('terpilih');
    $("div#konten").load("Gudang/Gudang%20-%20Tambah%20Pengarang/tambahPengarang.html");
    $("div#gantiHead").load("Gudang/Gudang%20-%20Tambah%20Pengarang/headTambahPengarang.html");
    $.session.set('page','12');
}
function aside13(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside13 span');
    $("#aside13").addClass('terpilih');
    $("div#konten").load("Gudang/Gudang%20-%20Daftar%20Supplier/daftarSupplier.php");
    $("div#gantiHead").load("Gudang/Gudang%20-%20Daftar%20Supplier/headDaftarSupplier.php");
    $.session.set('page','13');
}
function aside14(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside14 span');
    $("#aside14").addClass('terpilih');
    $("div#konten").load("Gudang/Gudang%20-%20Tambah%20Supplier/tambahSupplier.html");
    $("div#gantiHead").load("Gudang/Gudang%20-%20Tambah%20Supplier/headTambahSupplier.html");
    $.session.set('page','14');
}
function aside15(){
    $("#aside27").hide();
    $("#asidehr27").hide();
    $("#aside28").hide();
    $("#asidehr28").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside15 span');
    $("#aside15").addClass('terpilih');
    $("div#konten").load("HRD/HRD%20-%20Daftar%20Karyawan/KontenHRDDaftarKaryawan.php");
    $("div#gantiHead").load("HRD/HRD%20-%20Daftar%20Karyawan/HeadHRDDaftarKaryawan.php");
    $.session.set('page','15');
}
function aside16(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside16 span');
    $("#aside16").addClass('terpilih');
    $("div#konten").load("HRD/HRD%20-%20Tambah%20Karyawan/KontenHRDTambahKaryawan.php");
    $("div#gantiHead").load("HRD/HRD%20-%20Tambah%20Karyawan/HeadHRDTambahKaryawan.php");
    $.session.set('page','16');
}
function aside17(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside17 span');
    $("#aside17").addClass('terpilih');
    $("div#konten").load("HRD/HRD%20-%20Daftar%20Jabatan/KontenHRDDaftarJabatan.php");
    $("div#gantiHead").load("HRD/HRD%20-%20Daftar%20Jabatan/HeadHRDDaftarJabatan.php");
    $.session.set('page','17');
}
function aside18(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside18 span');
    $("#aside18").addClass('terpilih');
    $("div#konten").load("HRD/HRD%20-%20Tambah%20Jabatan/KontenHRDTambahJabatan.php");
    $("div#gantiHead").load("HRD/HRD%20-%20Tambah%20Jabatan/HeadHRDTambahJabatan.php");
    $.session.set('page','18');
}
function aside19(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside19 span');
    $("#aside19").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20peminjaman/KontenKasirPeminjaman.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20peminjaman/HeadKontenKasirPeminjaman.php");
    $.session.set('page','19');
}
function aside20(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside20 span');
    $("#aside20").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20pengembalian/KontenKasirPengembalian.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20pengembalian/HeadKasirPengembalian.php");
    $.session.set('page','20');
}
function aside21(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside21 span');
    $("#aside21").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20daftar%20komik/KontenKasirDaftarKomik.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20daftar%20komik/HeadKasirDaftarKomik.php");
    $.session.set('page','21');
}
function aside22(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside22 span');
    $("#aside22").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20tambah%20member/kasirTambahMember.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20tambah%20member/HeadTambahMember.php");
    $.session.set('page','22');
}
function aside23(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside23 span');
    $("#aside23").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20daftar%20member/KontenKasirDaftarMember.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20daftar%20member/HeadKasirDaftarMember.php");
    $.session.set('page','23');
}
function aside24(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside24 span');
    $("#aside24").addClass('terpilih');
    $("div#konten").load("Manager/managerDaftarPeminjaman/managerDaftarPeminjaman.php");
    $("div#gantiHead").load("Manager/managerDaftarPeminjaman/headManagerDaftarPeminjaman.php");
    $.session.set('page','24');
}
function aside25(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside25 span');
    $("#aside25").addClass('terpilih');
    $("div#konten").load("Manager/managerLaporanKeuangan/kontenManagerLaporanKeuangan.php");
    $("div#gantiHead").load("Manager/managerLaporanKeuangan/headManagerLaporanKeuangan.php");
    $.session.set('page','25');
}
function aside26(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside26 span');
    $("#aside26").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Tambah%20Jabatan/KontenHRDTambahJabatan.php");
    $("div#gantiHead").load("HRD%20-%20Tambah%20Jabatan/HeadHRDTambahJabatan.php");
    $.session.set('page','26');
}
function aside27(){
    $("#aside15").show();
    $("#asidehr15").show();
    $("#aside16").show();
    $("#asidehr16").show();
    $("#aside17").show();
    $("#asidehr17").show();
    $("#aside18").show();
    $("#asidehr18").show();
    $("#aside28").hide();
    $("#asidehr28").hide();
    $("#aside27").show();
    $("#asidehr27").show();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside27 span');
    $("#aside27").addClass('terpilih');
    $("div#konten").load("HRD/HRD%20-%20Data%20Karyawan/KontenHRDDataKaryawan.php");
    $("div#gantiHead").load("HRD/HRD%20-%20Data%20Karyawan/HeadHRDDataKaryawan.php");
    $.session.set('page','27');
}
function aside28(){
    $("#aside15").show();
    $("#asidehr15").show();
    $("#aside16").show();
    $("#asidehr16").show();
    $("#aside17").show();
    $("#asidehr17").show();
    $("#aside18").show();
    $("#asidehr18").show();
    $("#aside27").hide();
    $("#asidehr27").hide();
    $("#aside28").show();
    $("#asidehr28").show();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside28 span');
    $("#aside28").addClass('terpilih');
    $("div#konten").load("HRD/HRD%20-%20Edit%20Karyawan/KontenHRDEditKaryawan.php");
    $("div#gantiHead").load("HRD/HRD%20-%20Edit%20Karyawan/HeadHRDEditKaryawan.php");
    $.session.set('page','28');
}

function pencetTRPengembalian(temp){
    if($(temp).children("td.ganti").css("background-color") == "rgba(0, 100, 0, 0.6)"){
        $(temp).children("td.ganti").removeClass("green");
        $(temp).children("td.tandaTable").html("<td class='tandaTable'><i class='fas fa-check' style='color:grey'></i></td>");
    } 
    else {
        $(temp).children("td.ganti").addClass("green");
        $(temp).children("td.tandaTable").html("<td class='tandaTable'><i class='fas fa-check' style='color:green'></i></td>");
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

/*tampilkan pop up detail komik*/
function popupDetailKomik(temp){
    //ambil semua yg dibutuhkan utk ditampilkan di popup
    $judul = temp.children(".judul").text();
    $popular = temp.children(".keperluanPopup").children(".popular").text();    
    $specialEdition = temp.children(".keperluanPopup").children(".specialEdition").text();
    $status = temp.children(".status").text();
    $hargaSewa = temp.children(".keperluanPopup").children(".hargaSewa").text();
    $lamaSewa = temp.children(".keperluanPopup").children(".lamaSewa").text();
    $idBuku = temp.children(".keperluanPopup").children(".idBuku").text();
    $penulis = temp.children(".keperluanPopup").children(".penulis").text();
    $penerbit = temp.children(".keperluanPopup").children(".penerbit").text();
    $tanggalTerbit = temp.children(".keperluanPopup").children(".tanggalTerbit").text();
    $jumlahHalaman = temp.children(".keperluanPopup").children(".jumlahHalaman").text();
    $beratBuku = temp.children(".keperluanPopup").children(".beratBuku").text();
    $jenisCover = temp.children(".keperluanPopup").children(".jenisCover").text();
    $dimensi = temp.children(".keperluanPopup").children(".dimensi").text();
    $jumlahHalaman = temp.children(".keperluanPopup").children(".jumlahHalaman").text();
    $text = temp.children(".keperluanPopup").children(".text").text();
    $stok = temp.children("p").children(".stok").text();
    $tersedia = temp.children("p").children(".tersedia").text();
    $dipinjam = temp.children(".keperluanPopup").children(".dipinjam").text();
    $genre = temp.children(".keperluanPopup").children(".genre").text();
    $rating = temp.children(".keperluanPopup").children(".rating").text();
    $rak = temp.children(".keperluanPopup").children(".rak").text();
    $isiSinopsis = temp.children(".keperluanPopup").children(".isiSinopsis").text();
    //tampilkan di popup
    $("#popupJudul").text($judul);
    $("#popupPopular").text($popular);
    $("#popupSpecial").text($specialEdition);
    $("#popupStatus").text($status);
    $("#popupHarga").text("Rp "+$hargaSewa);
    $("#popupLama").text($lamaSewa+" hari");
    $("#popupIdBuku").text($idBuku);
    $("#popupPenulis").text($penulis);
    $("#popupPenerbit").text($penerbit);
    $("#popupTanggalTerbit").text($tanggalTerbit);
    $("#popupJumlahHalaman").text($jumlahHalaman);
    $("#popupBerat").text($beratBuku+" gr");
    $("#popupJenisCover").text($jenisCover);
    $("#popupDimensi").text($dimensi+" cm");
    $("#popupText").text($text);
    $("#popupStok").text($stok+" buku");
    $("#popupTersedia").text($tersedia+" buku");
    $("#popupDipinjam").text($dipinjam+" kali");
    $("#popupGenre").text($genre);
    $("#popupRating").text($rating);
    $("#popupRak").text($rak);
    $("#popupSinopsis").text($isiSinopsis);

    $("#popup").fadeIn();
    $("#blur").fadeIn();
}

//----- fungsi menampilkan & sembunyikan petunjuk scroll down saat POP UP ---------
function scrollDown(){
    var scrollTop = $("#popupScroll").scrollTop(); //sejauh apa user telah meng-scroll
    if (scrollTop > 120) {  //bila user sudah scroll lebih besar dari 120, tombol disembunyikan
        $('#tombolDown').css('display','none');
    } else { //bila user belum scroll jauh, tombol ditampilkan
        $('#tombolDown').css('display','block');
    }
}