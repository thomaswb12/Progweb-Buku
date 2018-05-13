$(document).ready(function(){
    //------ kalau discroll, panggil fungsi backToTop(), utk membuat tombol UP muncul -------------
    $(window).on('scroll', function () {
        backToTop();
    });

    //------ menandai option aside yg sedang terpilih ----
    $('#aside1').addClass('terpilih'); //asumsikan aside1 yg terpilih

    //------ men-slide option utk aside ----
    $("#minimizeOption").click(function(){
        $('#option').slideToggle("slow"); //klik tampil, klik sembunyi
    });
    $("#aside1").click(function(){aside1();});
    $("#aside2").click(function(){aside2();});
    $("#aside3").click(function(){aside3();});
    $("#aside4").click(function(){aside4();});
    $("#aside5").click(function(){aside5();});
    $("#aside6").click(function(){aside6();});
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
    else if(c == 6)
        aside6();
});

function aside1(){
    $("#aside2").hide();
    $("#aside3").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside1 span');
    $("#aside1").addClass('terpilih');
    $("div#konten").load("hrdDaftarKaryawan/KontenHRDDaftarKaryawan.php");
    $("div#gantiHead").load("hrdDaftarKaryawan/HeadHRDDaftarKaryawan.php");
    $.session.set('page','1');
}
function aside2(){
    $("#aside3").hide();
    $("#aside2").show();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Data%20Karyawan/KontenHRDDataKaryawan.php");
    $("div#gantiHead").load("HRD%20-%20Data%20Karyawan/HeadHRDDataKaryawan.php");
    $.session.set('page','2');
}
function aside3(){
    $("#aside2").hide();
    $("#aside3").show();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Edit%20Karyawan/KontenHRDEditKaryawan.php");
    $("div#gantiHead").load("HRD%20-%20Edit%20Karyawan/HeadHRDEditKaryawan.php");
    $.session.set('page','3');
}
function aside4(){
    $("#aside2").hide();
    $("#aside3").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside4 span');
    $("#aside4").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Tambah%20Karyawan/KontenHRDTambahKaryawan.php");
    $("div#gantiHead").load("HRD%20-%20Tambah%20Karyawan/HeadHRDTambahKaryawan.php");
    $.session.set('page','4');
}
function aside5(){
    $("#aside2").hide();
    $("#aside3").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside5 span');
    $("#aside5").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Daftar%20Jabatan/KontenHRDDaftarJabatan.php");
    $("div#gantiHead").load("HRD%20-%20Daftar%20Jabatan/HeadHRDDaftarJabatan.php");
    $.session.set('page','5');
}
function aside6(){
    $("#aside2").hide();
    $("#aside3").hide();
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside6 span');
    $("#aside6").addClass('terpilih');
    $("div#konten").load("HRD%20-%20Tambah%20Jabatan/KontenHRDTambahJabatan.php");
    $("div#gantiHead").load("HRD%20-%20Tambah%20Jabatan/HeadHRDTambahJabatan.php");
    $.session.set('page','6');
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

function load(){
    
}

function pilihan($temp=1){

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

function pilihJabatan($data){
    $.ajax({
        type : 'post',
        data : {'function':2,'data':$data},
        url: '../functionPHP/HRD.php',
        success: function(response){
            //alert(response);
            $('#isi').html(response);
        }
    });
}