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