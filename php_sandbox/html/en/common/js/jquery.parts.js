// jquery-opacity-rollover.js =========================================================================

$(document).ready(function(){
        $('h2 a img').opOver(1.0,0.7);
        $('li.t_box_li').opOver(1.0,0.7);
        $('h1 a').opOver(1.0,0.7);
		$('#line_list li').opOver(1.0,0.7);
		$('#photo_in ul li').opOver(1.0,0.7);
		$('#sall_list ul li').opOver(1.0,0.7);
		$('#bnr_list a').opOver(1.0,0.7);
		$('a img').opOver(1.0,0.7);
		$('#f_list01 a').opOver(1.0,0.8);
        //$('a').opOver(1.0,0.7);
});

$(document).ready(function() {

    $(".sub_nn li").addClass("sub_li01");
    $(".sub_nn li a").addClass("in01");
    $(".b_list002 li:nth-child(3n)").addClass("none");
	$("nav#f_list01 ul li:nth-child(3n)").addClass("none");
    $(".b_list005 li:nth-child(3n)").addClass("none");
    $(".b_list004 li:nth-child(2n)").addClass("none");
    $(".b_list003 li:nth-child(3n)").addClass("none");
    $(".c_box_r ul li:nth-child(3n)").addClass("none");	
		$(".nn_list li:nth-child(4n)").addClass("none");
		$(".s_box ul li:nth-child(3n)").addClass("none");
		//$("#pro_list01 aside:nth-child(5n)").addClass("last");
		$(".d_load div:nth-child(2n)").addClass("last");
});




// copyright Year =========================================================================

function ShowNowYear() {
   var now = new Date();
   var year = now.getFullYear();
   document.write(year);
}






//auto  addClass =========================================================================

$(document).ready(function(){
 $("table tr:nth-child(even)").addClass("even");
});

$(function() {
    $("table tr").each(function() {
        $("table tr:last-child").addClass("last");
    });
});

$(function() {
    $("ul li").each(function() {
        $("ul li:first-child").addClass("first");
    });
});


$(function(){
    $("li:nth-child(even)").addClass("even");
});


$(function() {
    $("ul li").each(function() {
        $("ul li:last-child").addClass("last");
    });
});



$(function() {
    $("ol li").each(function() {
        $("ol li:last-child").addClass("last");
    });
});

$(function() {
    $("#contents section").each(function() {
        $("#contents section:last-child").addClass("last");
    });
});

$(function() {
    $(".breadChumbs ul").each(function() {
    $("li:last-child").addClass('last');
    });
});



// _blank link class blank =========================================================================

$(document).ready(function(){
        $(".blank").click(function(){
        window.open(this.href,'_blank');
        return false;
        });
});




// jquery.rwdImageMaps =========================================================================

//$(document).ready(function(e) {
//    $('img[usemap]').rwdImageMaps();
//});




// addClass =========================================================================


$(document).ready(function(){
 $("table tr:nth-child(even)").addClass("even");
});

$(function() {
    $("table tr").each(function() {
        $("table tr:last-child").addClass("last");
    });
});

$(function() {
    $("ul li").each(function() {
        $("ul li:first-child").addClass("first");
    });
});

$(function(){
     $("li:nth-child(even)").addClass("even");
});

$(function() {
    $("ul li").each(function() {
        $("ul li:last-child").addClass("last");
    });
});

$(function() {
    $("#contents section").each(function() {
        $("#contents section:last-child").addClass("last");
    });
});


$(function() {
    $(".breadChumbs ul").each(function() {
    $("li:last-child").addClass('last');
    });
});

$(function() {
    $(".gnavlist li").each(function() {
    $("li:last-child").addClass('last');
    });
});

// gNav.js =========================================================================

$(function(){
$("#glo_nav li").hover(
    function () {
        $(this).addClass("current");
    },
    function () {
        $(this).removeClass("current");
    }
);

});


