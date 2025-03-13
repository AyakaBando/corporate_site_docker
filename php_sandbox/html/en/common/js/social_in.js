$(function() {
$("#socialbuttons .twitter").socialbutton("twitter", {
button : "horizontal",
text : "",
url : "対象URL",
}).width(95);

$("#socialbuttons .facebook").socialbutton("facebook_like", {
button : "button_count",
url : "対象URL",
}).width(110);

$("#socialbuttons .google").socialbutton("google_plusone", {
button : "medium",
url : "対象URL",
count : true,
}).width(70);

$("#socialbuttons .hatena").socialbutton("hatena", {
button : "standard",
url : "対象URL",
title : "ページのタイトル",
}).width(70);
});