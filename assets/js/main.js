/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery to collapse the navbar on scroll
function collapseNavbar() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
}
$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $(this).closest('.collapse').collapse('toggle');
});




//Animação da div "team-name"
(function(){// self-invoque--> serve para não dar conflito com outros eventos
    var $target = $("#team-name");
    offset = $(window).height() * 1/4;

    function imgTeamAnimate(){
        var documentTop = $(document).scrollTop();
        
        $target.each(function() {
            var itemTop = $(this).offset().top;
            if(documentTop > itemTop - offset)
            {
                $(".animated").addClass("fadeIn");
            }
        });
    }

    /*chamar o evento antes evita de ficar partes 
    em branco no site, 
    sem precisar q o offset chegue ao lugar definido*/
    imgTeamAnimate();

    $(document).scroll(function() {
        imgTeamAnimate();
        console.log('teste');/* faz o teste de quantas vezes esta sendo executada o Evento*/
    });
}());


// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        var menuHeigth = $('nav').height();//colocar um if para o tamanho da tela
        console.log(menuHeigth);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - menuHeigth
        }, 1500, 'swing');/* no lugar de 'swing' pode ser colocado qualquer outra function do arquivo easing.js*/
        event.preventDefault();
    });
});

(function(){

    function AjustarHeigth(){
        var TamHeight = $(document).height();

        $('#header,#team-name').css({"width":"100%","heigth" : TamHeight +"px","color":"yellow"});
    }

    $(document).ready(function()
    {
        AjustarHeigth();
        console.log('testando...');
    });
}());