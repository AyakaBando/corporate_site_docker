/* ============================================================
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Open source under the BSD License.
 *
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * https://raw.github.com/danro/jquery-easing/master/LICENSE
 * ======================================================== */
jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(a,b,c,d,e){return jQuery.easing[jQuery.easing.def](a,b,c,d,e)},easeInQuad:function(a,b,c,d,e){return d*(b/=e)*b+c},easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c},easeInOutQuad:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b+c:-d/2*(--b*(b-2)-1)+c},easeInCubic:function(a,b,c,d,e){return d*(b/=e)*b*b+c},easeOutCubic:function(a,b,c,d,e){return d*((b=b/e-1)*b*b+1)+c},easeInOutCubic:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b+c:d/2*((b-=2)*b*b+2)+c},easeInQuart:function(a,b,c,d,e){return d*(b/=e)*b*b*b+c},easeOutQuart:function(a,b,c,d,e){return-d*((b=b/e-1)*b*b*b-1)+c},easeInOutQuart:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b*b+c:-d/2*((b-=2)*b*b*b-2)+c},easeInQuint:function(a,b,c,d,e){return d*(b/=e)*b*b*b*b+c},easeOutQuint:function(a,b,c,d,e){return d*((b=b/e-1)*b*b*b*b+1)+c},easeInOutQuint:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b*b*b+c:d/2*((b-=2)*b*b*b*b+2)+c},easeInSine:function(a,b,c,d,e){return-d*Math.cos(b/e*(Math.PI/2))+d+c},easeOutSine:function(a,b,c,d,e){return d*Math.sin(b/e*(Math.PI/2))+c},easeInOutSine:function(a,b,c,d,e){return-d/2*(Math.cos(Math.PI*b/e)-1)+c},easeInExpo:function(a,b,c,d,e){return b==0?c:d*Math.pow(2,10*(b/e-1))+c},easeOutExpo:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c},easeInOutExpo:function(a,b,c,d,e){return b==0?c:b==e?c+d:(b/=e/2)<1?d/2*Math.pow(2,10*(b-1))+c:d/2*(-Math.pow(2,-10*--b)+2)+c},easeInCirc:function(a,b,c,d,e){return-d*(Math.sqrt(1-(b/=e)*b)-1)+c},easeOutCirc:function(a,b,c,d,e){return d*Math.sqrt(1-(b=b/e-1)*b)+c},easeInOutCirc:function(a,b,c,d,e){return(b/=e/2)<1?-d/2*(Math.sqrt(1-b*b)-1)+c:d/2*(Math.sqrt(1-(b-=2)*b)+1)+c},easeInElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e)==1)return c+d;g||(g=e*.3);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return-(h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g))+c},easeOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e)==1)return c+d;g||(g=e*.3);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return h*Math.pow(2,-10*b)*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e/2)==2)return c+d;g||(g=e*.3*1.5);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return b<1?-0.5*h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+c:h*Math.pow(2,-10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)*.5+d+c},easeInBack:function(a,b,c,d,e,f){return f==undefined&&(f=1.70158),d*(b/=e)*b*((f+1)*b-f)+c},easeOutBack:function(a,b,c,d,e,f){return f==undefined&&(f=1.70158),d*((b=b/e-1)*b*((f+1)*b+f)+1)+c},easeInOutBack:function(a,b,c,d,e,f){return f==undefined&&(f=1.70158),(b/=e/2)<1?d/2*b*b*(((f*=1.525)+1)*b-f)+c:d/2*((b-=2)*b*(((f*=1.525)+1)*b+f)+2)+c},easeInBounce:function(a,b,c,d,e){return d-jQuery.easing.easeOutBounce(a,e-b,0,d,e)+c},easeOutBounce:function(a,b,c,d,e){return(b/=e)<1/2.75?d*7.5625*b*b+c:b<2/2.75?d*(7.5625*(b-=1.5/2.75)*b+.75)+c:b<2.5/2.75?d*(7.5625*(b-=2.25/2.75)*b+.9375)+c:d*(7.5625*(b-=2.625/2.75)*b+.984375)+c},easeInOutBounce:function(a,b,c,d,e){return b<e/2?jQuery.easing.easeInBounce(a,b*2,0,d,e)*.5+c:jQuery.easing.easeOutBounce(a,b*2-e,0,d,e)*.5+d*.5+c}});

