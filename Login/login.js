$(document).ready(function(){
    $('#customerU').hide();
    $('#customer').show();
    $('#customer').hover(function(){
        $('#customer').hide();
        $('#customerU').show();
    });

    $('#customerU').mouseleave(function(){
        $('#customerU').hide();
        $('#customer').show();
    });

    $('#customerU').click(function(){
        $(location).attr('href', '../User/User - Daftar Komik/User - daftar komik.html');
    });
});