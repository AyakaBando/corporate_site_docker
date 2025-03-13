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
				$("#menu").click(function () {
					$("#g-nav").find(".view").toggleClass("open");
				});
			});


			//5つの魅力プルダウン

			if (navigator.userAgent.indexOf('iPhone') > 0 || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0){
				$("#g-nav-characteristic-contents").css({display:"none"});
			}
			else{

			}
			var isActive = $(window).width() > 641 ? true : false;

			var gnav = $("#GlobalNav");
			var globals = gnav.find(".global > li");
			globals.hover(function(){
				if(!isActive) return;
				var local = $(this).find(".local");
				if(local.length <= 0) return;
				local.css({display: "block", opacity: "0"}).stop(true, false).animate({ opacity:1}, 600, "easeOutQuint");
			}, function(){
				var local = $(this).find(".local");
				local.animate({opacity: 0}, 200, "linear", function(){
					local.css({display: "none", opacity: "1"});
				});
			});

			$(window).resize(function(){
				if($(window).width() > 641){
					isActive = true;
				}
				else{
					isActive = false;
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
	$.fn.globalNav = function(options)
	{
		var defaults = {
			vec: 0
		};
		var options = $.extend(defaults, options);
		var globals = $(this).find(".global > li");
		globals.hover(function(){
			var local = $(this).find(".local");
			if(local.length <= 0) return;
			local.css({display: "block", opacity: "0"}).stop(true, false).animate({ opacity:1}, 600, "easeOutQuint");
		}, function(){
			var local = $(this).find(".local");
			local.animate({opacity: 0}, 200, "linear", function(){
				local.css({display: "none", opacity: "1"});
			});
		});
		return this;
	};
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


$(function(){

	$(".commonBtn").hover(
	function(){
		$(this).stop().animate({ opacity: 0.6 }, 200);
		},
	function(){
		$(this).stop().animate({ opacity: 1 }, 500);
		}
	);

	$(window).scroll(function(){
		var py = $(this).scrollTop();
		var ptbtn = $(".footer-container .pagetop");
		if(py <= 0){
			ptbtn.fadeOut(100);
		}else {
			if(ptbtn.css('display') != 'block') ptbtn.fadeIn(100);
		}

	});

});


$(function(){
    $("#Voice .more-btn").on("click", function(){
    	$(this).next().slideToggle("fast");
    	$(this).css("display","none");
    }
    );
});

