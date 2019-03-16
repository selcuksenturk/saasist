// Paroller

!function(r){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=r(require("jquery")):r(jQuery)}(function($){"use strict";var r={bgVertical:function(r,t){return r.css({"background-position":"center "+-t+"px"})},bgHorizontal:function(r,t){return r.css({"background-position":-t+"px center"})},vertical:function(r,t,o){return"none"===o?o="":!0,r.css({"-webkit-transform":"translateY("+t+"px)"+o,"-moz-transform":"translateY("+t+"px)"+o,transform:"translateY("+t+"px)"+o,transition:"transform linear","will-change":"transform"})},horizontal:function(r,t,o){return"none"===o?o="":!0,r.css({"-webkit-transform":"translateX("+t+"px)"+o,"-moz-transform":"translateX("+t+"px)"+o,transform:"translateX("+t+"px)"+o,transition:"transform linear","will-change":"transform"})}};$.fn.paroller=function(t){var o=$(window).height(),n=$(document).height(),t=$.extend({factor:0,type:"background",direction:"vertical"},t);return this.each(function(){var a=!1,e=$(this),i=e.offset().top,c=e.outerHeight(),l=e.data("paroller-factor"),s=e.data("paroller-type"),u=e.data("paroller-direction"),f=l?l:t.factor,d=s?s:t.type,h=u?u:t.direction,p=Math.round(i*f),g=Math.round((i-o/2+c)*f),m=e.css("transform");"background"==d?"vertical"==h?r.bgVertical(e,p):"horizontal"==h&&r.bgHorizontal(e,p):"foreground"==d&&("vertical"==h?r.vertical(e,g,m):"horizontal"==h&&r.horizontal(e,g,m));var b=function(){a=!1};$(window).on("scroll",function(){if(!a){var t=$(this).scrollTop();n=$(document).height(),p=Math.round((i-t)*f),g=Math.round((i-o/2+c-t)*f),"background"==d?"vertical"==h?r.bgVertical(e,p):"horizontal"==h&&r.bgHorizontal(e,p):"foreground"==d&&n>=t&&("vertical"==h?r.vertical(e,g,m):"horizontal"==h&&r.horizontal(e,g,m)),window.requestAnimationFrame(b),a=!0}}).trigger("scroll")})}});


// custom


/*------------------------------------------------------------------
jQuery document ready
-------------------------------------------------------------------*/
$(document).ready(function () {
    "use strict";
    if (jQuery.isFunction(jQuery.fn.paroller) && screen.width > 800 ) {
        $("[data-paroller-factor]").paroller();
    }
    // Pricing switcher button
    $(".switcher__button").on('click', function(e) {
        $(".switcher__button").toggleClass('switcher__button--enabled');
        $(".pricing__value").removeClass('pricing__value--hidden');
        $(".pricing__value").toggleClass('pricing__value--show pricing__value--hide');
    });

    // Modal login and signup
    $('.modal-toggle').on('click', function(e) {
        e.preventDefault();
        var modalopen = $(this).data("openpopup");
        $('.modal--'+modalopen).toggleClass('modal--visible');
        var modaltype = $(this).data("popup");
        $('.modal__content--'+modaltype).toggleClass('modal__content--visible');
        $('.modal__switch').on('click', function(e) {
            $('.modal__content').removeClass('modal__content--visible');
            var modaltypeb = $(this).data("popup");
            $('.modal__content--'+modaltypeb).toggleClass('modal__content--visible');
        });
    });

    $('.modal__overlay--toggle').on('click', function(e) {
        e.preventDefault();
        $('.modal').removeClass('modal--visible');
        $('.modal__content').removeClass('modal__content--visible');
    });


});


// Swiper


/*------------------------------------------------------------------
Initialize Swiper
-------------------------------------------------------------------*/
"use strict";
var swiper = new Swiper('.testimonials', {
    speed: 600,
    slidesPerView: "auto",
    spaceBetween: 0,
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        clickable : true
    }
});

// Menu


$(document).ready(function () {
    "use strict";
    function navScroll(){
        var window_top = $(window).scrollTop();
        var div_top = $('body').offset().top;
        if (window_top > div_top) {
            $('.header').addClass('header--sticky');
            $('.header__menu ul ul').addClass('submenu-header-sticky');
        } else {
            $('.header').removeClass('header--sticky');
            $('.header__menu ul ul').removeClass('submenu-header-sticky');
        }
    }
    $(window).scroll(function() {
        navScroll();
    });
    navScroll();

    $(document).on("scroll", onScroll);

    var delegate = function(criteria, listener) {
        return function(e) {
            var el = e.target;
            do {
                if (!criteria(el)) continue;
                e.delegateTarget = el;
                listener.apply(this, arguments);
                return;
            } while( (el = el.parentNode) );
        };
    };
    var toolbar = document.querySelector(".header__menu");
    var buttonsFilter = function(elem) { return elem.classList && elem.classList.contains("header-link"); };
    var buttonHandler = function(e) {
        var button = e.delegateTarget;
        if(!button.classList.contains("active")){
            button.classList.add("active");
            var target = button.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 600, 'swing', function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        }
        else {
            button.classList.remove("active");
        }
    };
    toolbar.addEventListener("click", delegate(buttonsFilter, buttonHandler));

    function onScroll(event){

        var scrollPos = $(document).scrollTop();
        $('.header__menu ul li a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('.header__menu ul li a').removeClass("selected");
                currLink.addClass("active");
            }
            else{
                currLink.removeClass("active");
            }
        });
    }

    $.fn.menumaker = function(options) {

        var cssmenu = $(this), settings = $.extend({
            title: "Menu",
            format: "dropdown",
            sticky: false
        }, options);

        return this.each(function() {
            cssmenu.prepend('<div class="menu-button"></div>');
            $(this).find(".menu-button").on('click', function(){
                $(this).parent().parent().parent().toggleClass('menu-open');

                var mainmenu = $(this).next('ul');
                mainmenu.toggleClass('open');
                if (mainmenu.hasClass('open')) {
                    mainmenu.show();
                }
                else {
                    mainmenu.hide();
                }
                $('.header__menu ul a[href^="#"]').on('click', function (e) {
                    $('.header__menu ul').removeClass('open');
                    $('.header__menu ul').hide();
                    $('.header').removeClass('menu-open');
                });
            });

            var multiTg = function() {
                cssmenu.find(".menu-item-has-children").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function() {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').hide();
                    }
                    else {
                        $(this).siblings('ul').addClass('open').show();
                    }
                });
            };

            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');

            if (settings.sticky === true) cssmenu.addClass('sticky');

        });
    };

    $(".header__menu").menumaker({
        format: "multitoggle",
        sticky: true
    });

});
