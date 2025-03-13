/* =====================================================================
*
*    utility.js
*
* =================================================================== */

jQuery.extend(jQuery.easing,
{
	easeInQuart: function (x, t, b, c, d)
	{
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d)
	{
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d)
	{
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	}
});

var Util = function()
{
	var init = function()
	{
		$(document).ready(function()
		{
			$(window).load(function(){
				$('a[href^="#"]').click(function()
				{
					var e = $(this);
					if(e.attr("href") == "#")
					{
						$(this).unbind();
						return false;
					}
					var ty = $(e.attr("href")).position().top;
					var destId = e.attr("href");
					animateAnchorClick(destId);
					//$('html,body').animate({scrollTop: ty}, 1000, 'easeInOutQuint');
					return false;
				});
				$(".commonBtn").commonBtn();
			});


			//5つの魅力プルダウン			if (navigator.userAgent.indexOf('iPhone') > 0 || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0){				$("#g-nav-characteristic-contents").css({display:"none"});			}			else{			}			var isActive = $(window).width() > 641 ? true : false;			var characteristic = $("#g-nav-characteristic");			var characteristicContents = $("#g-nav-characteristic-contents");			var maxheight = characteristicContents.height();
			characteristicContents.css({display:"none", height:0});			console.log(characteristic)
			characteristic.hover(				function () {					console.log("HO")					if(!isActive) return;					characteristicContents.css({display:"block"}).stop().animate({						height: maxheight + "px"					}, 300 );				},				function () {					if(!isActive) return;					characteristicContents.css({display:"block"}).stop().animate({							height: 0 + "px",						}, 300, function(){							$(this).css({height:"0",display:"none"})}					);				}			);
			characteristicContents.hover(
				function () {
					if(!isActive) return;
					characteristicContents.css({display:"block"}).stop().animate({
						height: maxheight + "px"
					}, 300 );
				},
				function () {
					if(!isActive) return;
					characteristicContents.css({display:"block"}).stop().animate({
							height: 0 + "px",
						}, 300, function(){
							$(this).css({height:"0",display:"none"})}
					);
				}
			);
			$(window).resize(function(){
				if($(window).width() > 641){
					isActive = true;
				}
				else{
					isActive = false;
					characteristicContents.stop().css({display:"none", height:"0"}).stop();
				}

			});



		});
	}();


	return{

	}
}();

function animateAnchorClick(destAnchor)
{
	if (!$("html,body").is(":has(" + destAnchor + ")"))
	{
		return false;
	}
	var destPos = $(destAnchor).position().top;
	$('html,body').animate({scrollTop: destPos}, 1000, 'easeInOutQuint');
}
function $$(id) {
	return $(document.getElementById(id));
}


/**
 *
 * @param {Object} $
 */
(function($){
	$.fn.globalNavBtn = function(options)
	{
		var defaults = {
			vec: 0
		};
		var options = $.extend(defaults, options);

		$(this).hover(function(){
			$(this).stop(true, false).animate({ opacity: 0.6 }, 300);

		},function(){
			$(this).stop(true, false).animate({ opacity: 1 }, 300);
		});

		return this;
	};
	$.fn.localNavBtn = function(options)
	{
		var defaults = {
			vec: 0
		};
		var options = $.extend(defaults, options);

		$(this).hover(function(){
			$(this).stop(true, false).animate({ opacity: 0.6 }, 300);

		},function(){
			$(this).stop(true, false).animate({ opacity: 1 }, 300);
		});

		return this;
	};
	$.fn.commonBtn = function(options)
	{
		var defaults = {
			vec: 0
		};
		var options = $.extend(defaults, options);

		$(this).hover(function(){
			$(this).stop(true, false).animate({ opacity: 0.6 }, 100);

		},function(){
			$(this).stop(true, false).animate({ opacity: 1 }, 300);
		});

		return this;
	};
})(jQuery);




var mainvisual = function()
{
//	return;

	$(function()
	{
		$("#top-mainvisual").find("img").bind("load",function(){
			onloadImgs();
		});

		var visual = $('#top-mainvisual');
		if(visual.length == 0) return;
		var items = visual.children('ul').children('li');
		var num = items.length;
		var currIndex = 0;
		var delayID;
		var isActive = true;
		var h;
		var nav = $("#top-mainvisual-nav");
		nav.find(".next").click(function () {
			stopTime();
			next();
		});
		nav.find(".prev").click(function () {
			stopTime();
			prev();
		});

		function onloadImgs(){

			visual.find("ul").css({height: h+"px"});

			h = items.height();
			items.css({position:"absolute", top: h+"px"});

			//開始
			slideIn(items.eq(currIndex));
		}

		//画像切り換え
		function update(){

			//表示されている画像
			var curr = items.eq(currIndex);

			//カウントアップ
			currIndex = (currIndex+1)%num;
			//次に表示する画像
			var next = items.eq(currIndex);

			slideOut(curr);
			slideIn(next);
		}
		function next(){
			update();
		}
		//1枚戻る
		function prev(){

			//表示されている画像
			var curr = items.eq(currIndex);
			//カウントダウン
			currIndex = (currIndex-1)%num;
			if(currIndex < 0) currIndex = num-1;

			//次に表示する画像
			var next = items.eq(currIndex);

			slideOut(curr);
			slideIn(next);
		}
		//スライドイン
		function slideIn(target){
			target.stop().css({top:visual.children('ul').height()+"px", "z-index":5});

			target.animate({
				top: "0px"
			}, 1500,"easeInOutQuint",startTime);
		}
		//スライドアウト
		function slideOut(target){
			target.stop().css({"z-index":4});
			target.delay(100).animate({
				top: h+"px"
			}, 1300,"easeInOutQuint");
		}
		//タイマースタート
		function startTime(){
			if(!isActive) return;
			stopTime();
			delayID = setTimeout(update,3000);
		}
		//タイマーキャンセル
		function stopTime(){
			clearTimeout(delayID);
		}

		visual.hover(
			function () {
				isActive = false;
				stopTime();
			},
			function () {
				isActive = true;
				startTime();
			}
		);
		$(window).resize(function(){
			h = items.height();
			visual.find("ul").css({height: h+"px"});
			items.css({position:"absolute", top: visual.find("ul").height()+"px"});
			//開始
			slideIn(items.eq(currIndex));

			stopTime();

		});



	});


	return{

	}
}();




$(function(){
	$("#menu").click(function () {
		$("#g-nav").find(".view").toggleClass("open");
	});
});
