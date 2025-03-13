/*
自作のスクリプトはここに
 */

const openPage = () => {
  $('#page').addClass('is-act');
}

const pallarax = ()=>{
  const scrT = $(window).scrollTop(); 
  const winH = $(window).height();
  $('.animation').each((index, element) =>{
    const $this = $(element);
    const off = $this.offset();
    const q = parseInt(winH * 0.5);
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
  });

  $(window).on('scroll',()=>{
    pallarax();
  });

})(jQuery);

/******/