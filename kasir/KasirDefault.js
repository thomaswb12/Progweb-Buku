var cek;

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
    $("#aside1").click(function(){aside1();});
    $("#aside2").click(function(){aside2();});
    $("#aside3").click(function(){aside3();});
    $("#aside4").click(function(){aside4();});
    $("#aside5").click(function(){aside5();});
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
});

function aside1(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside1 span');
    $("#aside1").addClass('terpilih');
    $("div#konten").load("Kasir%20-%20peminjaman/KontenKasirPeminjaman.php");
    $("div#gantiHead").load("Kasir%20-%20peminjaman/HeadKasirPeminjaman.php");
    $.session.set('page','1');
}
function aside2(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").addClass('terpilih');
    $("div#konten").load("Kasir%20-%20pengembalian/KontenKasirPengembalian.php");
    $("div#gantiHead").load("Kasir%20-%20pengembalian/HeadKasirPengembalian.php");
    $.session.set('page','2');
}
function aside3(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("Kasir%20-%20daftar%20komik/KontenKasirDaftarKomik.php");
    $("div#gantiHead").load("Kasir%20-%20daftar%20komik/HeadKasirDaftarKomik.php");
    $.session.set('page','3');
}
function aside4(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside4 span');
    $("#aside4").addClass('terpilih');
    $("div#konten").load("Kasir%20-%20tambah%20member/kasirTambahMember.php");
    $("div#gantiHead").load("Kasir%20-%20tambah%20member/HeadTambahMember.php");
    $.session.set('page','4');
}
function aside5(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside5 span');
    $("#aside5").addClass('terpilih');
    $("div#konten").load("Kasir%20-%20daftar%20member/KontenKasirDaftarMember.php");
    $("div#gantiHead").load("Kasir%20-%20daftar%20member/HeadKasirDaftarMember.php");
    $.session.set('page','5');
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

//----- fungsi menampilkan & sembunyikan petunjuk scroll down saat POP UP ---------
function scrollDown(){
    var scrollTop = $("#popupScroll").scrollTop(); //sejauh apa user telah meng-scroll
    if (scrollTop > 120) {  //bila user sudah scroll lebih besar dari 120, tombol disembunyikan
        $('#tombolDown').css('display','none');
    } else { //bila user belum scroll jauh, tombol ditampilkan
        $('#tombolDown').css('display','block');
    }
}

/*tampilkan pop up detail komik*/
function munculPopup(temp){
    var a = temp;
    $.ajax({
        type : 'post',
        data : {'idBuku':a},
        url: 'popUp.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#popup").html(response);
        }
    });
    $("#popup").fadeIn();
    $("#blur").fadeIn();
}

function search(){
    $('#inputSearchBy').val() !="" ? $kata = $('#inputSearchBy').val(): $kata ="";
    $dari = $('#selectSearchBy').val();
    $sorting = $('#selectSortBy').val();
    alert ($kata + " "+  $dari +" "+ $sorting);
    $.ajax({
        type : 'post',
        data : {'kata':$kata,'dari':$dari,'sorting':$sorting},
        url: 'isiKonten.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#daftarKomik").html(response);
        }
    });
    
}