// Navigacija - skrolovanje do odredjenog sadrzaja
$(document).ready(function(e) {
    
    $("#navOnama").click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 2000);
    });
    
    $("#navTim").click(function() {
        $('html, body').animate({
            scrollTop: $("#tim").offset().top - 80
        }, 2000);
    });
   
    $("#navPartneri").click(function() {
        $('html, body').animate({
            scrollTop: $("#partneri").offset().top - 80
        }, 2000);
    });
    
    $("#navKontakt").click(function() {
        $('html, body').animate({
            scrollTop: $("#kontakt").offset().top - 80
        }, 2000);
    });
    
});