$(function(){
    $('.t_box_li:nth-child(1) h4 a').each(function(){
        $(this).addClass("heightLine-group3");
    });
    $('.t_box_li:nth-child(2) h4 a').each(function(){
        $(this).addClass("heightLine-group3");
    });
    $('.t_box_li:nth-child(3) h4 a').each(function(){
        $(this).addClass("heightLine-group3");
    });
    $('.t_box_li:nth-child(4) h4 a').each(function(){
        $(this).addClass("heightLine-group3");
    });
    $('.t_box_li:nth-child(5) h4 a').each(function(){
        $(this).addClass("heightLine-group4");
    });
    $('.t_box_li:nth-child(6) h4 a').each(function(){
        $(this).addClass("heightLine-group4");
    });
    $('.t_box_li:nth-child(7) h4 a').each(function(){
        $(this).addClass("heightLine-group4");
    });
    $('.t_box_li:nth-child(8) h4 a').each(function(){
        $(this).addClass("heightLine-group4");
    });

});




/*$(function() {
    var topBtn = $('#page-top');
    topBtn.hide();
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    //スクロールしてトップ
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});*/







// lMenu navi hi-lite =========================================================================



// uniq =========================================================================



$(document).ready(function(){
$("#glo_list li.g01").hover(
  function () {
    $(this).children(".mega").fadeIn(500);
        $(this).children(".mega").css({zIndex:999});
        $(this).children("span.g01_in,a.g01_in").addClass('active');

  },
  function () {
   $(this).children(".mega").hide();
     $(this).children(".mega").css({zIndex:90});
     $(this).children("span.g01_in,a.g01_in").removeClass('active');
  }
);

});



$(window).load(function () {
    var url = window.location.pathname;
    $('#sub_nav01 li a[href="'+url+'"]').parents('li').addClass('active');
    $('#glo_list li a[href="'+url+'"]').addClass('active');
     if(location.pathname != "/") {
            var $path = location.href.split('/');
            var $endPath = $path.slice($path.length-2,$path.length-1);
            $('#sub_nav01 li a[href$="'+$endPath+'/"]').addClass('current');
        }


});



//----------------------------------

// $(function(){
//   // #で始まるアンカーをクリックした場合に処理
//   $('a[href^=#]').click(function() {
//      // スクロールの速度
//      var speed = 1000; // ミリ秒
//      // アンカーの値取得
//      var href= $(this).attr("href");
//      // 移動先を取得
//      var target = $(href == "#" || href == "" ? 'html' : href);
//      // 移動先を数値で取得
//      var position = target.offset().top;
//      // スムーススクロール
//      $('body,html').animate({scrollTop:position}, speed, 'easeInOutExpo');
//      return false;
//   });
//});


//uniq
jQuery(function($){
	var e = document.createElement("div");
	var s = document.createTextNode("S");
	e.appendChild(s);
	e.style.visibility="hidden"
	e.style.position="absolute"
	e.style.top="0";
	document.body.appendChild(e);
	var defHeight = e.offsetHeight;
	checkBoxSize = function(){
		if(defHeight != e.offsetHeight){
		$('#acc_in li.acc_list').autoHeight({column:3, clear:1,reset:'reset'});
		
		
		
	
			defHeight= e.offsetHeight;
		}
	}
	
	$('#acc_in li.acc_list').autoHeight({height:'height',column:3, clear:1,reset:'reset'});
	
	

	
	
	setInterval(checkBoxSize,1000)
});


//uniq


//faq

$(function(){
	$(".f_box").find(".a_box").css(
	'display','none'
	);
        $(".f_box").find(".f_md").on("click", function() {
            $(this).next(".a_box").slideToggle();
			$(this).find(".fa_y").toggleClass("active");
			$(this).toggleClass("on");
        });
    });
		
		$(window).on('load resize', function(){
var h001 = $('header').height();
$('#sp_menu').css({
	'top':h001})
});
$(function(){
$('#menu').on('click', function(){
	$('#sp_menu').slideToggle();
	$("#panel-btn-icon").toggleClass("close");
	});
	});
	$(function(){
$('.c_001 span').on('click', function(){
	$(this).next('ul').slideToggle();
	$(this).toggleClass('c002');
	});
	});
		
		







