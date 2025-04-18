﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function ()
{
    function a(c, d, e)
    {
        var f = c.join(' ');
        f = f.replace(/(,|>|\+|~)/g, ' ');
        f = f.replace(/\[[^\]]*/g, '');
        f = f.replace(/#[^\s]*/g, '');
        f = f.replace(/\:{1,2}[^\s]*/g, '');
        f = f.replace(/\s+/g, ' ');
        var g = f.split(' '), h = [];
        for (var i = 0; i < g.length; i++) {
            var j = g[i];
            if (e.test(j) && !d.test(j)) {
                if (CKEDITOR.tools.indexOf(h, j) ==- 1) {
                    h.push(j);
                };
            }
        }
        return h;
    };
    function b(c, d, e)
    {
        var f = [], g = [], h;
        for (h = 0; h < c.styleSheets.length; h++)
        {
            var i = c.styleSheets[h], j = i.ownerNode || i.owningElement;
            if (j.getAttribute('data-cke-temp')) {
                continue;
            }
            if (i.href && i.href.substr(0, 9) == 'chrome://') {
                continue;
            }
            var k = i.cssRules || i.rules;
            for (var l = 0; l < k.length; l++) {
                g.push(k[l].selectorText);
            }
        }
        var m = a(g, d, e);
        for (h = 0; h < m.length; h++)
        {
            var n = m[h].split('.'), o = n[0].toLowerCase(), p = n[1];
            f.push({
                name : o + '.' + p, element : o, attributes : {
                    'class' : p
                }
            });
        }
        return f;
    };
    CKEDITOR.plugins.add('stylesheetparser', 
    {
        requires : ['styles'],
        onLoad : function ()
        {
            var c = CKEDITOR.editor.prototype;
            c.getStylesSet = CKEDITOR.tools.override(c.getStylesSet, function (d)
            {
                return function (e)
                {
                    var f = this;
                    d.call(this, function (g)
                    {
                        var h = f.config.stylesheetParser_skipSelectors ||/(^body\.|^\.)/i, i = f.config.stylesheetParser_validSelectors ||/\w+\.\w+/;
                        e(f._.stylesDefinitions = g.concat(b(f.document.$, h, i)));
                    });
                };
            });
        }
    });
})();
