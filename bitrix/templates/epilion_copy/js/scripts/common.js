/************************  Меню  ***********************/
(function($) {
    // Меню
    $(function() {
        $(".nav-icon").click(function () {
            if($(".nav-icon").hasClass("close_menu")){
                $('.nav-icon').addClass("active");
                $('.nav-icon').removeClass("close_menu");
                $('.nav-icon-container').addClass("active");
                $('body').addClass("no-scroll");
                $(".mobile_menu").addClass("visibility");
                $("#overlay").addClass("block");
                $(".resp-menu").addClass("fixed");
            }else{
                $('.nav-icon').removeClass("active");
                $('.nav-icon').addClass("close_menu");
                $('.nav-icon-container').removeClass("active");
                $(".mobile_menu").removeClass("visibility");
                $("#overlay").removeClass("block");
				$('body').removeClass("no-scroll");
                $(".resp-menu").removeClass("fixed");
            }
        });
        $(".mobile_menu .yakor").click(function () {
            $('.nav-icon').removeClass("active");
            $('.nav-icon').addClass("close_menu");
            $(".mobile_menu").removeClass("visibility");
            $("#overlay").removeClass("block");
            $('.nav-icon-container').removeClass("active");
            $('body').removeClass("no-scroll");
        });
        $("#overlay").click(function () {
            $('.nav-icon').removeClass("active");
            $('.nav-icon').addClass("close_menu");
            $(".mobile_menu").removeClass("visibility");
            $("#overlay").removeClass("block");
            $('.nav-icon-container').removeClass("active");
            $('body').removeClass("no-scroll");
        });
    });

    // Скрол
    $('.scroll').perfectScrollbar();

})(jQuery);


/************************  Меню  ************************/


