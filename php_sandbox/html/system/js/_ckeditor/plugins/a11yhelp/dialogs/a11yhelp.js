﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.dialog.add('a11yHelp', function (a)
{
    var b = a.lang.accessibilityHelp, c = CKEDITOR.tools.getNextId(), d = 
    {
        8 : 'BACKSPACE', 9 : 'TAB', 13 : 'ENTER', 16 : 'SHIFT', 17 : 'CTRL', 18 : 'ALT', 19 : 'PAUSE', 
        20 : 'CAPSLOCK', 27 : 'ESCAPE', 33 : 'PAGE UP', 34 : 'PAGE DOWN', 35 : 'END', 36 : 'HOME', 37 : 'LEFT ARROW', 
        38 : 'UP ARROW', 39 : 'RIGHT ARROW', 40 : 'DOWN ARROW', 45 : 'INSERT', 46 : 'DELETE', 91 : 'LEFT WINDOW KEY', 
        92 : 'RIGHT WINDOW KEY', 93 : 'SELECT KEY', 96 : 'NUMPAD  0', 97 : 'NUMPAD  1', 98 : 'NUMPAD  2', 
        99 : 'NUMPAD  3', 100 : 'NUMPAD  4', 101 : 'NUMPAD  5', 102 : 'NUMPAD  6', 103 : 'NUMPAD  7', 
        104 : 'NUMPAD  8', 105 : 'NUMPAD  9', 106 : 'MULTIPLY', 107 : 'ADD', 109 : 'SUBTRACT', 110 : 'DECIMAL POINT', 
        111 : 'DIVIDE', 112 : 'F1', 113 : 'F2', 114 : 'F3', 115 : 'F4', 116 : 'F5', 117 : 'F6', 118 : 'F7', 
        119 : 'F8', 120 : 'F9', 121 : 'F10', 122 : 'F11', 123 : 'F12', 144 : 'NUM LOCK', 145 : 'SCROLL LOCK', 
        186 : 'SEMI-COLON', 187 : 'EQUAL SIGN', 188 : 'COMMA', 189 : 'DASH', 190 : 'PERIOD', 191 : 'FORWARD SLASH', 
        192 : 'GRAVE ACCENT', 219 : 'OPEN BRACKET', 220 : 'BACK SLASH', 221 : 'CLOSE BRAKET', 222 : 'SINGLE QUOTE'
    };
    d[CKEDITOR.ALT] = 'ALT';
    d[CKEDITOR.SHIFT] = 'SHIFT';
    d[CKEDITOR.CTRL] = 'CTRL';
    var e = [CKEDITOR.ALT, CKEDITOR.SHIFT, CKEDITOR.CTRL];
    function f(j)
    {
        var k, l, m = [];
        for (var n = 0; n < e.length; n++) {
            l = e[n];
            k = j / e[n];
            if (k > 1 && k <= 2) {
                j -= l;
                m.push(d[l]);
            }
        }
        m.push(d[j] || String.fromCharCode(j));
        return m.join('+');
    };
    var g = /\$\{(.*?)\}/g;
    function h(j, k)
    {
        var l = a.config.keystrokes, m, n = l.length;
        for (var o = 0; o < n; o++) {
            m = l[o];
            if (m[1] == k) {
                break;
            }
        }
        return f(m[0]);
    };
    function i()
    {
        var j = '<div class="cke_accessibility_legend" role="document" aria-labelledby="' + c + '_arialbl" tabIndex="-1">%1</div>' + '<span id="' + c + '_arialbl" class="cke_voice_label">' + b.contents + ' </span>', 
        k = '<h1>%1</h1><dl>%2</dl>', l = '<dt>%1</dt><dd>%2</dd>', m = [], n = b.legend, o = n.length;
        for (var p = 0; p < o; p++)
        {
            var q = n[p], r = [], s = q.items, t = s.length;
            for (var u = 0; u < t; u++)
            {
                var v = s[u], w;
                w = l.replace('%1', v.name).replace('%2', v.legend.replace(g, h));
                r.push(w);
            }
            m.push(k.replace('%1', q.name).replace('%2', r.join('')));
        }
        return j.replace('%1', m.join(''));
    };
    return {
        title : b.title, minWidth : 600, minHeight : 400, contents : [
        {
            id : 'info', label : a.lang.common.generalTab, expand : true, elements : [
            {
                type : 'html', id : 'legends', style : 'white-space:normal;', focus : function () {},
                html : i() + '<style type="text/css">' + '.cke_accessibility_legend' + '{' + 'width:600px;' + 'height:400px;' + 'padding-right:5px;' + 'overflow-y:auto;' + 'overflow-x:hidden;' + '}' + '.cke_browser_quirks .cke_accessibility_legend,' + '.cke_browser_ie6 .cke_accessibility_legend' + '{' + 'height:390px' + '}' + '.cke_accessibility_legend *' + '{' + 'white-space:normal;' + '}' + '.cke_accessibility_legend h1' + '{' + 'font-size: 20px;' + 'border-bottom: 1px solid #AAA;' + 'margin: 5px 0px 15px;' + '}' + '.cke_accessibility_legend dl' + '{' + 'margin-left: 5px;' + '}' + '.cke_accessibility_legend dt' + '{' + 'font-size: 13px;' + 'font-weight: bold;' + '}' + '.cke_accessibility_legend dd' + '{' + 'margin:10px' + '}' + '</style>'
            }]
        }], buttons : [CKEDITOR.dialog.cancelButton]
    };
});
