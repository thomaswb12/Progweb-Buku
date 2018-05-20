$(document).ready(function(){
    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });
    //-------- kalau poup nya di scroll, panggil fungsi scrollDown(), biar simbolnya hilang-----
    $("#popupScroll").on('scroll', function () {
        scrollDown();
    });
    search();
    //advanced();
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

function munculPopup(temp){
    var a = temp;
    $.ajax({
        type : 'post',
        data : {'idBuku':a,'status':1},
        url: '../../functionPHP/popUp.php',
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
    $.ajax({
        type : 'post',
        data : {'kata':$kata,'dari':$dari,'sorting':$sorting,'status':1},
        url: '../../functionPHP/isiKonten.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#daftarKomik").html(response);
        }
    });   
}

function search1(){
    $jdl = $('#jdl').val();
    $pnl = $('#pnl').val();
    $pnb = $('#pnb').val();
    $gnr = $('#gnr').val();
    $.ajax({
        type : 'post',
        data : {'jdl':$jdl,'pnl':$pnl,'pnb':$pnb,'gnr':$gnr,'status':1},
        url: '../../functionPHP/isiKonten1.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#daftarKomik").html(response);
        }
    });
    
}

function simple(){
    $("#advanced").hide();
    $("#simple").show();
}

function advanced(){
    $("#simple").hide();
    $("#advanced").show();
}

function pencetBlur(){
    $("#popup").css('display','none');
    $("#blur").css('display','none');
}