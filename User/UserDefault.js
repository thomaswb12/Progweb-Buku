$(document).ready(function(){
    //------ tampilkan tanggal NOW -------------------
    setTanggal(); //panggil fungsi setTanggal()

    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
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

function munculPopup(temp){
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

function pencetBlur(){
    $("#popup").css('display','none');
    $("#blur").css('display','none');
}