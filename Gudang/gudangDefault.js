$(document).ready(function(){
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
    $("#asideEksemplar").click(function(){
        asideEksemplar();
    });
    $("#tombolCancel").click(function(){
        aside1();
    })
});

$(window).on('load', function () {
    $("#aside1+hr").hide();
    $("#dropdown").hide();
    $("#asideEdit").hide();
    $("#asideDetail").hide();
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
        asideEksemplar();
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

function view(){
    $("#asideDetail").addClass('terpilih');
    $("#dropdown").show();
    $("#aside1+hr").show();
    $("#asideDetail").show();
    $("#dropdown").appendTo('#aside1 span');
    $("#centang").appendTo('#asideDetail span');
    $("div#konten").load("gudangDetailKomik/detailKomik.html");
    $("div#gantiHead").load("gudangDetailKomik/headDetailKomik.html");
}

function asideEksemplar(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#asideEksemplar span');
    $("#asideEksemplar").addClass('terpilih');
    $("#aside1+hr").hide();
    $("#dropdown").hide();
    $("#asideDetail").hide();
    $("div#konten").load("gudangTambahEksemplar/tambahEksemplar.php");
    $("div#gantiHead").load("gudangTambahEksemplar/headTambahEksemplar.html");
    $("#error").hide();
    $.session.set('page','9');
}

function aside1(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside1 span');
    $("#aside1").addClass('terpilih');
    $("#aside1+hr").hide();
    $("#dropdown").hide();
    $("#asideDetail").hide();
    $("div#konten").load("gudangDaftarKomik/daftarKomik.php");
    $("div#gantiHead").load("gudangDaftarKomik/headDaftarKomik.php");
    searchKomik();
    $.session.set('page','1');
}

function aside2(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").addClass('terpilih');
    $("#aside1+hr").hide();
    $("#dropdown").hide();
    $("#asideDetail").hide();
    $("div#konten").load("gudangTambahKomik/tambahKomik.php");
    $("div#gantiHead").load("gudangTambahKomik/headTambahKomik.php");
    $.session.set('page','2');
    fungsi(1);
}

function aside3(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("#aside1+hr").hide();
    $("#dropdown").hide();
    $("#asideDetail").hide();
    $("div#konten").load("gudangDaftarPenerbit/daftarPenerbit.php");
    $("div#gantiHead").load("gudangDaftarPenerbit/headDaftarPenerbit.php");
    $.session.set('page','3');
    searchPenerbit();
}

function aside4(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside4 span');
    $("#aside4").addClass('terpilih');
    $("#aside1+hr").hide();
    $("#dropdown").hide();
    $("#asideDetail").hide();
    $("div#konten").load("gudangTambahPenerbit/tambahPenerbit.php");
    $("div#gantiHead").load("gudangTambahPenerbit/headTambahPenerbit.html");
    $.session.set('page','4');
}

function aside5(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside5 span');
    $("#aside5").addClass('terpilih');
    $("#aside1+hr").hide();
    $("#dropdown").hide();
    $("#asideDetail").hide();
    $("div#konten").load("gudangDaftarPengarang/daftarPengarang.php");
    $("div#gantiHead").load("gudangDaftarPengarang/headDaftarPengarang.php");
    $.session.set('page','5');
    searchPengarang();
}

function aside6(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside6 span');
    $("#aside6").addClass('terpilih');
    $("#aside1+hr").hide();
    $("#dropdown").hide();
    $("#asideDetail").hide();
    $("div#konten").load("gudangTambahPengarang/tambahPengarang.php");
    $("div#gantiHead").load("gudangTambahPengarang/headTambahPengarang.html");
    $.session.set('page','6');
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

function fungsi($temp=1){
    $data ="";
    $function="";
    $pass = 1;
    switch ($temp) {
        case 1:     $data = {'function':$temp};$function=function(response){$("#idKomik").val(response);};
                    break;
        default:
                    break;
    }
        $.ajax({
            type : 'post',
            data : $data,
            url: '../functionPHP/gudang.php',
            success: $function
        });
}

function searchKomik(){
    $('#inputSearchBy').val() !="" ? $kata = $('#inputSearchBy').val(): $kata ="";
    $dari = $('#selectSearchBy').val();
    $sorting = $('#selectSortBy').val();
    $.ajax({
        type : 'post',
        data : {'kata':$kata,'dari':$dari,'sorting':$sorting,'status':1},
        url: '../functionPHP/isiKontenDaftarKomik.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#daftar").html(response);
        }
    });  
}

function searchPenerbit(){
    $('#inputSearchBy').val() !="" ? $kata = $('#inputSearchBy').val(): $kata ="";
    $dari = $('#selectSearchBy').val();
    $sorting = $('#selectSortBy').val();
    $.ajax({
        type : 'post',
        data : {'kata':$kata,'dari':$dari,'sorting':$sorting,'status':1},
        url: '../functionPHP/isiKontenDaftarPenerbit.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#daftar").html(response);
        }
    });
}

function searchPengarang(){
    $('#inputSearchBy').val() !="" ? $kata = $('#inputSearchBy').val(): $kata ="";
    $dari = $('#selectSearchBy').val();
    $sorting = $('#selectSortBy').val();
    $.ajax({
        type : 'post',
        data : {'kata':$kata,'dari':$dari,'sorting':$sorting,'status':1},
        url: '../functionPHP/isiKontenDaftarPengarang.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#daftar").html(response);
        }
    });
}

function getIdEksemplar(){
    $id = $('#idKomik').val();
    $.ajax({
        type : 'post',
        data : {'idKomik':$id},
        url: '../functionPHP/eksemplar.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#idEksemplar").html(response);
        }
    });   
}

/*tampilkan pop up detail komik*/
function munculPopup(temp){
    var a = temp;
    $.ajax({
        type : 'post',
        data : {'idBuku':a},
        url: '../functionPHP/popUpGudangKomik.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#popup").html(response);
        }
    });
    $("#popup").fadeIn();
    $("#blur").fadeIn();
}

function pencetBlur(){
    $("#popup").css('display','none');
    $("#blur").css('display','none');
}

function edit($idKomik){
    //$("div#konten").load("gudangEditKomik/editKomik.php");
    $("div#gantiHead").load("gudangEditKomik/headEditKomik.html");
    $('#inputSearchBy').val() !="" ? $kata = $('#inputSearchBy').val(): $kata ="";
    $dari = $('#selectSearchBy').val();
    $sorting = $('#selectSortBy').val();
    $.ajax({
        type : 'post',
        data : {'idKomik':$idKomik},
        url: '../functionPHP/editKomik1.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#konten").html(response);
        }
    });
}

function deleteKomik($idKomik){
    $.ajax({
        type : 'post',
        data : {'idKomik':$idKomik},
        url: '../functionPHP/deleteKomik.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#konten").html(response);
        }
    });
}