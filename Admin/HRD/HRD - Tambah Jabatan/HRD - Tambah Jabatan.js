$(document).ready(function(){
    //------ tampilkan tanggal NOW -------------------
    setTanggal(); //panggil fungsi setTanggal()

    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });

    //------ menandai option aside yg sedang terpilih ----
    $('#aside6').addClass('terpilih'); //asumsikan aside1 yg terpilih

    //------ men-slide option utk aside ------
    $("#minimizeOption").click(function(){
        $('#option').slideToggle("slow"); //klik tampil, klik sembunyi
    });

    //------ menyembunyikan aside edit ------
    $('#aside2').hide();
    $('#aside3').hide();

    //------ memilih navigasi ------
    $('#aside1').click(function(){
        $(location).attr('href', '../HRD - Daftar Karyawan/HRD - Daftar Karyawan.html');
    });
    $('#aside4').click(function(){
        $(location).attr('href', '../HRD - Tambah Karyawan/HRD - Tambah Karyawan.html');
    });
    $('#aside5').click(function(){
        $(location).attr('href', '../HRD - Daftar Jabatan/HRD - Daftar Jabatan.html');
    });
    $('#aside6').click(function(){
        $(location).attr('href', '../HRD - Tambah Jabatan/HRD - Tambah Jabatan.html');
    });

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