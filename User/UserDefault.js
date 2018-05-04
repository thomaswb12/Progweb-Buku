$(document).ready(function(){
    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });
    //-------- kalau poup nya di scroll, panggil fungsi scrollDown(), biar simbolnya hilang-----
    $("#popupScroll").on('scroll', function () {
        scrollDown();
    });
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

function pencetBlur(){
    $("#popup").css('display','none');
    $("#blur").css('display','none');
}