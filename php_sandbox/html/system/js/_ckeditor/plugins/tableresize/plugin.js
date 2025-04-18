﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function ()
{
    var a = CKEDITOR.tools.cssLength, b = CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks || CKEDITOR.env.version < 7);
    function c(k)
    {
        return CKEDITOR.env.ie ? k.$.clientWidth : parseInt(k.getComputedStyle('width'), 10);
    };
    function d(k, l)
    {
        var m = k.getComputedStyle('border-' + l + '-width'), n = {
            thin : '0px', medium : '1px', thick : '2px'
        };
        if (m.indexOf('px') < 0)
        {
            if (m in n && k.getComputedStyle('border-style') != 'none') {
                m = n[m];
            }
            else {
                m = 0;
            }
            return parseInt(m, 10);;
        }
    };
    function e(k)
    {
        var l = k.$.rows, m = 0, n, o, p;
        for (var q = 0, r = l.length; q < r; q++) {
            p = l[q];
            n = p.cells.length;
            if (n > m) {
                m = n;
                o = p;
            }
        }
        return o;
    };
    function f(k)
    {
        var l = [], m =- 1, n = k.getComputedStyle('direction') == 'rtl', o = e(k), p = new CKEDITOR.dom.element(k.$.tBodies[0]), 
        q = p.getDocumentPosition();
        for (var r = 0, s = o.cells.length; r < s; r++)
        {
            var t = new CKEDITOR.dom.element(o.cells[r]), u = o.cells[r + 1] && new CKEDITOR.dom.element(o.cells[r + 1]);
            m += t.$.colSpan || 1;
            var v, w, x, y = t.getDocumentPosition().x;
            n ? w = y + d(t, 'left') : v = y + t.$.offsetWidth - d(t, 'right');
            if (u) {
                y = u.getDocumentPosition().x;
                n ? v = y + u.$.offsetWidth - d(u, 'right') : w = y + d(u, 'left');
            }
            else {
                y = k.getDocumentPosition().x;
                n ? v = y : w = y + k.$.offsetWidth;
            }
            x = Math.max(w - v, 3);
            l.push({
                table : k, index : m, x : v, y : q.y, width : x, height : p.$.offsetHeight, rtl : n
            });
        }
        return l;
    };
    function g(k, l)
    {
        for (var m = 0, n = k.length; m < n; m++) {
            var o = k[m];
            if (l >= o.x && l <= o.x + o.width) {
                return o;
            }
        }
        return null;
    };
    function h(k)
    {
        (k.data || k).preventDefault();
    };
    function i(k)
    {
        var l, m, n, o, p, q, r, s, t, u;
        function v()
        {
            l = null;
            q = 0;
            o = 0;
            m.removeListener('mouseup', A);
            n.removeListener('mousedown', z);
            n.removeListener('mousemove', B);
            m.getBody().setStyle('cursor', 'auto');
            b ? n.remove() : n.hide();
        };
        function w()
        {
            var D = l.index, E = CKEDITOR.tools.buildTableMap(l.table), F = [], G = [], H = Number.MAX_VALUE, 
            I = H, J = l.rtl;
            for (var K = 0, L = E.length; K < L; K++)
            {
                var M = E[K], N = M[D + (J ? 1 : 0)], O = M[D + (J ? 0 : 1)];
                N = N && new CKEDITOR.dom.element(N);
                O = O && new CKEDITOR.dom.element(O);
                if (!N || !O || !N.equals(O)) {
                    N && (H = Math.min(H, c(N)));
                    O && (I = Math.min(I, c(O)));
                    F.push(N);
                    G.push(O);
                }
            }
            r = F;
            s = G;
            t = l.x - H;
            u = l.x + I;
            n.setOpacity(0.5);
            p = parseInt(n.getStyle('left'), 10);
            q = 0;
            o = 1;
            n.on('mousemove', B);
            m.on('dragstart', h);
        };
        function x()
        {
            o = 0;
            n.setOpacity(0);
            q && y();
            var D = l.table;
            setTimeout(function ()
            {
                D.removeCustomData('_cke_table_pillars');
            }, 0);
            m.removeListener('dragstart', h);
        };
        function y()
        {
            var D = l.rtl, E = D ? s.length : r.length;
            for (var F = 0; F < E; F++)
            {
                var G = r[F], H = s[F], I = l.table;
                CKEDITOR.tools.setTimeout(function (J, K, L, M, N, O)
                {
                    J && J.setStyle('width', a(Math.max(K + O, 0)));
                    L && L.setStyle('width', a(Math.max(M - O, 0)));
                    if (N) {
                        I.setStyle('width', a(N + O * (D ?- 1 : 1)));
                    }
                },
                0, this, [G, G && c(G), H, H && c(H), (!G || !H) && c(I) + d(I, 'left') + d(I, 'right'), 
                q]);
            }
        };
        function z(D)
        {
            h(D);
            w();
            m.on('mouseup', A, this);
        };
        function A(D)
        {
            D.removeListener();
            x();
        };
        function B(D)
        {
            C(D.data.$.clientX);
        };
        m = k.document;
        n = CKEDITOR.dom.element.createFromHtml('<div data-cke-temp=1 contenteditable=false unselectable=on style="position:absolute;cursor:col-resize;filter:alpha(opacity=0);opacity:0;padding:0;background-color:#004;background-image:none;border:0px none;z-index:10"></div>', 
        m);
        if (!b) {
            m.getDocumentElement().append(n);
        }
        this.attachTo = function (D)
        {
            if (o) {
                return;
            }
            if (b) {
                m.getBody().append(n);
                q = 0;
            }
            l = D;
            n.setStyles({
                width : a(D.width), height : a(D.height), left : a(D.x), top : a(D.y)
            });
            b && n.setOpacity(0.25);
            n.on('mousedown', z, this);
            m.getBody().setStyle('cursor', 'col-resize');
            n.show();
        };
        var C = this.move = function (D)
        {
            if (!l) {
                return 0;
            }
            if (!o && (D < l.x || D > l.x + l.width)) {
                v();
                return 0;
            }
            var E = D - Math.round(n.$.offsetWidth / 2);
            if (o) {
                if (E == t || E == u) {
                    return 1;
                }
                E = Math.max(E, t);
                E = Math.min(E, u);
                q = E - p;
            }
            n.setStyle('left', a(E));
            return 1;
        };
    };
    function j(k)
    {
        var l = k.data.getTarget();
        if (k.name == 'mouseout')
        {
            if (!l.is('table')) {
                return;
            }
            var m = new CKEDITOR.dom.element(k.data.$.relatedTarget || k.data.$.toElement);
            while (m && m.$ && !m.equals(l) && !m.is('body')) {
                m = m.getParent();
            }
            if (!m || m.equals(l)) {
                return;
            }
        }
        l.getAscendant('table', 1).removeCustomData('_cke_table_pillars');
        k.removeListener();
    };
    CKEDITOR.plugins.add('tableresize', 
    {
        requires : ['tabletools'],
        init : function (k)
        {
            k.on('contentDom', function ()
            {
                var l;
                k.document.getBody().on('mousemove', function (m)
                {
                    m = m.data;
                    if (l && l.move(m.$.clientX)) {
                        h(m);
                        return;
                    }
                    var n = m.getTarget(), o, p;
                    if (!n.is('table') && !n.getAscendant('tbody', 1)) {
                        return;
                    }
                    o = n.getAscendant('table', 1);
                    if (!(p = o.getCustomData('_cke_table_pillars')))
                    {
                        o.setCustomData('_cke_table_pillars', p = f(o));
                        o.on('mouseout', j);
                        o.on('mousedown', j);
                    }
                    var q = g(p, m.$.clientX);
                    if (q) {
                        !l && (l = new i(k));
                        l.attachTo(q);
                    }
                });
            });
        }
    });
})();