/*
 * Flatten height same as the highest element for each row.
 *
 * Copyright (c) 2011 Hayato Takenaka
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * @author: Hayato Takenaka (http://urin.take-uma.net)
 * @version: 0.0.2
**/
!function(t){t.fn.tile=function(e){var h,i,n,r,o,u=this.length-1;return e||(e=this.length),this.each(function(){o=this.style,o.removeProperty&&o.removeProperty("height"),o.removeAttribute&&o.removeAttribute("height")}),this.each(function(o){n=o%e,0==n&&(h=[]),h[n]=t(this),r=h[n].height(),(0==n||r>i)&&(i=r),(o==u||n==e-1)&&t.each(h,function(){this.height(i)})})}}(jQuery);

//UA判定
const _ua = ((u)=>{
  return {
    ltIE6:typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined",
    ltIE7:typeof window.addEventListener == "undefined" && typeof document.querySelectorAll == "undefined",
    ltIE8:typeof window.addEventListener == "undefined" && typeof document.getElementsByClassName == "undefined",
    Tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1 && u.indexOf("tablet pc") == -1) 
      || u.indexOf("ipad") != -1
      || (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
      || (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
      || u.indexOf("kindle") != -1
      || u.indexOf("silk") != -1
      || u.indexOf("playbook") != -1,
    Mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
      || u.indexOf("iphone") != -1
      || u.indexOf("ipod") != -1
      || (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
      || (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
      || u.indexOf("blackberry") != -1
  }
})(window.navigator.userAgent.toLowerCase());

/********************************************

	Unionnet commons functions
	@共通スクリプトは以下に記載。
	@グローバル変数は仕様せず、下部に関数を定義し、できるだけローカル変数を扱う。
	@実行箇所は最上部に記述のこと。

********************************************/

;(($)=>{
  $(()=> {
	/*************	 trigger functions  ******************/

		/** .js-hoverホバーで.is-hover追加 **/
		hoverClass();

		/** .hoverの要素に乗ったら.85に透過 **/
		hoverOpacity();

		/**   スクロールすると出てくる「ページトップへ」ボタン**/
		pagetop();

		/**   スムーススクロール **/
		smoothscroll();

		/**   スマホ時自動で電話番号リンクに **/
		telGrant();

		/**   タブレット時のビューポート設定変更（ベースの幅を入れる） **/
		setViewport('width=1040');

	$(window).on('load resize',()=>{
		/** window load resize trigger functions  **/


		/*************************/

	});// end window load resize function


	$(window).scroll(()=>{

		/** window scroll trigger functions  **/

		});// end window scroll function


  }); // end ready function


  /****************** end trigger functions  ********************/

	/*************	functions declaration  ******************/

	const hoverClass = ()=>{
		if(!_ua.Tablet && !_ua.Mobile) {
			$('.js-hover').on({
				'mouseenter':event=>{
					let $this = $(event.currentTarget);
					$this.addClass('is-hover');
				},//end mouseenter func
				'mouseleave':event=>{
					let $this = $(event.currentTarget);
					$this.removeClass('is-hover');
				}//end mouseleave func
			});
		}
	}

	const hoverOpacity = ()=>{
		$('.hover').on({
			'mouseenter':event=>{
				let $this = $(event.currentTarget);	
				$this.stop(true,true).fadeTo(200,.75);
			},//end mouseenter func
			'mouseleave':event=>{
				let $this = $(event.currentTarget);	
				$this.stop(true,true).fadeTo(200,1);
			}//end mouseleave func
		});
	}

	const pagetop = ()=>{
		const topBtn = $('.pagetop');
		topBtn.hide();
		//スクロールが100に達したらボタン表示
		$(window).on('scroll', event =>{
			let $this = $(event.currentTarget);	
			if ($this.scrollTop() > 100) {
				topBtn.fadeIn();
			} else {
				topBtn.fadeOut();
			}
		});
		//スクロールしてトップ
		topBtn.on('click', event =>{
			$('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	}

	const smoothscroll = ()=>{
		$('a[href^="#"]:not(.js-modal)').on('click', event =>{
			let $this = $(event.currentTarget);	
			const speed = 400;
			const href= $this.attr("href");
			const target = $(href == "#" || href == "" ? 'html' : href);
			const position = target.offset().top;
			$('body,html').animate({scrollTop:position}, speed, 'swing');
			return false;
		});
	}

	const telGrant = ()=>{
		if(!_ua.Mobile)
			return;
		$('span[data-action=call]').each((index,element)=> {
			let $this = $(element);
			$this.wrap('<a href="tel:' + $this.data('tel') + '"></a>');
		});
	}

	const setViewport = (size)=>{
		if(_ua.Tablet) {
			$('meta[name="viewport"]').attr('content', size);
		 }
	}


  /************* end functions declaration  ******************/

})(jQuery);
