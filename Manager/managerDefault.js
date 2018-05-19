$(document).ready(function(){
    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });

    //------ menandai option aside yg sedang terpilih ----
//    $('#aside1').addClass('terpilih'); //asumsikan aside1 yg terpilih
//    $('#aside2').hide();

    //------ men-slide option utk aside ----
    $("#minimizeOption").click(function(){
        $('#option').slideToggle("slow"); //klik tampil, klik sembunyi
    });

    $("#aside1").click(function(){aside1();});
    $("#aside2").click(function(){aside2();});
    $("#aside3").click(function(){aside3();});

});

$(window).on('load', function () {
    var c = $.session.get('page');
    if(c == null || c == 1)
        aside1();
    else if(c == 2)
        aside2();
    else if(c == 3)
        aside3();
});

function aside1(){
    $("#aside2").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside1 span');
    $("#aside1").addClass('terpilih');
    $("div#konten").load("managerDaftarPeminjaman/managerDaftarPeminjaman.php");
    $("div#gantiHead").load("managerDaftarPeminjaman/headManagerDaftarPeminjaman.php");
    $.session.set('page','1');
    searchDaftarPeminjaman();
}

function aside2(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").show().addClass('terpilih');
    $("div#konten").load("managerDetailPeminjaman/kontenManagerDetailPeminjaman.php");
    $("div#gantiHead").load("managerDetailPeminjaman/headManagerDetailPeminjaman.php");
    $.session.set('page','2');
}

function aside3(){
    $("#aside2").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("managerLaporanKeuangan/kontenManagerLaporanKeuangan.php");
    $("div#gantiHead").load("managerLaporanKeuangan/headManagerLaporanKeuangan.php");
    $.session.set('page','3');
    searchDaftarLaporanKeuangan();
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

//----- fungsi menampilkan daftar peminjaman ke managerDaftarPeminjaman ---------
function searchDaftarPeminjaman(){
    $('#inputSearchBy').val() !="" ? $keyword = $('#inputSearchBy').val(): $keyword ="";
    $searchby = $('select#selectSearchBy').val();
    $.ajax({
        type : 'post',
        data : {'keyword':$keyword,'searchby':$searchby,'status':0},
        url: '../functionPHP/isiKontenDaftarPeminjaman.php',
        success: function (response) {
            $("tbody").html(response);
        }
    });
}

//tampilkan pop up detail peminjaman ketika tr tabel di manager-daftarPeminjaman di klik
function tampilPopupDetailPeminjaman(temp){
    $idMember = temp.children("td:nth-of-type(2)").html();
    $("#popup").fadeIn();
    $("#blur").fadeIn();
    $.ajax({
        type : 'post',
        data : {'keyword':$idMember},
        url: '../functionPHP/popupDaftarPeminjaman.php',
        success: function (response) {
            $("#parentIsiPopup").html(response);
        }
    });
}

function pencetBlur(){
    $("#popup").css('display','none');
    $("#blur").css('display','none');
}

function searchDaftarLaporanKeuangan(){
    $('#periodeAwal').val() !="" ? $awal = $('#periodeAwal').val(): $awal ="";
    $('#periodeAkhir').val() !="" ? $akhir = $('#periodeAkhir').val(): $akhir ="";
    $.ajax({
        type : 'post',
        data : {'awal':$awal,'akhir':$akhir},
        url: '../functionPHP/isiKontenDaftarLaporanKeuangan.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            $("tbody").html(response);
        }
    })
}