$(document).ready(function(){
    //------ klik details ------
    $('.more').click(function(){
        $("#aside3").hide();
        $("#aside2").show();
        $(".blue").removeClass('terpilih');
        $("#centang").appendTo('#aside2 span');
        $("#aside2").addClass('terpilih');
        $("div#konten").load("../HRD%20-%20Data%20Karyawan/KontenHRDDataKaryawan.php");
        $("div#gantiHead").load("../HRD%20-%20Data%20Karyawan/HeadHRDDataKaryawan.php");
        $.session.set('page','2');
    });
});