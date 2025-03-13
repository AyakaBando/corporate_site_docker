// JavaScript Document

$(function(){
function mapInit() {
document.getElementById("mapField01").style.width = "100%";
	document.getElementById("mapField01").style.height = "400px";

		var centerPosition = new google.maps.LatLng(34.9950713, 135.7775314);
		var option = {
		    zoom : 16,
		    center : centerPosition,
		    mapTypeId : google.maps.MapTypeId.ROADMAP,
    scrollwheel: false
		};
		//地図本体描画
		var googlemap = new google.maps.Map(document.getElementById("mapField01"), option);

		//マーカー生成
		var markerOption = {
		    position : centerPosition,
		    map : googlemap,
		    title : "京都 柴崎"
		};
		//マーカー追加
		var marker = new google.maps.Marker(markerOption)

		//情報ウインドウ追加
		var infoWindowOption = {
		    position : centerPosition,
		    content : "京都 柴崎"
		};
		
		/*var infoWindow = new google.maps.InfoWindow(infoWindowOption);
		infoWindow.open(googlemap);*/

	    }


	    mapInit();
});



