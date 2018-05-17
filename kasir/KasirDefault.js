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
    $("div#konten").load("kasirPeminjaman/KontenKasirPeminjaman.php");
    $("div#gantiHead").load("kasirPeminjaman/HeadKasirPeminjaman.php");
    $.session.set('page','1');
    transaksi(6);
    transaksi(1);
    load();
}
function aside2(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside2 span');
    $("#aside2").addClass('terpilih');
    $("div#konten").load("kasirPengembalian/KontenKasirPengembalian.php");
    $("div#gantiHead").load("kasirPengembalian/HeadKasirPengembalian.php");
    $.session.set('page','2');
    transaksi(14);
    transaksi(10);
}
function aside3(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside3 span');
    $("#aside3").addClass('terpilih');
    $("div#konten").load("kasirDaftarKomik/KontenKasirDaftarKomik.php");
    $("div#gantiHead").load("kasirDaftarKomik/HeadKasirDaftarKomik.php");
    $.session.set('page','3');
    search();
}
function aside4(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside4 span');
    $("#aside4").addClass('terpilih');
    $("div#konten").load("kasirTambahMember/kasirTambahMember.php");
    $("div#gantiHead").load("kasirTambahMember/HeadTambahMember.php");
    $.session.set('page','4');
}
function aside5(){
    $(".blue").removeClass('terpilih');
    $("#centang").appendTo('#aside5 span');
    $("#aside5").addClass('terpilih');
    $("div#konten").load("kasirDaftarMember/KontenKasirDaftarMember.php");
    $("div#gantiHead").load("kasirDaftarMember/HeadKasirDaftarMember.php");
    $.session.set('page','5');
    searchDaftarMember();

}

function pencetTRPengembalian(temp){
    if($(temp).children("td.ganti").css("background-color") == "rgba(0, 100, 0, 0.6)"){
        //untuk menghapus green
        $(temp).children("td.ganti").removeClass("green");
        $(temp).children("td.tandaTable").html("<td class='tandaTable'><i class='fas fa-check' style='color:grey'></i></td>");
        actionPengembalian(temp,1);
    } 
    else {
        //untuk menambah green
        $(temp).children("td.ganti").addClass("green");
        $(temp).children("td.tandaTable").html("<td class='tandaTable'><i class='fas fa-check' style='color:green'></i></td>");
        //transaksi(12);
        actionPengembalian(temp,2);
    }
}

function pencetTR(temp){
    var idMember = temp.children("td:nth-of-type(2)").html();
    var namaMember = temp.children("td:nth-of-type(3)").html();
    var email = temp.children("td:nth-of-type(4)").html();
    var gender = temp.children("td:nth-of-type(5)").html();
        if(gender=="Wanita") gender=1;
        else gender=2;
    var noIdentitas = temp.children("td:nth-of-type(6)").html(); 
    var alamat = temp.children("td:nth-of-type(7)").html(); 
    var tanggalLahir = temp.children("td:nth-of-type(8)").html(); 
    var telepon = temp.children("td:nth-of-type(9)").html(); 
    $("#popupIdMember").val(idMember);
    $("#popupIdMemberDummy").val(idMember);
    $("#popupNamaMember").val(namaMember);
    $("#popupEmail").val(email);
    $("#popupGender").val(gender);
    $("#popupNoIdentitas").val(noIdentitas);
    $("#popupAlamat").val(alamat);
    $("#popupTanggalLahir").val(tanggalLahir);
    $("#popupTelepon").val(telepon);
    
    $("#popup").fadeIn();
    $("#blur").fadeIn();
}

function pencetBlur(){
    $("#popup").css('display','none');
    $("#blur").css('display','none');
}

function load(){
    $.ajax({
        type : 'post',
        data : {'function':5},
        url: '../functionPHP/transaksi.php',
        success: function(response){
            //alert(response);
            $('#bodytable').html(response);
        }
    });
    total();
}

function actionPengembalian(temp,status){
    if(status==1){//untuk hapus  
      var no=12;
      var data = temp.children("td:nth-of-type(2)").text();
    }
    else{//untuk tambah
        var no = 13;
        var data = {
            'id':temp.children("td:nth-of-type(2)").text(),
            'tglPinjam':temp.children("td:nth-of-type(4)").text(),
            'tglKembali':temp.children("td:nth-of-type(5)").text(),
            'denda':temp.children("td:nth-of-type(7)").text(),
            'idTrans':$('#idTransaksiPengembalian').val()
        };
    }
    $.ajax({
        type : 'post',
        data : {'function':no,'id':data},
        url: '../functionPHP/transaksi.php',
        success: function(response){
            alert(response);
        }
    });
}

function transaksiHapus(tamp,temp){
    $.ajax({
        type : 'post',
        data : {'function':tamp,'id':temp.attr('i')},
        url: '../functionPHP/transaksi.php',
        success: function(response){
            load();
        }
    });
}

