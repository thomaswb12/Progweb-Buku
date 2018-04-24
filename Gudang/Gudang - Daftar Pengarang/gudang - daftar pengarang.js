$(document).ready(function(){
    //------ tampilkan tanggal NOW -------------------
    setTanggal(); //panggil fungsi setTanggal()

    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });

    //------ memilih navigasi ------
    $('#aside1').click(function(){
        $(location).attr('href', '../Gudang - Daftar Komik/gudang - daftar komik.php');
    });
    $('#aside2').click(function(){
        $(location).attr('href', '../Gudang - Tambah Komik/gudang - tambah komik.php');
    });
    $('#aside3').click(function(){
        $(location).attr('href', '../Gudang - Daftar Penerbit/gudang - daftar penerbit.php');
    });
    $('#aside4').click(function(){
        $(location).attr('href', '../Gudang - Tambah Penerbit/gudang - tambah penerbit.php');
    });
    $('#aside5').click(function(){
        $(location).attr('href', '../Gudang - Daftar Pengarang/gudang - daftar pengarang.php');
    });
    $('#aside6').click(function(){
        $(location).attr('href', '../Gudang - Tambah Pengarang/gudang - tambah pengarang.php');
    });
    $('#aside7').click(function(){
        $(location).attr('href', '../Gudang - Daftar Supplier/gudang - daftar supplier.php');
    });
    $('#aside8').click(function(){
        $(location).attr('href', '../Gudang - Tambah Supplier/gudang - tambah supplier.php');
    });

    //------ menandai option aside yg sedang terpilih ----
    $('#aside5').addClass('terpilih'); //aside5 itu daftar member
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