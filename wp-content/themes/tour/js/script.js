initHamburger();
// Логика основного меню
(function () {
  var nav = document.querySelector('.header-nav');

  if (!nav) {
    return;
  }

  nav.addEventListener('click', function (e) {
      //e.preventDefault();
      var navItem = e.target.parentNode;
      var subList = navItem.querySelector('.header-nav__sub-list');

      if (subList) {
        e.preventDefault();
        openSubList(subList);
      }
  });

  // Открыть подменю и скрыть остальные
  function openSubList(subList) {
    var subListAll = nav.querySelectorAll('.header-nav__sub-list');

    for (var i = 0; i < subListAll.length; i++) {

      if (subListAll[i] == subList) {
        continue;
      }

      subListAll[i].classList.remove('header-nav__sub-list--open');
    }

    subList.classList.toggle('header-nav__sub-list--open');
  }
})();

function initHamburger() {
  var hamburger = document.querySelector(".hamburger");

  if (!hamburger) return;

  var resize = function(e){
      if (!!document.querySelector(".hamburger--open")) {
        hamburger.classList.toggle("hamburger--open");
        menu.classList.toggle("header__menu-open");
      }
  };

  (function(){
    var time;
    window.onresize = function(e){
      if (time)
      clearTimeout(time);
      time = setTimeout(function(){
        resize(e);
      },100);
    }
  })();

  if (document.documentElement.clientWidth > 1024) {
    console.log(document.documentElement.clientWidth);
  }

  var menu = document.querySelector(".header__wrap-nav");
  
  hamburger.addEventListener('click', function () {
    if (!document.querySelector(".hamburger--open")) {
      hamburger.classList.toggle("hamburger--open");
      menu.classList.toggle("header__menu-open");
    } else {
      hamburger.classList.toggle("hamburger--open");
      menu.classList.toggle("header__menu-open");
    }

  });

}

$(function () {
    var error = $(".errorN");
    error[0].style.color = 'red';

    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }

    $(document).on('click', "#sub_form", function (e) {
        e.preventDefault();
      /*Валидация на стороне клиента чтобы не ждать успешного результата проверок ajax запроса (занимает время)*/
        email = $('form[name=feedback] input[name="email"]').val();
        phone = $('form[name=feedback] input[name="phone"]').val();
        uname = $('form[name=feedback] input[name="uname"]').val();
        lastname = $('form[name=feedback] input[name="lastname"]').val();
        message = $('form[name=feedback] textarea[name="message"]').val();
        success = $('form[name=feedback] input[name="success"]').val();
        link = $('form[name=feedback] input[name="link"]').val();
        emailto = $('form[name=feedback] input[name="emailto"]').val();

        if((email != '') && (phone != '') && (uname != '') && (lastname != '') && (message != '')){
            if(!validateEmail(email)) {
                error.text('* Email должен соответствовать формату xxx@xxx.ru');
                return;
            }

            $('.shedule-form__body').html(success);

        }else{
            error.text('* Заполните обязательные поля');
            return;
        }
        var dataform ='uname='+uname+'&email='+email+'&phone='+phone+'&lastname='+lastname+'&message='+message+'&emailto='+emailto;
      /*---------Если все хорошо и без ошибок отправляем запрос на сервер--------------*/
        $.ajax({
            type: "POST",
            url: link,
            cache: false,
            data: dataform,
            success: function (data) {
                var resultform = $.parseJSON(data);
                console.log(resultform);
            }
        });
    });
});


// function initHamburger() {
//   var $hamburger = $('.hamburger');
//   var $main = $('.main');
//
//   var mainControl = $('.main-control');
//   var pageHeight;
//   var headerHeight;
//   var panelSaleHeight;
//   var panelHeight;
//   var heightTop;
//
//   if ($hamburger) {
//     $(document).on('click', '.hamburger', function (e) {
//
//       $('.main-control').toggleClass('main-control--show');
//
//       if ($('.main-control').hasClass('main-control--show')) {
//         $('body').css('overflow', 'hidden');
//         $('body').css('position', 'fixed');
//         $('body').css('top', '0');
//         $('body').css('left', '0');
//         $('body').css('width', '100vw');
//         $('body').css('margin', '0');
//         $('.hamburger').addClass('hamburger--open');
//       } else {
//         $('body').css('overflow', 'initial');
//         $('body').css('position', 'initial')
//         $('.hamburger').removeClass('hamburger--open');
//       }
//
//       if ($(window).height() > 700) {
//         if ( $('.main-control').hasClass('main-control--show') ) {
//           if ( $('.header').length ) {
//             headerHeight = $('.header').outerHeight();
//           } else {
//             headerHeight = 0;
//           }
//
//           if ( $('.panel-sale').length ) {
//             panelSaleHeight = $('.panel-sale').outerHeight();
//           } else {
//             panelSaleHeight = 0;
//           }
//
//           if ( $('#panel').length ) {
//             panelHeight = $('#panel').outerHeight();
//           } else {
//             panelHeight = 0;
//           }
//
//           pageHeight = $(window).outerHeight();
//           heightTop = pageHeight - headerHeight - panelSaleHeight - panelHeight;
//           mainControl.css('height', heightTop);
//         } else {
//           mainControl.css('height', '100vh');
//         }
//
//       }
//
//
//
//       ga('send', 'event', 'btn_menu', 'btn_menu');
//
//
//     });
//   }
//
//   if (!$main.hasClass('main--full')) {
//     $('body').addClass('page-full');
//   }
// }


