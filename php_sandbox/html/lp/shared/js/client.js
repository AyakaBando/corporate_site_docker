/* =====================================================================
*
*    client.js
*
* =================================================================== */
gdc = function()
{
	var ua = navigator.userAgent;
	var isWin = (navigator.appVersion.indexOf("Win", 0) != -1);
	var isMac = (ua.indexOf("Mac",0) != -1);
	var isOSX = (ua.indexOf("Mac OS X",0) != -1);
	var isOS9 = (isMac && ! isOSX) ? true : false;
	var isWii = (ua.indexOf("Nintendo Wii", 0) != -1);
	var isDSi = (ua.indexOf("Nintendo DSi", 0) != -1);
	var is3DS = (ua.indexOf("Nintendo 3DS", 0) != -1);
	var isGecko = (ua.indexOf('Gecko/', 0) != -1);
	var isMSIE = (ua.indexOf("MSIE", 0) != -1);//ua.match(/MSIE (\d\.\d+)/)
	var isMSIE6 = (ua.indexOf("MSIE 6.", 0) != -1);
	var isMSIE8 = (ua.indexOf("MSIE 8.", 0) != -1);//(ua.match(/Trident\/4\.0/) && isMSIE) ? true : false
	var isNN = (navigator.appName.indexOf("Netscape",0) != -1);
	var isMozilla = (ua.indexOf("Mozilla", 0) != -1);
	var isOpera = (window.opera) ? true : false;//(ua.indexOf("Opera", 0) != -1);
	var isChrome = (ua.match(/Chrome\/([\.\d]+)/)) ? true : false;
	var isSafari = (ua.match(/Safari\/([\.\d]+)/) && ! isChrome) ? true : false;
	//var isLunascape = MSIE
	var isCompatMode = (document.compatMode == "CSS1Compat");
	var isEventListener = (window.addEventListener) ? true : false;

	var browserVersion = {major:0, minor:0, build:0,revision:0};
	var geckoVersion = {major:0, minor:0, build:0,revision:0};
	var isSmartPhone = function()
	{
		return (ua.indexOf('Android') != -1 || ua.indexOf('iPhone') != -1 || ua.indexOf('iPad') != -1 || ua.indexOf('BlackBerry') != -1) ? true : false;
	}
	var setBrowserVersion = function()
	{
		var ua_lower = ua.toLowerCase(), v, gv;
		if(isMSIE)
		{
			v = ua_lower.match(/(msie)[ ]([\d.]+)/)[2].split('.');
		}else if(isChrome)
		{
			v = (ua_lower.match(/(chrome)[\/: ]([\d.]+)/) || [0,'0'])[2].split('.');
		}else if(isSafari)
		{
			v = (ua_lower.match(/(version)[\/: ]([\d.]+)/) || [0,'0'])[2].split('.');
		}else
		{
			v = (ua_lower.match(/(netscape|netscape6|firefox|opera)[\/: ]([\d.]+)/) || [0,'0'])[2].split('.');
		}
		browserVersion.major = v[0] || 0;
		browserVersion.minor = v[1] || 0;
		browserVersion.build = v[2] || 0;
		browserVersion.revision = v[3] || 0;

		if(isGecko)
		{
			gv = (ua_lower.match(/(rv)[\/: ]([\d.]+)/) || [0,'0'])[2].split('.');
			geckoVersion.major = gv[0] || 0;
			geckoVersion.minor = gv[1] || 0;
			geckoVersion.build = gv[2] || 0;
			geckoVersion.revision = gv[3] || 0;
		}
	}();

	return{
		isWin: isWin,
		isMac: isMac,
		isOSX: isOSX,
		isOS9: isOS9,
		isWii: isWii,
		isDSi: isDSi,
		is3DS: is3DS,
		isGecko: isGecko,
		isMSIE: isMSIE,
		isMSIE6: isMSIE6,
		isMSIE8: isMSIE8,
		isNN: isNN,
		isMozilla: isMozilla,
		isOpera: isOpera,
		isChrome: isChrome,
		isSafari: isSafari,
		isSmartPhone: isSmartPhone(),
		isCompatMode: isCompatMode,
		isEventListener: isEventListener,
		getBrowserVersion : function()
		{
			return browserVersion;
		},
		getGeckoVersion : function()
		{
			return geckoVersion;
		},
		getInnerHeight: function()
		{
			return (isMSIE) ? (isCompatMode) ? document.documentElement.clientHeight : document.body.clientHeight : window.innerHeight;
		},
		getInnerWidth: function()
		{
			return (isMSIE) ? (isCompatMode) ? document.documentElement.clientWidth : document.body.clientWidth : window.innerWidth;
		},
		getScreenSize: function()
		{
			var s = {};
			if(screen.availWidth)
			{
				s.width = screen.availWidth;
				s.height = screen.availHeight;
			}else
			{
				s.width = screen.width;
				s.height = screen.height;
			}
			return s;
		},
		getOffsetTop: function(elementName)
		{
			return document.getElementById(elementName).offsetTop;
		}
	};
}();