function total(){
    $.ajax({
        type : 'post',
        data : {'function':9},
        url: '../functionPHP/transaksi.php',
        success: function(response){
            //alert(response);
            $('#total').text(response);
        }
    });
}

function loadTable(load){
    $.ajax({
        type : 'post',
        data : {'function':11,'idMember':load},
        url: '../functionPHP/transaksi.php',
        success: function(response){
            //alert(response);
            $('#tabelDaftar tbody').html(response);
        }
    });
}

function transaksi($temp=1){
    $data ="";
    $function="";
    $pass = 1;
    switch ($temp) {
        case 1:     $data = {'function':$temp};$function=function(response){$("#idTransaksi").val(response);};
                    break;
        case 2 :    $data = {'function':$temp,'id':$("#inputID").val()};
                    $function = function (response) {//response is value returned from php (for your example it's "bye bye"
                        if(response == "ga ada"){
                            $("#namaMember").val("");
                        }
                        else{
                            $("#namaMember").val(response);
                        }
                    };
                    break;
        case 3 :    $data = {'function':$temp,'id':$("#inputIdEksBuku").val()};
                    $function = function (response) {//response is value returned from php (for your example it's "bye bye"
                        if(response == "ada"){
                            $("#tidakAdaEks").css('display','none');
                            $('#simbolPlus').css('color','green');
                        }
                        else{
                            $("#tidakAdaEks").css('display','block');
                            $('#simbolPlus').css('color','rgba(94,94,94,0.9)');
                        }
                    }
                    break;
        case 4  :   if($('#simbolPlus').css('color') == 'rgb(0, 128, 0)'){
                        $data = {'function':$temp, 'idEksBuku':$("#inputIdEksBuku").val(), 'idMember':$("#inputID").val(), 'idTransaksi':$("#idTransaksi").val()};
                        $function = function(response){
                            alert(response);
                            $("#tidakAdaEks").css('display','block');
                            $('#simbolPlus').css('color','rgba(94,94,94,0.9)');
                            $('#inputIdEksBuku').val(''); 
                            load();
                        };
                    }
                    else{
                        alert("pastikan input benar");
                        $pass = 0;
                    }
                    break;
        case 6  :   $data = {'function':$temp};
                    $function = function (response) {//response is value returned from php (for your example it's "bye bye"
                    }
                    break;
        case 8  :   if($('#namaMember').val() != ""){
                        $data = {'function':$temp,'idMember':$('#inputID').val(),'idTransaksi':$("#idTransaksi").val(),'idEksBuku':$("#inputIdEksBuku").val()};
                        $function = function (response) {//response is value returned from php (for your example it's "bye bye"
                            if(response == "berhasil"){
                                alert("Transaksi berhasil");
                                $('#namaMember').val('');
                                $('#inputID').val('');
                                $('#inputIdEksBuku').val('');
                                transaksi(1);
                                load();
                                load();
                            }
                            else{
                                alert("Transaksi gagal");
                            }
                        };
                    }
                    else{
                        alert("ID Member belum ada");
                        $pass = 0;
                    }
                    break;
        case 10 :   $data = {'function':$temp};
                    $function=function(response){
                        $("#idTransaksiPengembalian").val(response);
                    };
                    break;
        case 11 :   $data = {'function':2,'id':$("#inputID").val()};
                    $function = function (response) {//response is value returned from php (for your example it's "bye bye"
                        if(response == "ga ada"){
                            $("#namaMember").val("");
                            loadTable($("#inputID").val());
                        }
                        else{
                            $("#namaMember").val(response);
                            loadTable($("#inputID").val());
                        }
                    };break;
        case 14 :   $data = {'function':14};
                    $function = function (response) {};
                    break;
        case 15 :   if($('#namaMember').val()!="" && $('#idTransaksiPengembalian').val!=""){
                        $data = {'function':15};
                        $function = function (response) {alert(response)};  
                    }
                    else{
                        alert("Data tidak valid");
                        pass=0;
                    }
                    
                    break;
        default:
                    break;
    }
    if($pass==1){
        $.ajax({
            type : 'post',
            data : $data,
            url: '../functionPHP/transaksi.php',
            success: $function
        });
    }
    load();
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
        data : {'idBuku':a,'status':2},
        url: '../functionPHP/popUp.php',
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
        data : {'kata':$kata,'dari':$dari,'sorting':$sorting,'status':0},
        url: '../functionPHP/isiKonten.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            //alert(response);
            $("#daftarKomik").html(response);
        }
    });
    
}

function searchDaftarMember(){
    $('#memberInputSearchBy').val() !="" ? $keyword = $('#memberInputSearchBy').val(): $keyword ="";
    $searchby = $('#selectSearchBy').val();
    $sortby = $('#selectSortBy').val();
    $.ajax({
        type : 'post',
        data : {'keyword':$keyword,'searchby':$searchby,'sortby':$sortby,'status':0},
        url: '../functionPHP/isiKontenDaftarMember.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
            $("tbody").html(response);
        }
    })
    .done(function(response){
        $("tbody").html(response);
    });
}