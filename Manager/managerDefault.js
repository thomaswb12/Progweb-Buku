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

function pencetTR(temp){
    var idMember = temp.children("td:nth-of-type(2)").html();
    var namaMember = temp.children("td:nth-of-type(3)").html();
    var email = temp.children("td:nth-of-type(4)").html();
    var gender = temp.children("td:nth-of-type(5)").html();
        if(gender=="Wanita") gender=1;
        else gender=2;
    var noIdentitas = temp.children("td:nth-of-type(6)").html(); 
    var alamat = temp.children("td:nth-of-type(7)").html(); 
    var tanggalLahir = temp.children("td:nth-of-type(8)").html(); 
    var telepon = temp.children("td:nth-of-type(9)").html(); 
    $("#popupIdMember").val(idMember);
    $("#popupIdMemberDummy").val(idMember);
    $("#popupNamaMember").val(namaMember);
    $("#popupEmail").val(email);
    $("#popupGender").val(gender);
    $("#popupNoIdentitas").val(noIdentitas);
    $("#popupAlamat").val(alamat);
    $("#popupTanggalLahir").val(tanggalLahir);
    $("#popupTelepon").val(telepon);
    
    $("#popup").fadeIn();
    $("#blur").fadeIn();
}

function pencetBlur(){
    $("#popup").css('display','none');
    $("#blur").css('display','none');
}