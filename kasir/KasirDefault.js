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
    $("#aside1").click(function(){
        $(".blue").removeClass('terpilih');
        $("#centang").appendTo('#aside1 span');
        $("#aside1").addClass('terpilih');
        $("div#konten").load("Kasir%20-%20peminjaman/KontenKasirPeminjaman.php");
        $("div#gantiHead").load("Kasir%20-%20peminjaman/HeadKasirPeminjaman.php");

    });
    $("#aside2").click(function(){
        $(".blue").removeClass('terpilih');
        $("#centang").appendTo('#aside2 span');
        $("#aside2").addClass('terpilih');
        $("div#konten").load("Kasir%20-%20pengembalian/KontenKasirPengembalian.php");
        $("div#gantiHead").load("Kasir%20-%20pengembalian/HeadKasirPengembalian.php");

    });
    $("#aside3").click(function(){
        $(".blue").removeClass('terpilih');
        $("#centang").appendTo('#aside3 span');
        $("#aside3").addClass('terpilih');

    });
    $("#aside4").click(function(){
        $(".blue").removeClass('terpilih');
        $("#centang").appendTo('#aside4 span');
        $("#aside4").addClass('terpilih');
        $("div#konten").load("Kasir%20-%20tambah%20member/kasirTambahMember.php");
        $("div#gantiHead").load("Kasir%20-%20tambah%20member/HeadTambahMember.php");

    });
    $("#aside5").click(function(){
        $(".blue").removeClass('terpilih');
        $("#centang").appendTo('#aside5 span');
        $("#aside5").addClass('terpilih');
        $("div#konten").load("Kasir%20-%20daftar%20member/KontenKasirDaftarMember.php");
        $("div#gantiHead").load("Kasir%20-%20daftar%20member/HeadKasirDaftarMember.php");

    });
    
});

function pencetTR(temp){
    var a = temp.children("td:nth-of-type(2)").html();
    $("#popup").css('display','block');
    $("#blur").css('display','block');
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