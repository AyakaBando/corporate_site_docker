﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function ()
{
    var a = CKEDITOR.htmlParser.fragment.prototype, b = CKEDITOR.htmlParser.element.prototype;
    a.onlyChild = b.onlyChild = function ()
    {
        var u = this.children, v = u.length, w = v == 1 && u[0];
        return w || null;
    };
    b.removeAnyChildWithName = function (u)
    {
        var v = this.children, w = [], x;
        for (var y = 0; y < v.length; y++)
        {
            x = v[y];
            if (!x.name) {
                continue;
            }
            if (x.name == u) {
                w.push(x);
                v.splice(y--, 1);
            }
            w = w.concat(x.removeAnyChildWithName(u));
        }
        return w;
    };
    b.getAncestor = function (u)
    {
        var v = this.parent;
        while (v && !(v.name && v.name.match(u))) {
            v = v.parent;
        }
        return v;
    };
    a.firstChild = b.firstChild = function (u)
    {
        var v;
        for (var w = 0; w < this.children.length; w++)
        {
            v = this.children[w];
            if (u(v)) {
                return v;
            }
            else if (v.name) {
                v = v.firstChild(u);
                if (v) {
                    return v;
                }
            }
        }
        return null;
    };
    b.addStyle = function (u, v, w)
    {
        var A = this;
        var x, y = '';
        if (typeof v == 'string') {
            y += u + ':' + v + ';';
        }
        else
        {
            if (typeof u == 'object') {
                for (var z in u) {
                    if (u.hasOwnProperty(z)) {
                        y += z + ':' + u[z] + ';';
                    }
                }
            }
            else {
                y += u;
            }
            w = v;
        }
        if (!A.attributes) {
            A.attributes = {};
        }
        x = A.attributes.style || '';
        x = (w ? [y, x] : [x, y]).join(';');
        A.attributes.style = x.replace(/^;|;(?=;)/, '');
    };
    CKEDITOR.dtd.parentOf = function (u)
    {
        var v = {};
        for (var w in this) {
            if (w.indexOf('$') ==- 1 && this [w][u]) {
                v[w] = 1;
            }
        }
        return v;
    };
    function c(u)
    {
        var v = u.children, w, x, y = u.children.length, z, A, B = /list-style-type:(.*?)(?:;|$)/, C = CKEDITOR.plugins.pastefromword.filters.stylesFilter;
        x = u.attributes;
        if (B.exec(x.style)) {
            return;
        }
        for (var D = 0; D < y; D++)
        {
            w = v[D];
            if (w.attributes.value && Number(w.attributes.value) == D + 1) {
                delete w.attributes.value;
            }
            z = B.exec(w.attributes.style);
            if (z) if (z[1] == A || !A) A = z[1];
            else {
                A = null;
                break;
            }
        }
        if (A)
        {
            for (D = 0; D < y; D++) {
                x = v[D].attributes;
                x.style && (x.style = C([['list-style-type']])(x.style) || '');
            }
            u.addStyle('list-style-type', A);
        }
    };
    var d = /^([.\d]*)+(em|ex|px|gd|rem|vw|vh|vm|ch|mm|cm|in|pt|pc|deg|rad|ms|s|hz|khz){1}?/i, e = /^(?:\b0[^\s]*\s*){1,4}$/, 
    f = '^m{0,4}(cm|cd|d?c{0,3})(xc|xl|l?x{0,3})(ix|iv|v?i{0,3})$', g = new RegExp(f), h = new RegExp(f.toUpperCase()), 
    i = 
    {
        decimal : /\d+/, 'lower-roman' : g, 'upper-roman' : h, 'lower-alpha' : /^[a-z]+$/, 'upper-alpha' : /^[A-Z]+$/
    },
    j = {
        disc : /[l\u00B7\u2002]/, circle : /[\u006F\u00D8]/, square : /[\u006E\u25C6]/
    },
    k = {
        ol : i, ul : j
    },
    l = [[1000, 'M'], [900, 'CM'], [500, 'D'], [400, 'CD'], [100, 'C'], [90, 'XC'], [50, 'L'], [40, 'XL'], 
    [10, 'X'], [9, 'IX'], [5, 'V'], [4, 'IV'], [1, 'I']], m = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    function n(u)
    {
        u = u.toUpperCase();
        var v = l.length, w = 0;
        for (var x = 0; x < v; ++x) {
            for (var y = l[x], z = y[1].length; u.substr(0, z) == y[1]; u = u.substr(z)) {
                w += y[0];
            }
        }
        return w;
    };
    function o(u)
    {
        u = u.toUpperCase();
        var v = m.length, w = 1;
        for (var x = 1; u.length > 0; x *= v) {
            w += m.indexOf(u.charAt(u.length - 1)) * x;
            u = u.substr(0, u.length - 1);
        }
        return w;
    };
    var p = 0, q = null, r, s = CKEDITOR.plugins.pastefromword = 
    {
        utils : 
        {
            createListBulletMarker : function (u, v)
            {
                var w = new CKEDITOR.htmlParser.element('cke:listbullet');
                w.attributes = {
                    'cke:listsymbol' : u[0]
                };
                w.add(new CKEDITOR.htmlParser.text(v));
                return w;
            },
            isListBulletIndicator : function (u)
            {
                var v = u.attributes && u.attributes.style;
                if (/mso-list\s*:\s*Ignore/i.test(v)) {
                    return true;
                }
            },
            isContainingOnlySpaces : function (u)
            {
                var v;
                return (v = u.onlyChild()) &&/^(:?\s|&nbsp;)+$/.test(v.value);
            },
            resolveList : function (u)
            {
                var v = u.attributes, w;
                if ((w = u.removeAnyChildWithName('cke:listbullet')) && w.length && (w = w[0]))
                {
                    u.name = 'cke:li';
                    if (v.style)
                    {
                        v.style = s.filters.stylesFilter([['text-indent'], ['line-height'], [/^margin(:?-left)?$/, 
                        null, function (x) 
                        {
                            var y = x.split(' ');
                            x = CKEDITOR.tools.convertToPx(y[3] || y[1] || y[0]);
                            if (!p && q !== null && x > q) {
                                p = x - q;
                            }
                            q = x;
                            v['cke:indent'] = p && Math.ceil(x  / p) + 1 || 1;
                        }], [/^mso-list$/, null, function (x) 
                        {
                            x = x.split(' ');
                            var y = Number(x[0].match(/\d+/)), z = Number(x[1].match(/\d+/));
                            if (z == 1) {
                                y !== r && (v['cke:reset'] = 1);
                                r = y;
                            }
                            v['cke:indent'] = z;
                        }]])(v.style, u) || '';
                    }
                    if (!v['cke:indent']) {
                        q = 0;
                        v['cke:indent'] = 1;
                    }
                    CKEDITOR.tools.extend(v, w.attributes);
                    return true;
                }
                else {
                    r = q = p = null;
                }
                return false;
            },
            getStyleComponents : (function ()
            {
                var u = CKEDITOR.dom.element.createFromHtml('<div style="position:absolute;left:-9999px;top:-9999px;"></div>', 
                CKEDITOR.document);
                CKEDITOR.document.getBody().append(u);
                return function (v, w, x)
                {
                    u.setStyle(v, w);
                    var y = {}, z = x.length;
                    for (var A = 0; A < z; A++) {
                        y[x[A]] = u.getStyle(x[A]);
                    }
                    return y;
                };
            })(), listDtdParents : CKEDITOR.dtd.parentOf('ol')
        },
        filters : 
        {
            flattenList : function (u, v)
            {
                v = typeof v == 'number' ? v : 1;
                var w = u.attributes, x;
                switch (w.type) {
                    case 'a':
                        x = 'lower-alpha';
                        break;
                    case '1':
                        x = 'decimal';
                        break;
                }
                var y = u.children, z;
                for (var A = 0; A < y.length; A++)
                {
                    z = y[A];
                    if (z.name in CKEDITOR.dtd.$listItem)
                    {
                        var B = z.attributes, C = z.children, D = C.length, E = C[D - 1];
                        if (E.name in CKEDITOR.dtd.$list) {
                            u.add(E, A + 1);
                            if (!--C.length) {
                                y.splice(A--, 1);
                            }
                        }
                        z.name = 'cke:li';
                        w.start && !A && (B.value = w.start);
                        s.filters.stylesFilter([['tab-stops', null, function (H)
                        {
                            var I = H.split(' ')[1].match(d);
                            I && (q = CKEDITOR.tools.convertToPx(I[0]));
                        }], v == 1 ? ['mso-list', null, function (H)
                        {
                            H = H.split(' ');
                            var I = Number(H[0].match(/\d+/));
                            I !== r && (B['cke:reset'] = 1);
                            r = I;
                        }] : null])(B.style);
                        B['cke:indent'] = v;
                        B['cke:listtype'] = u.name;
                        B['cke:list-style-type'] = x;
                    }
                    else if (z.name in CKEDITOR.dtd.$list)
                    {
                        arguments.callee.apply(this, [z, v + 1]);
                        y = y.slice(0, A).concat(z.children).concat(y.slice(A + 1));
                        u.children = [];
                        for (var F = 0, G = y.length; F < G; F++) {
                            u.add(y[F]);
                        }
                    }
                }
                delete u.name;
                w['cke:list'] = 1;
            },
            assembleList : function (u)
            {
                var v = u.children, w, x, y, z, A, B, C, D = [], E, F, G, H, I, J;
                for (var K = 0; K < v.length; K++)
                {
                    w = v[K];
                    if ('cke:li' == w.name)
                    {
                        w.name = 'li';
                        x = w;
                        y = x.attributes;
                        G = y['cke:listsymbol'];
                        G = G && G.match(/^(?:[(]?)([^\s]+?)([.)]?)$/);
                        H = I = J = null;
                        if (y['cke:ignored']) {
                            v.splice(K--, 1);
                            continue;
                        }
                        y['cke:reset'] && (C = A = B = null);
                        z = Number(y['cke:indent']);
                        if (z != A) {
                            F = E = null;
                        }
                        if (!G) {
                            H = y['cke:listtype'] || 'ol';
                            I = y['cke:list-style-type'];
                        }
                        else
                        {
                            if (F && k[F][E].test(G[1])) {
                                H = F;
                                I = E;
                            }
                            else
                            {
                                for (var L in k)
                                {
                                    for (var M in k[L]) 
                                    {
                                        if (k[L][M].test(G[1])) if (L == 'ol' &&/alpha|roman/.test(M)) {
                                            var N = /roman/.test(M) ? n(G[1]) : o(G[1]);
                                            if (!J || N < J) {
                                                J = N;
                                                H = L;
                                                I = M;
                                            }
                                        }
                                        else {
                                            H = L;
                                            I = M;
                                            break;
                                        }
                                    }
                                    !H && (H = G[2] ? 'ol' : 'ul');
                                }
                            }
                        }
                        F = H;
                        E = I || (H == 'ol' ? 'decimal' : 'disc');
                        if (I && I != (H == 'ol' ? 'decimal' : 'disc')) {
                            x.addStyle('list-style-type', I);
                        }
                        if (H == 'ol' && G)
                        {
                            switch (I)
                            {
                                case 'decimal':
                                    J = Number(G[1]);
                                    break;
                                case 'lower-roman':
                                case 'upper-roman':
                                    J = n(G[1]);
                                    break;
                                case 'lower-alpha':
                                case 'upper-alpha':
                                    J = o(G[1]);
                                    break;
                            }
                            x.attributes.value = J;
                        }
                        if (!C) {
                            D.push(C = new CKEDITOR.htmlParser.element(H));
                            C.add(x);
                            v[K] = C;
                        }
                        else
                        {
                            if (z > A) {
                                D.push(C = new CKEDITOR.htmlParser.element(H));
                                C.add(x);
                                B.add(C);
                            }
                            else if (z < A) {
                                var O = A - z, P;
                                while (O--&& (P = C.parent)) {
                                    C = P.parent;
                                }
                                C.add(x);
                            }
                            else {
                                C.add(x);
                            }
                            v.splice(K--, 1);
                        }
                        B = x;
                        A = z;
                    }
                    else if (C) {
                        C = A = B = null;
                    }
                }
                for (K = 0; K < D.length; K++) {
                    c(D[K]);
                }
                C = A = B = r = q = p = null;
            },
            falsyFilter : function (u)
            {
                return false;
            },
            stylesFilter : function (u, v)
            {
                return function (w, x)
                {
                    var y = [];
                    (w || '').replace(/&quot;/g, '"').replace(/\s*([^ :;]+)\s*:\s*([^;]+)\s*(?=;|$)/g, 
                    function (A, B, C)
                    {
                        B = B.toLowerCase();
                        B == 'font-family' && (C = C.replace(/["']/g, ''));
                        var D, E, F, G;
                        for (var H = 0; H < u.length; H++)
                        {
                            if (u[H])
                            {
                                D = u[H][0];
                                E = u[H][1];
                                F = u[H][2];
                                G = u[H][3];
                                if (B.match(D) && (!E || C.match(E)))
                                {
                                    B = G || B;
                                    v && (F = F || C);
                                    if (typeof F == 'function')
                                    {
                                        F = F(C, x, B);
                                    }
                                    if (F && F.push) {
                                        B = F[0], F = F[1];
                                    }
                                    if (typeof F == 'string') {
                                        y.push([B, F]);
                                    }
                                    return;
                                }
                            }
                        }
                        !v && y.push([B, C]);
                    });
                    for (var z = 0; z < y.length; z++) {
                        y[z] = y[z].join(':');
                    }
                    return y.length ? y.join(';') + ';' : false;
                };
            },
            elementMigrateFilter : function (u, v)
            {
                return function (w)
                {
                    var x = v ? new CKEDITOR.style(u, v)._.definition : u;
                    w.name = x.element;
                    CKEDITOR.tools.extend(w.attributes, CKEDITOR.tools.clone(x.attributes));
                    w.addStyle(CKEDITOR.style.getStyleText(x));
                };
            },
            styleMigrateFilter : function (u, v)
            {
                var w = this.elementMigrateFilter;
                return function (x, y)
                {
                    var z = new CKEDITOR.htmlParser.element(null), A = {};
                    A[v] = x;
                    w(u, A)(z);
                    z.children = y.children;
                    y.children = [z];
                };
            },
            bogusAttrFilter : function (u, v)
            {
                if (v.name.indexOf('cke:') ==- 1) {
                    return false;
                }
            },
            applyStyleFilter : null
        },
        getRules : function (u)
        {
            var v = CKEDITOR.dtd, w = CKEDITOR.tools.extend({}, v.$block, v.$listItem, v.$tableContent), 
            x = u.config, y = this.filters, z = y.falsyFilter, A = y.stylesFilter, B = y.elementMigrateFilter, 
            C = CKEDITOR.tools.bind(this.filters.styleMigrateFilter, this.filters), D = this.utils.createListBulletMarker, 
            E = y.flattenList, F = y.assembleList, G = this.utils.isListBulletIndicator, H = this.utils.isContainingOnlySpaces, 
            I = this.utils.resolveList, J = function (O)
            {
                O = CKEDITOR.tools.convertToPx(O);
                return isNaN(O) ? O : O + 'px';
            },
            K = this.utils.getStyleComponents, L = this.utils.listDtdParents, M = x.pasteFromWordRemoveFontStyles !== false, 
            N = x.pasteFromWordRemoveStyles !== false;
            return {
                elementNames : [[/meta|link|script/, '']],
                root : function (O)
                {
                    O.filterChildren();
                    F(O);
                },
                elements : 
                {
                    '^' : function (O)
                    {
                        var P;
                        if (CKEDITOR.env.gecko && (P = y.applyStyleFilter)) {
                            P(O);
                        }
                    },
                    $ : function (O)
                    {
                        var P = O.name || '', Q = O.attributes;
                        if (P in w && Q.style) {
                            Q.style = A([[/^(:?width|height)$/, null, J]])(Q.style) || '';
                        }
                        if (P.match(/h\d/)) {
                            O.filterChildren();
                            if (I(O)) {
                                return;
                            }
                            B(x['format_' + P])(O);
                        }
                        else if (P in v.$inline) {
                            O.filterChildren();
                            if (H(O)) {
                                delete O.name;
                            }
                        }
                        else if (P.indexOf(':') !=- 1 && P.indexOf('cke') ==- 1)
                        {
                            O.filterChildren();
                            if (P == 'v:imagedata') {
                                var R = O.attributes['o:href'];
                                if (R) {
                                    O.attributes.src = R;
                                }
                                O.name = 'img';
                                return;
                            }
                            delete O.name;
                        }
                        if (P in L) {
                            O.filterChildren();
                            F(O);
                        }
                    },
                    style : function (O)
                    {
                        if (CKEDITOR.env.gecko)
                        {
                            var P = O.onlyChild().value.match(/\/\* Style Definitions \*\/([\s\S]*?)\/\*/), 
                            Q = P && P[1], R = {};
                            if (Q)
                            {
                                Q.replace(/[\n\r]/g, '').replace(/(.+?)\{(.+?)\}/g, function (S, T, U)
                                {
                                    T = T.split(',');
                                    var V = T.length, W;
                                    for (var X = 0; X < V; X++)
                                    {
                                        CKEDITOR.tools.trim(T[X]).replace(/^(\w+)(\.[\w-]+)?$/g, function (Y, 
                                        Z, aa) 
                                        {
                                            Z = Z || '*';
                                            aa = aa.substring(1, aa.length);
                                            if (aa.match(/MsoNormal/)) {
                                                return;
                                            }
                                            if (!R[Z]) {
                                                R[Z] = {};
                                            }
                                            if (aa) {
                                                R[Z][aa] = U;
                                            }
                                            else {
                                                R[Z] = U;
                                            }
                                        });
                                    }
                                });
                                y.applyStyleFilter = function (S)
                                {
                                    var T = R['*'] ? '*' : S.name, U = S.attributes && S.attributes['class'], 
                                    V;
                                    if (T in R) {
                                        V = R[T];
                                        if (typeof V == 'object') {
                                            V = V[U];
                                        }
                                        V && S.addStyle(V, true);
                                    }
                                };
                            }
                        }
                        return false;
                    },
                    p : function (O)
                    {
                        if (/MsoListParagraph/.exec(O.attributes['class']))
                        {
                            var P = O.firstChild(function (S)
                            {
                                return S.type == CKEDITOR.NODE_TEXT && !H(S.parent);
                            }), Q = P && P.parent, R = Q && Q.attributes;
                            R && !R.style && (R.style = 'mso-list: Ignore;');
                        }
                        O.filterChildren();
                        if (I(O)) {
                            return;
                        }
                        if (x.enterMode == CKEDITOR.ENTER_BR) {
                            delete O.name;
                            O.add(new CKEDITOR.htmlParser.element('br'));
                        }
                        else {
                            B(x['format_' + (x.enterMode == CKEDITOR.ENTER_P ? 'p' : 'div')])(O);
                        }
                    },
                    div : function (O)
                    {
                        var P = O.onlyChild();
                        if (P && P.name == 'table')
                        {
                            var Q = O.attributes;
                            P.attributes = CKEDITOR.tools.extend(P.attributes, Q);
                            Q.style && P.addStyle(Q.style);
                            var R = new CKEDITOR.htmlParser.element('div');
                            R.addStyle('clear', 'both');
                            O.add(R);
                            delete O.name;
                        }
                    },
                    td : function (O)
                    {
                        if (O.getAncestor('thead')) {
                            O.name = 'th';
                        }
                    },
                    ol : E, ul : E, dl : E,
                    font : function (O)
                    {
                        if (G(O.parent)) {
                            delete O.name;
                            return;
                        }
                        O.filterChildren();
                        var P = O.attributes, Q = P.style, R = O.parent;
                        if ('font' == R.name) {
                            CKEDITOR.tools.extend(R.attributes, O.attributes);
                            Q && R.addStyle(Q);
                            delete O.name;
                        }
                        else
                        {
                            Q = Q || '';
                            if (P.color) {
                                P.color != '#000000' && (Q += 'color:' + P.color + ';');
                                delete P.color;
                            }
                            if (P.face) {
                                Q += 'font-family:' + P.face + ';';
                                delete P.face;
                            }
                            if (P.size) {
                                Q += 'font-size:' + (P.size > 3 ? 'large' : P.size < 3 ? 'small' : 'medium') + ';';
                                delete P.size;
                            }
                            O.name = 'span';
                            O.addStyle(Q);
                        }
                    },
                    span : function (O)
                    {
                        if (G(O.parent)) {
                            return false;
                        }
                        O.filterChildren();
                        if (H(O)) {
                            delete O.name;
                            return null;
                        }
                        if (G(O))
                        {
                            var P = O.firstChild(function (Y)
                            {
                                return Y.value || Y.name == 'img';
                            }), Q = P && (P.value || 'l.'), R = Q && Q.match(/^(?:[(]?)([^\s]+?)([.)]?)$/);
                            if (R)
                            {
                                var S = D(R, Q), T = O.getAncestor('span');
                                if (T &&/ mso-hide:\s*all|display:\s*none /.test(T.attributes.style)) {
                                    S.attributes['cke:ignored'] = 1;
                                }
                                return S;
                            }
                        }
                        var U = O.children, V = O.attributes, W = V && V.style, X = U && U[0];
                        if (W)
                        {
                            V.style = A([['line-height'], [/^font-family$/, null, !M ? C(x.font_style, 
                            'family') : null], [/^font-size$/, null, !M ? C(x.fontSize_style, 'size') : null], 
                            [/^color$/, null, !M ? C(x.colorButton_foreStyle, 'color') : null], [/^background-color$/, 
                            null, !M ? C(x.colorButton_backStyle, 'color') : null]])(W, O) || '';
                        }
                        return null;
                    },
                    b : B(x.coreStyles_bold), i : B(x.coreStyles_italic), u : B(x.coreStyles_underline), 
                    s : B(x.coreStyles_strike), sup : B(x.coreStyles_superscript), sub : B(x.coreStyles_subscript), 
                    a : function (O)
                    {
                        var P = O.attributes;
                        if (P && !P.href && P.name) {
                            delete O.name;
                        }
                        else if (CKEDITOR.env.webkit && P.href && P.href.match(/file:\/\/\/[\S]+#/i)) {
                            P.href = P.href.replace(/file:\/\/\/[^#]+/i, '');
                        }
                    },
                    'cke:listbullet' : function (O)
                    {
                        if (O.getAncestor(/h\d/) && !x.pasteFromWordNumberedHeadingToList) {
                            delete O.name;
                        }
                    }
                },
                attributeNames : [[/^onmouse(:?out|over)/, ''], [/^onload$/, ''], [/(?:v|o):\w+/, ''], 
                [/^lang/, '']], attributes : 
                {
                    style : A(N ? [[/^list-style-type$/, null], [/^margin$|^margin-(?!bottom|top)/, null, 
                    function (O, P, Q)
                    {
                        if (P.name in {
                            p : 1, div : 1
                        })
                        {
                            var R = x.contentsLangDirection == 'ltr' ? 'margin-left' : 'margin-right';
                            if (Q == 'margin') {
                                O = K(Q, O, [R])[R];
                            }
                            else if (Q != R) {
                                return null;
                            }
                            if (O && !e.test(O)) {
                                return [R, O];
                            }
                        }
                        return null;
                    }], [/^clear$/], [/^border.*|margin.*|vertical-align|float$/, null, function (O, P)
                    {
                        if (P.name == 'img') {
                            return O;
                        }
                    }], [/^width|height$/, null, function (O, P)
                    {
                        if (P.name in {
                            table : 1, td : 1, th : 1, img : 1
                        }) return O;
                    }]] : [[/^mso-/], [/-color$/, null, function (O)
                    {
                        if (O == 'transparent') {
                            return false;
                        }
                        if (CKEDITOR.env.gecko) {
                            return O.replace(/-moz-use-text-color/g, 'transparent');
                        }
                    }], [/^margin$/, e], ['text-indent', '0cm'], ['page-break-before'], ['tab-stops'], 
                    ['display', 'none'], M ? [/font-?/] : null], N),
                    width : function (O, P)
                    {

                        if (P.name in v.$tableContent) {
                            return false;
                        }
                    },
                    border : function (O, P)
                    {
                        if (P.name in v.$tableContent) {
                            return false;
                        }
                    },
                    'class' : z, bgcolor : z, valign : N ? z : function (O, P)
                    {
                        P.addStyle('vertical-align', O);
                        return false;
                    }
                },
                comment :!CKEDITOR.env.ie ? function (O, P)
                {
                    var Q = O.match(/<img.*?>/), R = O.match(/^\[if !supportLists\]([\s\S]*?)\[endif\]$/);
                    if (R) {
                        var S = R[1] || Q && 'l.', T = S && S.match(/>(?:[(]?)([^\s]+?)([.)]?)</);
                        return D(T, S);
                    }
                    if (CKEDITOR.env.gecko && Q)
                    {
                        var U = CKEDITOR.htmlParser.fragment.fromHtml(Q[0]).children[0], V = P.previous, 
                        W = V && V.value.match(/<v:imagedata[^>]*o:href=['"](.*?)['"]/), X = W && W[1];
                        X && (U.attributes.src = X);
                        return U;
                    }
                    return false;
                }
                 : z
            };
        }
    },
    t = function ()
    {
        this.dataFilter = new CKEDITOR.htmlParser.filter();
    };
    t.prototype = 
    {
        toHtml : function (u)
        {
            var v = CKEDITOR.htmlParser.fragment.fromHtml(u, false), w = new CKEDITOR.htmlParser.basicWriter();
            v.writeHtml(w, this.dataFilter);
            return w.getHtml(true);
        }
    };
    CKEDITOR.cleanWord = function (u, v)
    {
        if (CKEDITOR.env.gecko) {
            u = u.replace(/(<!--\[if[^<]*?\])-->([\S\s]*?)<!--(\[endif\]-->)/gi, '$1$2$3');
        }
        var w = new t(), x = w.dataFilter;
        x.addRules(CKEDITOR.plugins.pastefromword.getRules(v));
        v.fire('beforeCleanWord', {
            filter : x
        });
        try {
            u = w.toHtml(u, false);
        }
        catch (y) {
            alert(v.lang.pastefromword.error);
        }
        u = u.replace(/cke:.*?".*?"/g, '');
        u = u.replace(/style=""/g, '');
        u = u.replace(/<span>/g, '');
        return u;
    };
})();