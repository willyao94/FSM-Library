$(document).ready(function () {
  $('[data-toggle=offcanvas]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });
});

$(function () {
    $('.dropdown-menu input').click(function (event) {
        event.stopPropagation();
    });
});

$(function(){
	$("#includedContent").load("navbar.html"); 
});