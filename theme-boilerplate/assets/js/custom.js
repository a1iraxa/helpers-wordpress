/*
 Project Name :Shots Business Theme
 Author Company : Digitsol
 Project Date: 10 may, 2016
 Author Website : http://www.digitsol.co
 */
/*=============================================
Table Of Contents
================================================
 1.Screen Height
 2.Pretty Photo
 3.Count Function
 4.Partner Logo
 5.Main Banner Slider
 6.Expert Slider
 7.Gallery
 8.Scroll Mobile Menu function
 9. slide sub menu On mObile
 10.Animation
 11. Toggle Function Mobile
 12.Bottom to top
 Table Of Contents end
 ================================================
 */
jQuery(document).ready(function($) {
    "use strict";
    //============================================
    //Screen height
    //=============================================
        $(".screen-height").css({
            'height': window.innerHeight
        });
    $(window).resize(function() {
        $(".screen-height").css({
            'height': window.innerHeight
        });
    });
    //$("#loading").delay(2000).fadeOut(500);
    $(window).load(function() {
        $("#preloader").fadeOut(1000);
        animate_elems();
    });

    //================================================
    //add and remove class Function
    //=================================================
    $(".nav-button .menu").click(function(){
        $(".offcanvas-menu,section.main ").addClass("active");
    });
    $(".offcanvas-menu .closs").click(function(){
        $(".offcanvas-menu,section.main").removeClass("active");
    });
    //================================================
    //Accordion
    //=================================================
    var selectIds = $('#panel1,#panel2,#panel3');
    selectIds.on('show.bs.collapse hidden.bs.collapse', function() {
        $(this).prev().find('.icofont').toggleClass('icofont-minus-circle icofont-plus-circle');
    });
    //============================================
    //Toggle Function
    //=============================================
    $(".header-4 .menu-buttons a").on('click', function() {
        $(".header-4").toggleClass("open");
    });
    

    //================================================
    //Mobile sub menu General
    //=================================================

    if ($(window).width() <= 767) {
        $("#slide-nav #menu_nav ul > li.dropdown").append('<div class="more"></div>');

        $("#slide-nav #menu_nav").on("click", ".more", function(e) {
            e.stopPropagation();

            $(this).parent().toggleClass("current")
                .children("#slide-nav #menu_nav ul > li.dropdown > ul").toggleClass("open");

        });

    }

    $(window).resize(function() {
        if (window.innerWidth > 767) {
            if ($('#slide-nav #menu_nav ul > li.dropdown .more').length !== 0) {
                $('#slide-nav #menu_nav ul > li.dropdown div').remove('.more');
            }
        } else {
            $("#slide-nav #menu_nav ul > li.dropdown").append('<div class="more"></div>');
        }
    });

    var $body = $('body'),
        $wrapper = $('.body-innerwrapper'),
        $toggler = $(' .navbar-toggle,.header2 #slide-nav .hand-button .button'),
        $close = $('.closs'),
        $offCanvas = $('.navbar-collapse');

    $toggler.on('click', function(event) {
        event.preventDefault();
        stopBubble(event);
        setTimeout(offCanvasShow, 50);
    });

    $close.on('click', function(event) {
        event.preventDefault();
        offCanvasClose();
    });

    var offCanvasShow = function() {
        $body.addClass('offcanvas');
        $wrapper.on('click', offCanvasClose);
        $close.on('click', offCanvasClose);
        $offCanvas.on('click', stopBubble);

    };

    var offCanvasClose = function() {
        $body.removeClass('offcanvas');
        $wrapper.off('click', offCanvasClose);
        $close.off('click', offCanvasClose);
        $offCanvas.off('click', stopBubble);
    };

    var stopBubble = function(e) {
        e.stopPropagation();
        return true;
    };

    //=================================================
    //Animation
    //===============================================
    var $elems = $('.animate-in');
    var winheight = $(window).height();
    var fullheight = $(document).height();

    $(window).scroll(function() {
        animate_elems();
    });
    function animate_elems() {
        var wintop = $(window).scrollTop(); // calculate distance from top of window
        // loop through each item to check when it animates
        $elems.each(function() {
            var $elm = $(this);

            var topcoords = $elm.offset().top; // element's distance from top of page in pixels

            if (wintop > (topcoords - (winheight * .99999))) {
                // animate when top of the window is 3/4 above the element
                $elm.addClass('animated');

            }

        });
    } // end animate_elems()


});
