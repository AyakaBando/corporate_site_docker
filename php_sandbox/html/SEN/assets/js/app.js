/*
自作のスクリプトはここに
 */

const opening = ()=>{

  // let $opening = $('.opening');

  // $opening.addClass('is-act');

  $('.p-kv__slider').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false,
    dots: false,
    fade: true,
    speed: 2000
  });

  // $(window).delay(1500).queue((next)=>{
  //   $opening.addClass('is-hidden');
  //   $('.p-kv__slider').slick({
  //     autoplay: true,
  //     autoplaySpeed: 5000,
  //     arrows: false,
  //     dots: false,
  //     fade: true,
  //     speed: 2000
  //   });
  //   next();
  // });
  // $(window).delay(1100).queue((next)=>{
  //   $('.p-kv__copy').addClass('is-act');
  //   $('.c-obj.-n1').addClass('is-act');
  //   $('.c-obj.-n2').addClass('is-act');
  //   $('.c-obj.-n3').addClass('is-act');
  //   next();
  // });
  // $(window).delay(1500).queue((next)=>{
  //   $opening.hide();
  //   next();
  // });
}

const openPage = () => {
  $('#page').addClass('is-act');
}

const slider = ()=>{
  // メイン
  $('.p-kv__slider').slick({
    autoplay: true,
    autoplaySpeed: 3500,
    arrows: false,
    dots: true,
    fade: true,
    speed: 2000
  });
}

// ヘッダースクロール時にクラス付与
const naviScroll = () => {
  const scrT = $(window).scrollTop(); 
  const kvH = $('.p-kv').outerHeight(); 
  if (scrT > kvH) {
    $('.l-header').addClass('is-fixed');
  } else {
    $('.l-header').removeClass('is-fixed');
  }
}

// SPメニュー
const drawer = ()=>{
  $('.js-hamburger').on('click', event =>{
    let $this = $(event.currentTarget);
    $this.toggleClass('is-act');
    $('.js-drawer').fadeToggle(500);
    $('html,body').toggleClass('is-act');
  });
  $('.js-drawer ul li a').on('click', event =>{
    $('.js-drawer').fadeOut(500);
    $('.js-hamburger').removeClass('is-act');
    $('html,body').removeClass('is-act');
  });

}

const pallarax = ()=>{
  const scrT = $(window).scrollTop(); 
  const winH = $(window).height();
  $('.animation').each((index, element) =>{
    const $this = $(element);
    const off = $this.offset();
    const q = parseInt(winH * 0.6);
    if(scrT + (q)  > off.top){
    for(let i = 0; i < $this.find('.anim_elm').length; i ++ ){
      let self = $this.find('.anim_elm').eq(i);
        anim(self,i);
      }
    }
  });
}

const anim = (self,i)=>{
  const delay = (self.data('delay')) ? parseInt(self.data('delay')): 60;
  const easing = (self.data('ease')) ? self.data('ease') :'easing';
  self.delay(delay *i).queue((next)=> {
    self.addClass(easing).addClass('is-act');
    next();
  });
}

/******/

/*
呼び出しはここで
 */
;(($)=>{

  $(()=> {
    openPage();
    slider();
    drawer();
  });

  $(window).on('scroll',()=>{
    pallarax();
    naviScroll();
  });

})(jQuery);

/******/