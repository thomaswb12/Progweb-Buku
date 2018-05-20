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

    //menyembunyikan navigasi
    // $("#aside7").hide();
    // $("#aside8").hide();
    // $("#aside9").hide();
    // $("#aside10").hide();
    // $("#aside11").hide();
    // $("#aside12").hide();
    // $("#aside13").hide();
    // $("#aside14").hide();
    // $("#aside15").hide();
    // $("#aside16").hide();
    // $("#aside17").hide();
    // $("#aside18").hide();
    // $("#aside19").hide();
    // $("#aside20").hide();
    // $("#aside21").hide();
    // $("#aside22").hide();
    // $("#aside23").hide();
    // $("#aside24").hide();
    // $("#aside25").hide();
    // $("#aside26").hide();
    // $("#aside27").hide();
    // $("#aside28").hide();
    // $("#aside29").hide();

    // $("#asidehr7").hide();
    // $("#asidehr8").hide();
    // $("#asidehr9").hide();
    // $("#asidehr10").hide();
    // $("#asidehr11").hide();
    // $("#asidehr12").hide();
    // $("#asidehr13").hide();
    // $("#asidehr14").hide();
    // $("#asidehr15").hide();
    // $("#asidehr16").hide();
    // $("#asidehr17").hide();
    // $("#asidehr18").hide();
    // $("#asidehr19").hide();
    // $("#asidehr20").hide();
    // $("#asidehr21").hide();
    // $("#asidehr22").hide();
    // $("#asidehr23").hide();
    // $("#asidehr24").hide();
    // $("#asidehr25").hide();
    // $("#asidehr26").hide();
    // $("#asidehr27").hide();
    // $("#asidehr28").hide();
    // $("#asidehr29").hide();
    //menyembunyikan navigasi
});


function menu1(){
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['control'] = 1;
    header("location:../User/UserDaftarKomik/UserDaftarKomik.php");
}
function aside2(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").addClass('terpilih');
    $("div#konten").load("kasir/Kasir%20-%20daftar%20komik/KontenKasirDaftarKomik.php");
    $("div#gantiHead").load("kasir/Kasir%20-%20daftar%20komik/HeadKasirDaftarKomik.php");
    $.session.set('page','2');
}
function aside3(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("HRD/HRD%20-%20Daftar%20Karyawan/KontenHRDDaftarKaryawan.php");
    $("div#gantiHead").load("HRD/HRD%20-%20Daftar%20Karyawan/HeadHRDDaftarKaryawan.php");
    $.session.set('page','3');
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