$(document).ready(function(  ) {

    // Изменение z-index фиксированной шапки при открытии модалки

    $('.modal').on('show.bs.modal', function() {
        $('.header-fix').addClass('minZindex');
    });
    $('.modal').on('hidden.bs.modal', function() {
        $('.header-fix').removeClass('minZindex');
    });
    /*
    $('#modal-visit').on('hidden.bs.modal', function() {
        setTimeout(function() {
            $('.header-fix').removeClass('minZindex1');
        }, 300);
    });*/

    // Переключение модальных окон
    $('.edit-visit').click(function() {
        $('#modal-visit-stp2').modal('hide');
        $('#modal-visit').modal('show');
        //$('.header-fix').addClass('minZindex1');
    });

    // Переключение модальных окон На регистрацию
    $('[data-target="#modalReg"]').click(function() {
        $('#modalLogin').modal('hide');
        //$('.header-fix').addClass('minZindex1');
    });
    $('#modalRed').on('hidden.bs.modal', function() {
        setTimeout(function() {
            //$('.header-fix').removeClass('minZindex1');
        }, 300);
    });

    // Переключение модальных окон Восстановление пароля
    $('[data-target="#modalRecovery"]').click(function() {
        $('#modalLogin').modal('hide');
        //$('.header-fix').addClass('minZindex1');
    });
    $('#modalRecovery').on('hidden.bs.modal', function() {
        setTimeout(function() {
            //$('.header-fix').removeClass('minZindex1');
        }, 300);
    });

    // Переключение модальных окон Восстановление пароля ВТОРОЙ шаг
    $('#modalRecoveryStep2').on('show.bs.modal', function() {
        $('#modalRecovery').modal('hide');
        //$('.header-fix').addClass('minZindex1');
    });

    $('#modalRecovery').on('hidden.bs.modal', function() {
        setTimeout(function() {
            //$('.header-fix').removeClass('minZindex1');
        }, 300);
    });
    $(function(){
        if ($(window).width() > 1250){
            // Сокращение длинного текста
            $('.cut-text-video').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 320, //высота блока краткого текста в px
                moreLink: '<span class="more_txt_video"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt_video more_txt_video--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });
        }
        if ($(window).width() < 767){
            // Сокращение длинного текста
            $('.cut-text').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 170, //высота блока краткого текста в px
                moreLink: '<span class="more_txt"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt more_txt--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });

            $('.cut-text-54').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 54, //высота блока краткого текста в px
                moreLink: '<span class="more_txt"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt more_txt--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });
            $('.cut-text-100').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 100, //высота блока краткого текста в px
                moreLink: '<span class="more_txt"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt more_txt--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });
            // Сокращение длинного текста
            $('.cut-text-video').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 170, //высота блока краткого текста в px
                moreLink: '<span class="more_txt_video"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt_video more_txt_video--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });
        }
        else{

        }
    });

    $(window).resize(function(){
        if ($(window).width() > 1250){
            // Сокращение длинного текста
            $('.cut-text-video').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 320, //высота блока краткого текста в px
                moreLink: '<span class="more_txt_video"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt_video more_txt_video--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });
        }
        if ($(window).width() < 767){
            // Сокращение длинного текста
            $('.cut-text').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 170, //высота блока краткого текста в px
                moreLink: '<span class="more_txt"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt more_txt--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });

            $('.cut-text-54').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 54, //высота блока краткого текста в px
                moreLink: '<span class="more_txt"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt more_txt--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });
            $('.cut-text-100').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 100, //высота блока краткого текста в px
                moreLink: '<span class="more_txt"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt more_txt--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });
            // Сокращение длинного текста
            $('.cut-text-video').readmore({ //вызов плагина
                speed: 350, //скорость анимации показать скрыть текст
                collapsedHeight: 170, //высота блока краткого текста в px
                moreLink: '<span class="more_txt_video"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Развернуть</span>', //Ссылка на раскрытие блока
                lessLink: '<span  class="more_txt_video more_txt_video--active"><svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.16782 0.626295C5.35727 0.457902 5.64274 0.457902 5.83219 0.626295L10.3322 4.6263C10.5386 4.80975 10.5572 5.12579 10.3737 5.33218C10.1903 5.53857 9.87422 5.55716 9.66782 5.3737L5.50001 1.66898L1.33219 5.3737C1.1258 5.55716 0.80976 5.53857 0.626301 5.33218C0.442842 5.12579 0.461432 4.80975 0.667823 4.6263L5.16782 0.626295Z"/></svg> Свернуть</span>' //Ссылка на скрытие блока
            });
        }
    });

    // Подсказки
    $('[data-toggle="tooltip"]').tooltip({
        tooltipClass: "mytooltip",
        position: {
            my: "center bottom-20",
            at: "center top",
            using: function( position, feedback ) {
                $( this ).css( position );
                $( "<div>" )
                    .addClass( "arrow" )
                    .addClass( feedback.vertical )
                    .addClass( feedback.horizontal )
                    .appendTo( this );
            }
        }
    });

    // Мобильное меню
    $('.menu-stage li > a.has-sub').on('click', function(){
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        }
        else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });
    $('.menu-stage>ul>li.has-sub>a').append('<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.324524 0.539758C0.819511 -0.0966539 1.7023 -0.18264 2.29628 0.347704L7 4.54745L11.7037 0.347704C12.2977 -0.18264 13.1805 -0.0966539 13.6755 0.539758C14.1705 1.17617 14.0902 2.12201 13.4962 2.65236L7.89625 7.65233C7.37707 8.11589 6.62293 8.11589 6.10375 7.65233L0.503774 2.65236C-0.0902103 2.12201 -0.170463 1.17617 0.324524 0.539758Z" fill="#01BEC5"/></svg>');

    // Селект
    $('.js-select2').select2({
        minimumResultsForSearch: Infinity
    });
    $('.js-select2--service').select2({
        placeholder: 'Выберите услугу *'
    });

    $('.js-select2--modal').select2({
        placeholder: 'Добавить процедуру'
    });

    

    // Фикс шапка
    $(window).scroll(function(){
        $('.header-fix').toggleClass('header-fix--active', $(this).scrollTop() > 200);
        //$('.mobile_menu').toggleClass('mobile_menu--fixed', $(this).scrollTop() > 70);
    });

    $(window).resize(function() {
        if(document.documentElement.clientWidth > 1800) {
            $(window).scroll(function(){
                $('.header-fix').toggleClass('header-fix--active', $(this).scrollTop() > 200);
                //$('.mobile_menu').toggleClass('mobile_menu--fixed', $(this).scrollTop() > 70);
            });
        }
        else {
            $(window).scroll(function(){
                $('.header-fix').toggleClass('header-fix--active', $(this).scrollTop() > 200);
                //$('.mobile_menu').toggleClass('mobile_menu--fixed', $(this).scrollTop() > 70);
            });
        }
    });

    // Фикс прайс ПК
    $(window).scroll(function(){
        $('.full-price-pc').toggleClass('full-price-pc--fixed', $(this).scrollTop() > 295);
    });
    $(function(){
        if ($(window).width() < 1500){
            $(window).scroll(function(){
                $('.full-price-pc').toggleClass('full-price-pc--fixed', $(this).scrollTop() > 295);
            });
        }
        if(document.documentElement.clientWidth > 993) {
            $(window).scroll(function(){
                $('.full-price-pc').toggleClass('full-price-pc--fixed', $(this).scrollTop() > 295);
            });
        }
        if(document.documentElement.clientWidth < 993) {
            $(window).scroll(function(){
                $('.full-price-pc').toggleClass('full-price-pc--fixed', $(this).scrollTop() > 295);
            });
        }
    });
    $(window).resize(function() {
        if(document.documentElement.clientWidth < 1500) {
            $(window).scroll(function(){
                $('.full-price-pc').toggleClass('full-price-pc--fixed', $(this).scrollTop() > 295);
            });
        }
        if(document.documentElement.clientWidth > 993) {
            $(window).scroll(function(){
                $('.full-price-pc').toggleClass('full-price-pc--fixed', $(this).scrollTop() > 295);
            });
        }
        if(document.documentElement.clientWidth < 993) {
            $(window).scroll(function(){
                $('.full-price-pc').toggleClass('full-price-pc--fixed', $(this).scrollTop() > 295);
            });
        }
    });

    // Фикс прайс Мобилка
    $(window).scroll(function(){
        $('.full-price-mobile').toggleClass('full-price-mobile--fixed', $(this).scrollTop() > 60);
    });

    // Переключатель картинок в прайсе

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        const target = $(e.target).attr("href") // activated tab
        if(target === '#womenPriceTab'){
            $('#mobilePriceGirl').removeClass('hidden');
            $('#mobilePriceMan').addClass('hidden');
        }
        else {
            $('#mobilePriceMan').removeClass('hidden');
            $('#mobilePriceGirl').addClass('hidden');
        }
    });

    // Карусель на главной
    $('.main-slider').owlCarousel({
        //center: true,
        items:1,
        loop: true,
        autoplay: false,
        mouseDrag: true,
        autoHeight: true,
        //lazyLoad:true,
        nav: false,
        dots: true,
        touchDrag: true,
        navText : ['<svg width="24" height="54" viewBox="0 0 24 54" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M23.1961 0.42282C24.1051 1.10198 24.2674 2.35871 23.5588 3.2298L4.70839 26.4002L23.5894 50.8088C24.2758 51.6962 24.0817 52.9488 23.1557 53.6066C22.2298 54.2643 20.9228 54.0783 20.2364 53.1909L0.410423 27.5608C-0.147992 26.8389 -0.13544 25.8487 0.441109 25.14L20.2671 0.770362C20.9758 -0.100736 22.2871 -0.256336 23.1961 0.42282Z"/></svg>', '<svg width="24" height="54" viewBox="0 0 24 54" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M23.1961 0.42282C24.1051 1.10198 24.2674 2.35871 23.5588 3.2298L4.70839 26.4002L23.5894 50.8088C24.2758 51.6962 24.0817 52.9488 23.1557 53.6066C22.2298 54.2643 20.9228 54.0783 20.2364 53.1909L0.410423 27.5608C-0.147992 26.8389 -0.13544 25.8487 0.441109 25.14L20.2671 0.770362C20.9758 -0.100736 22.2871 -0.256336 23.1961 0.42282Z"/></svg>'],
        margin:0,
        responsive:{
            1400:{
                dots: true,
            },
            0:{
                dots: true,
            }
        }
    });

    $('.slider-review').owlCarousel({
        //center: true,
        items:1,
        loop: true,
        autoplay: false,
        mouseDrag: true,
        autoHeight: false,
        //lazyLoad:true,
        nav: false,
        dots: true,
        touchDrag: true,
        navText : ['<svg width="24" height="54" viewBox="0 0 24 54" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M23.1961 0.42282C24.1051 1.10198 24.2674 2.35871 23.5588 3.2298L4.70839 26.4002L23.5894 50.8088C24.2758 51.6962 24.0817 52.9488 23.1557 53.6066C22.2298 54.2643 20.9228 54.0783 20.2364 53.1909L0.410423 27.5608C-0.147992 26.8389 -0.13544 25.8487 0.441109 25.14L20.2671 0.770362C20.9758 -0.100736 22.2871 -0.256336 23.1961 0.42282Z"/></svg>', '<svg width="24" height="54" viewBox="0 0 24 54" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M23.1961 0.42282C24.1051 1.10198 24.2674 2.35871 23.5588 3.2298L4.70839 26.4002L23.5894 50.8088C24.2758 51.6962 24.0817 52.9488 23.1557 53.6066C22.2298 54.2643 20.9228 54.0783 20.2364 53.1909L0.410423 27.5608C-0.147992 26.8389 -0.13544 25.8487 0.441109 25.14L20.2671 0.770362C20.9758 -0.100736 22.2871 -0.256336 23.1961 0.42282Z"/></svg>'],
        margin:0,
        responsive:{
            1500:{
                dots: true,
                items:3,
                margin:60,
            },
            1250:{
                items:3,
                margin:40,
            },
            993:{
                items:2,
                margin:40,
            },
            767:{
                items:2,
                margin:40,
                autoHeight: false,
            },
            0:{
                items:1,
                dots: true,
                autoHeight: false,
            }
        }
    });

    $('.slider-procedure').owlCarousel({
        //center: true,
        items:1,
        loop: true,
        autoplay: false,
        mouseDrag: true,
        autoHeight: true,
        //lazyLoad:true,
        nav: true,
        dots: false,
        touchDrag: true,
        navText : ['<svg viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30 5L10 25L30 45L25 50L0 25L25 0L30 5Z" /></svg>', '<svg viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 5L20 25L0 45L5 50L30 25L5 0L0 5Z"/></svg>'],
        margin:0,
        responsive:{
            1600:{
                dots: false,
                items:3,
                margin:30,
            },
            1250:{
                items:3,
                margin:20,
                dots: false,
                nav: true,
            },
            993:{
                items:3,
                margin:20,
                nav: true,
                dots: false,
            },
            767:{
                items:2,
                margin:20,
                dots: true,
                nav: false,
                autoHeight: false,
            },
            550:{
                items:2,
                dots: true,
                nav: false,
                margin:10,
                autoHeight: false,
            },
            0:{
                items:1,
                dots: true,
                nav: false,
                autoHeight: false,
            }
        }
    });

    $('.slider-equipment-sec').owlCarousel({
        //center: true,
        items:1,
        loop: true,
        autoplay: false,
        mouseDrag: true,
        autoHeight: true,
        //lazyLoad:true,
        nav: true,
        dots: false,
        touchDrag: true,
        navText : ['<svg viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30 5L10 25L30 45L25 50L0 25L25 0L30 5Z" /></svg>', '<svg viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 5L20 25L0 45L5 50L30 25L5 0L0 5Z"/></svg>'],
        margin:0,
        responsive:{


            993:{
                items:2,
                margin:42,
                dots: false,
                nav: true,
            },
            767:{
                items:2,
                margin:20,
                dots: true,
                nav: false,
                autoHeight: false,
            },
            550:{
                items:1,
                nav: false,
                dots: true,
                margin:0,
                autoHeight: false,
            },
            0:{
                items:1,
                nav: false,
                dots: true,
                autoHeight: false,
            }
        }
    });

    $('.equipmant-slider').owlCarousel({
        //center: true,
        items:1,
        loop: true,
        autoplay: false,
        mouseDrag: true,
        autoHeight: true,
        //lazyLoad:true,
        nav: true,
        dots: false,
        touchDrag: true,
        navText : ['<svg viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30 5L10 25L30 45L25 50L0 25L25 0L30 5Z" /></svg>', '<svg viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 5L20 25L0 45L5 50L30 25L5 0L0 5Z"/></svg>'],
        margin:0,
        responsive:{
            1400:{
                dots: false,
            },
            767:{
                dots: false,
            },
            550:{
                dots: false,
                autoHeight: false,
            },
            0:{
                dots: false,
                nav: true,
                autoHeight: false,
            }
        }
    });

    $('.sale-slider').owlCarousel({
        //center: true,
        items:2,
        loop: true,
        autoplay: false,
        mouseDrag: true,
        autoHeight: true,
        //lazyLoad:true,
        nav: true,
        dots: false,
        touchDrag: true,
        navText : ['<svg viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30 5L10 25L30 45L25 50L0 25L25 0L30 5Z" /></svg>', '<svg viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 5L20 25L0 45L5 50L30 25L5 0L0 5Z"/></svg>'],
        margin:0,
        responsive:{
            1400:{
                items:2,
                margin:60,
                dots: false,
                nav: true,
            },
            993:{
                items:2,
                margin:20,
                nav: true,
                dots: false,
            },
            767:{
                items:2,
                margin:10,
                dots: true,
                nav: false,
                autoHeight: true,
            },
            550:{
                items:1,
                dots: true,
                nav: false,
                margin:0,
                autoHeight: true,
            },
            0:{
                items:1,
                dots: true,
                nav: false,
                autoHeight: true,
            }
        }
    });

    // Показать - скрыть фильтр в отзывах
    $('#review-show').click(function () {
        $(this).hide();
        $('#review-form').show();
        $('#review-hide').show();
    });
    $('#review-hide').click(function () {
        $(this).hide();
        $('#review-form').hide();
        $('#review-show').show();
    });

    // Активация вкладки Профиль в ЛК

    $('#activePrifileTab').click(function () {
        $('.tab-lk li').removeClass('active');
        $('#activePrifileTabLi').addClass('active');
    });
    $(function(){
        if ($(window).width() < 767){
            $('#activePrifileTab').click(function () {
                $('html, body').animate({
                    scrollTop: $("#activePrifileTabLi").offset().top - 74  // класс объекта к которому приезжаем
                }, 777);
            });
        }
    });

    // Анимация главного слайдера
    function setAnimation ( _elem, _InOut ) {
        // Store all animationend event name in a string.
        // cf animate.css documentation
        var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

        _elem.each ( function () {
            var $elem = $(this);
            var $animationType = 'animated ' + $elem.data( 'animation-' + _InOut );

            $elem.addClass($animationType).one(animationEndEvent, function () {
                $elem.removeClass($animationType); // remove animate.css Class at the end of the animations
            });
        });
    }

    // Анимация главного слайдера
    $('.main-slider').on('changed.owl.carousel', function(event) {

        var $currentItem = $('.owl-item', $('.main-slider')).eq(event.item.index);
        var $elemsToanim = $currentItem.find("[data-animation-in]");
        setAnimation ($elemsToanim, 'in');
    });

    // Календарь
    $( ".datepicker" ).datepicker({
        dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
        firstDay: 1,
        minDate: 0,
        monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октярь", "Ноябрь", "Декабрь" ],
        dateFormat: "dd.mm.yy",
        beforeShow: function(input, obj) {
            $(input).after($(input).datepicker('widget'));
        },
    });

    $("#codeForm").validate({
        // Отключение вывода полей с сообщением о ошибке
        errorPlacement: function(error,element) {
            return true;
        },
        rules: {
            name: {
                required: true,
                minlength: 4
            },
            code: {
                required: true,
                digits: false,
                minlength: 4,
                maxlength: 6
            }

        },
        messages: {
            name: {
                required: "",
                minlength: jQuery.validator.format("")
            }
        }
    });

    $("#codeForm input").on("blur", function(){
        if($("#codeForm").valid())
        {
            $("#codeForm button[type='submit']").removeClass("disabled");
        }
        else {
            $("#codeForm button[type='submit']").addClass("disabled");
        }
    });

    // Активация ввода кода
    $('#sendCode').click(function () {
        $(this).addClass('hidden');
        $('#fieldCode').removeClass('hidden');
        $('#resendCode').removeClass('hidden');

        const time = $('#resendTimer');
        timerDecrement();
        function timerDecrement() {
            setTimeout(function() {
                const newTime = time.text() - 1;

                time.text(newTime);

                if(newTime > 0) {
                    timerDecrement();
                }
                if(newTime == 0) {
                    $('#resendLink').removeClass('disabled');
                }
            }, 1000);
        }
    });

    $('#resendLink').click(function () {
        const time = $('#resendTimer').text('60');
        timerDecrement();
        function timerDecrement() {
            setTimeout(function() {
                const newTime = time.text() - 1;

                time.text(newTime);

                if(newTime > 0) {
                    timerDecrement();
                }
                if(newTime == 0) {
                    $('#resendLink').removeClass('disabled');
                }
            }, 1000);
        }
    });

    // Активация ввода кода Логин
    $('#sendCode-1').click(function () {
        $(this).addClass('hidden');
        $('#fieldCode-1').removeClass('hidden');
        $('#resendCode-1').removeClass('hidden');

        const time = $('#resendTimer-1');
        timerDecrement();
        function timerDecrement() {
            setTimeout(function() {
                const newTime_1 = time.text() - 1;

                time.text(newTime_1);

                if(newTime_1 > 0) {
                    timerDecrement();
                }
                if(newTime_1 == 0) {
                    $('#resendLink-1').removeClass('disabled');
                }
            }, 1000);
        }
    });

    $('#resendLink-1').click(function () {
        const time = $('#resendTimer-1').text('60');
        timerDecrement();
        function timerDecrement() {
            setTimeout(function() {
                const newTime_1 = time.text() - 1;

                time.text(newTime_1);

                if(newTime_1 > 0) {
                    timerDecrement();
                }
                if(newTime_1 == 0) {
                    $('#resendLink-1').removeClass('disabled');
                }
            }, 1000);
        }
    });

    // Активация ввода кода Регистрация
    $('#sendCode-2').click(function () {
        $(this).addClass('hidden');
        $('#fieldCode-2').removeClass('hidden');
        $('#resendCode-2').removeClass('hidden');

        const time = $('#resendTimer-2');
        timerDecrement();
        function timerDecrement() {
            setTimeout(function() {
                const newTime_2 = time.text() - 1;

                time.text(newTime_2);

                if(newTime_2 > 0) {
                    timerDecrement();
                }
                if(newTime_2 == 0) {
                    $('#resendLink-2').removeClass('disabled');
                }
            }, 1000);
        }
    });

    $('#resendLink-2').click(function () {
        const time = $('#resendTimer-2').text('60');
        timerDecrement();
        function timerDecrement() {
            setTimeout(function() {
                const newTime_2 = time.text() - 1;

                time.text(newTime_2);

                if(newTime_2 > 0) {
                    timerDecrement();
                }
                if(newTime_2 == 0) {
                    $('#resendLink-2').removeClass('disabled');
                }
            }, 1000);
        }
    });

    // Показать детали в модалке

    $("#moreDetail").click(function () {
        if($("#moreDetail").hasClass("active")){
            $('#containerDetail').addClass("hidden");
            $('#moreDetail').text('Посмотреть детали записи').removeClass('active');
        }else{
            $('#containerDetail').removeClass("hidden");
            $('#moreDetail').text('Скрыть детали записи').addClass('active');
        }
    });

    // Показать блок Смотреть все цены

    $("#btnShowZone").click(function () {
        if($("#btnShowZone").hasClass("no-active")){
            $('#selectZone2').removeClass("hidden");
            $('#btnShowZone').text('Свернуть').removeClass('no-active');
            $('html, body').animate({
                scrollTop: $("#btnShowZone").offset().top - 74  // класс объекта к которому приезжаем
            }, 777);
        }else{
            $('#selectZone2').addClass("hidden");
            $('#btnShowZone').text('Смотреть все цены').addClass('no-active');
            $('html, body').animate({
                scrollTop: $("#procedureZone").offset().top - 64  // класс объекта к которому приезжаем
            }, 777);
        }
    });

    // Показать архив акций

    $("#showArchiveSale").click(function () {
        if($("#showArchiveSale").hasClass("active")){
            $('#archiveSale').removeClass("hidden");
            $('#showArchiveSale').text('Свернуть список акций').removeClass('active');
        }else{
            $('#archiveSale').addClass("hidden");
            $('#showArchiveSale').text('Архив акций').addClass('active');
        }
    });




    // Валидация формы
    $("#reviewForm").validate({
        // Отключение вывода полей с сообщением о ошибке
        errorPlacement: function(error,element) {
            return true;
        },
        rules: {
            name: {
                required: true,
                minlength: 2
            }/*,
            text: {
                required: true,
                minlength: 20
            }*//*,
            email: {
                required: true,
                email: true
            }*/

        },
        messages: {
            name: {
                required: "",
                minlength: jQuery.validator.format("")
            }/*,
            text: {
                required: ""
            }*//*,
            email: {
                required: ""
            }*/
        }

    });

    $(".form-request").validate({
        // Отключение вывода полей с сообщением о ошибке
        errorPlacement: function(error,element) {
            return true;
        },
        rules: {
            name: {
                required: true,
                minlength: 2
            }/*,
            text: {
                required: true,
                minlength: 20
            }*//*,
            email: {
                required: true,
                email: true
            }*/

        },
        messages: {
            name: {
                required: "",
                minlength: jQuery.validator.format("")
            }/*,
            text: {
                required: ""
            }*//*,
            email: {
                required: ""
            }*/
        }

    });

    $(".form-request-2").validate({
        // Отключение вывода полей с сообщением о ошибке
        errorPlacement: function(error,element) {
            return true;
        },
        rules: {
            name: {
                required: true,
                minlength: 2
            }/*,
            text: {
                required: true,
                minlength: 20
            }*//*,
            email: {
                required: true,
                email: true
            }*/

        },
        messages: {
            name: {
                required: "",
                minlength: jQuery.validator.format("")
            }/*,
            text: {
                required: ""
            }*//*,
            email: {
                required: ""
            }*/
        }

    });

    $(".form-request-3").validate({
        // Отключение вывода полей с сообщением о ошибке
        errorPlacement: function(error,element) {
            return true;
        },
        rules: {
            /*
            name: {
                required: true,
                minlength: 2
            },
            text: {
                required: true,
                minlength: 20
            }*//*,
            */
            email: {
                required: true,
                email: true
            }

        },
        messages: {
            /*
            name: {
                required: "",
                minlength: jQuery.validator.format("")
            },
            text: {
                required: ""
            }*//*,
            */
            email: {
                required: ""
            }
        }

    });

    $(".form-request-4").validate({
        // Отключение вывода полей с сообщением о ошибке
        errorPlacement: function(error,element) {
            return true;
        },
        rules: {
            name: {
                required: true,
                minlength: 2
            }/*,
            text: {
                required: true,
                minlength: 20
            }*//*,
            email: {
                required: true,
                email: true
            }*/

        },
        messages: {
            name: {
                required: "",
                minlength: jQuery.validator.format("")
            }/*,
            text: {
                required: ""
            }*//*,
            email: {
                required: ""
            }*/
        }

    });
    $(".form-request-5").validate({
        // Отключение вывода полей с сообщением о ошибке
        errorPlacement: function(error,element) {
            return true;
        },
        rules: {
            /*
            name: {
                required: true,
                minlength: 2
            },
            text: {
                required: true,
                minlength: 20
            }*//*,
            */
            email: {
                required: true,
                email: true
            }

        },
        messages: {
            /*
            name: {
                required: "",
                minlength: jQuery.validator.format("")
            },
            text: {
                required: ""
            }*//*,
            */
            email: {
                required: ""
            }
        }
    });

    // Отключение кнопки в форме
    $("#reviewForm input").on("blur", function(){
        if($("#reviewForm").valid())
        {
            $("#reviewForm button[type='submit']").removeClass("disabled");
        }
        else {
            $("#reviewForm button[type='submit']").addClass("disabled");
        }
    });

    $(".form-request input").on("blur", function(){
        if($(".form-request").valid())
        {
            $(".form-request button[type='submit']").removeClass("disabled");
        }
        else {
            $(".form-request button[type='submit']").addClass("disabled");
        }
    });

    $(".form-request-2 input").on("blur", function(){
        if($(".form-request-2").valid())
        {
            //$(".form-request-2 button[type='submit']").removeClass("disabled");
        }
        else {
            //$(".form-request-2 button[type='submit']").addClass("disabled");
        }
    });

    $(".form-request-3 input").on("blur", function(){
        if($(".form-request-3").valid())
        {
            //$(".form-request-3 button[type='submit']").removeClass("disabled");
        }
        else {
            //$(".form-request-3 button[type='submit']").addClass("disabled");
        }
    });

    $(".form-request-4 input").on("blur", function(){
        if($(".form-request-4").valid())
        {
            //$(".form-request-4 button[type='submit']").removeClass("disabled");
        }
        else {
            //$(".form-request-4 button[type='submit']").addClass("disabled");
        }
    });

    $(".form-request-5 input").on("blur", function(){
        if($(".form-request-5").valid())
        {
            $(".form-request-5 button[type='submit']").removeClass("disabled");
        }
        else {
            $(".form-request-5 button[type='submit']").addClass("disabled");
        }
    });


    //Маска телефона

    $('.phone_input').inputmask("+7(999)999-9999");

    // добавляем правило для валидации телефона
    jQuery.validator.addMethod("checkMaskPhone", function(value, element) {
        return /\+\d{1}\(\d{3}\)\d{3}-\d{4}/g.test(value);
    });

    // получаем нашу форму по class
    var form = $('.form-request');
    var form_2 = $('.form-request-2');
    var form_3 = $('.form-request-3');
    var form_4 = $('.form-request-4');
    var form_5 = $('.form-request-5');

    // включаем валидацию в форме
    form.validate();
    form_2.validate();
    form_3.validate();
    form_4.validate();
    form_5.validate();

    // вешаем валидацию на поле с телефоном по классу
    $.validator.addClassRules({
        'phone_input': {
            checkMaskPhone: true,
        }
    });

    // Проверка на валидность формы при отправке, если нужно
    form.submit(function(e){
        e.preventDefault();
        // if (form.valid()) {
        //     alert('Форма отправлена');
        // }
        return;
    });
    form_2.submit(function(e){
        e.preventDefault();
        // if (form.valid()) {
        //     alert('Форма отправлена');
        // }
        return;
    });
    form_3.submit(function(e){
        e.preventDefault();
        // if (form.valid()) {
        //     alert('Форма отправлена');
        // }
        return;
    });
    form_4.submit(function(e){
        e.preventDefault();
        // if (form.valid()) {
        //     alert('Форма отправлена');
        // }
        return;
    });
    form_5.submit(function(e){
        e.preventDefault();
        // if (form.valid()) {
        //     alert('Форма отправлена');
        // }
        return;
    });

    // Сменить пароль
    $("#changePass").click(function () {
        if($("#changePass").hasClass("active")){
            $('#passFields .b-profile__row--new-pass').addClass("hidden");
            $('#changePass').text('Изменить').removeClass('active');
        }else{
            $('#passFields .b-profile__row--new-pass').removeClass("hidden");
            $('#changePass').text('Скрыть').addClass('active');
        }
    });

    // Показать - скрыть пароль
    $('body').on('click', '.showPass', function(){
        if ($(this).parent().find("input").attr('type') == 'password'){
            $(this).addClass('view');
            $(this).parent().find("input").attr('type', 'text');
        } else {
            $(this).removeClass('view');
            $(this).parent().find("input").attr('type', 'password');
        }
        return false;
    });


    $(document).on("shown.bs.collapse", ".panel-collapse, a[data-toggle='tab']", function () {
        var selected = $(this);
        $("html, body").animate({
            scrollTop: selected.offset().top - 170
        }, 1000);
    });

});


$(window).load(function(  ) {
    $(".yakor").on("click", function(e){
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top
        }, 777);
        e.preventDefault();
        return false;
    });

    $(".twentytwenty-container").twentytwenty({
        default_offset_pct: 0.7
    });
});


$(window).on("load", function(){


    $('.fancybox').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        padding: 0,
        helpers : {
            media : {}
        }
    });

});