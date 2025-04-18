﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function ()
{
    function a(d, e, f)
    {
        if (!e.is || !e.getCustomData('block_processed')) {
            e.is && CKEDITOR.dom.element.setMarker(f, e, 'block_processed', true);
            d.push(e);
        }
    };
    function b(d)
    {
        var e = [], f = d.getChildren();
        for (var g = 0; g < f.count(); g++)
        {
            var h = f.getItem(g);
            if (!(h.type === CKEDITOR.NODE_TEXT &&/^[ \t\n\r]+$/.test(h.getText()))) {
                e.push(h);
            }
        }
        return e;
    };
    function c(d, e)
    {
        var f = (function ()
        {
            var p = CKEDITOR.tools.extend({}, CKEDITOR.dtd.$blockLimit);
            delete p.div;
            if (d.config.div_wrapTable) {
                delete p.td;
                delete p.th;
            }
            return p;
        })(), g = CKEDITOR.dtd.div;
        function h(p)
        {
            var q = new CKEDITOR.dom.elementPath(p).elements, r;
            for (var s = 0; s < q.length; s++) {
                if (q[s].getName() in f) {
                    r = q[s];
                    break;
                }
            }
            return r;
        };
        function i()
        {
            this.foreach(function (p)
            {
                if (/^(?!vbox|hbox)/.test(p.type))
                {
                    if (!p.setup) {
                        p.setup = function (q) 
                        {
                            p.setValue(q.getAttribute(p.id) || '');
                        };
                    }
                    if (!p.commit)
                    {
                        p.commit = function (q) 
                        {
                            var r = this.getValue();
                            if ('dir' == p.id && q.getComputedStyle('direction') == r) {
                                return;
                            }
                            if (r) {
                                q.setAttribute(p.id, r);
                            }
                            else {
                                q.removeAttribute(p.id);
                            }
                        };
                    }
                }
            });
        };
        function j(p)
        {
            var q = [], r = {}, s = [], t, u = p.document.getSelection(), v = u.getRanges(), w = u.createBookmarks(), 
            x, y, z = p.config.enterMode == CKEDITOR.ENTER_DIV ? 'div' : 'p';
            for (x = 0; x < v.length; x++)
            {
                y = v[x].createIterator();
                while (t = y.getNextParagraph())
                {
                    if (t.getName() in f) {
                        var A, B = t.getChildren();
                        for (A = 0; A < B.count(); A++) {
                            a(s, B.getItem(A), r);
                        }
                    }
                    else {
                        while (!g[t.getName()] && t.getName() != 'body') {
                            t = t.getParent();
                        }
                        a(s, t, r);
                    }
                }
            }
            CKEDITOR.dom.element.clearAllMarkers(r);
            var C = l(s), D, E, F;
            for (x = 0; x < C.length; x++)
            {
                var G = C[x][0];
                D = G.getParent();
                for (A = 1; A < C[x].length; A++) {
                    D = D.getCommonAncestor(C[x][A]);
                }
                F = new CKEDITOR.dom.element('div', p.document);
                for (A = 0; A < C[x].length; A++) {
                    G = C[x][A];
                    while (!G.getParent().equals(D)) {
                        G = G.getParent();
                    }
                    C[x][A] = G;
                }
                var H = null;
                for (A = 0; A < C[x].length; A++)
                {
                    G = C[x][A];
                    if (!(G.getCustomData && G.getCustomData('block_processed')))
                    {
                        G.is && CKEDITOR.dom.element.setMarker(r, G, 'block_processed', true);
                        if (!A) {
                            F.insertBefore(G);
                        }
                        F.append(G);
                    }
                }
                CKEDITOR.dom.element.clearAllMarkers(r);
                q.push(F);
            }
            u.selectBookmarks(w);
            return q;
        };
        function k(p)
        {
            var q = new CKEDITOR.dom.elementPath(p.getSelection().getStartElement()), r = q.blockLimit, 
            s = r && r.getAscendant('div', true);
            return s;
        };
        function l(p)
        {
            var q = [], r = null, s, t;
            for (var u = 0; u < p.length; u++) {
                t = p[u];
                var v = h(t);
                if (!v.equals(r)) {
                    r = v;
                    q.push([]);
                }
                q[q.length - 1].push(t);
            }
            return q;
        };
        function m(p)
        {
            var q = this.getDialog(), r = q._element && q._element.clone() || new CKEDITOR.dom.element('div', 
            d.document);
            this.commit(r, true);
            p = [].concat(p);
            var s = p.length, t;
            for (var u = 0; u < s; u++) {
                t = q.getContentElement.apply(q, p[u].split(':'));
                t && t.setup && t.setup(r, true);
            }
        };
        var n = {}, o = [];
        return {
            title : d.lang.div.title, minWidth : 400, minHeight : 165, contents : [
            {
                id : 'info', label : d.lang.common.generalTab, title : d.lang.common.generalTab, elements : [
                {
                    type : 'hbox', widths : ['50%', '50%'], children : [
                    {
                        id : 'elementStyle', type : 'select', style : 'width: 100%;', label : d.lang.div.styleSelectLabel, 
                        'default' : '', items : [[d.lang.common.notSet, '']],
                        onChange : function ()
                        {
                            m.call(this, ['info:class', 'advanced:dir', 'advanced:style']);
                        },
                        setup : function (p)
                        {
                            for (var q in n) {
                                n[q].checkElementRemovable(p, true) && this.setValue(q);
                            }
                        },
                        commit : function (p)
                        {
                            var q;
                            if (q = this.getValue())
                            {
                                var r = n[q], s = p.getCustomData('elementStyle') || '';
                                r.applyToObject(p);
                                p.setCustomData('elementStyle', s + r._.definition.attributes.style);
                            }
                        }
                    },
                    {
                        id : 'class', type : 'text', label : d.lang.common.cssClass, 'default' : ''
                    }]
                }]
            },

            {
                id : 'advanced', label : d.lang.common.advancedTab, title : d.lang.common.advancedTab, 
                elements : [
                {
                    type : 'vbox', padding : 1, children : [
                    {
                        type : 'hbox', widths : ['50%', '50%'], children : [ {
                            type : 'text', id : 'id', label : d.lang.common.id, 'default' : ''
                        },
                        {
                            type : 'text', id : 'lang', label : d.lang.link.langCode, 'default' : ''
                        }]
                    },

                    {
                        type : 'hbox', children : [
                        {
                            type : 'text', id : 'style', style : 'width: 100%;', label : d.lang.common.cssStyle, 
                            'default' : '',
                            commit : function (p)
                            {
                                var q = this.getValue() + (p.getCustomData('elementStyle') || '');
                                p.setAttribute('style', q);
                            }
                        }]
                    },

                    {
                        type : 'hbox', children : [
                        {
                            type : 'text', id : 'title', style : 'width: 100%;', label : d.lang.common.advisoryTitle, 
                            'default' : ''
                        }]
                    },

                    {
                        type : 'select', id : 'dir', style : 'width: 100%;', label : d.lang.common.langDir, 
                        'default' : '', items : [[d.lang.common.notSet, ''], [d.lang.common.langDirLtr, 
                        'ltr'], [d.lang.common.langDirRtl, 'rtl']]
                    }]
                }]
            }],
            onLoad : function ()
            {
                i.call(this);
                var p = this, q = this.getContentElement('info', 'elementStyle');
                d.getStylesSet(function (r)
                {
                    var s;
                    if (r)
                    {
                        for (var t = 0; t < r.length; t++) 
                        {
                            var u = r[t];
                            if (u.element && u.element == 'div') {
                                s = u.name;
                                n[s] = new CKEDITOR.style(u);
                                q.items.push([s, s]);
                                q.add(s, s);
                            }
                        }
                        q[q.items.length > 1 ? 'enable' : 'disable']();
                    }
                    setTimeout(function ()
                    {
                        q.setup(p._element);
                    }, 0);
                });
            },
            onShow : function ()
            {
                if (e == 'editdiv') {
                    var p = k(d);
                    p && this.setupContent(this._element = p);
                }
            },
            onOk : function ()
            {
                if (e == 'editdiv') {
                    o = [this._element];
                }
                else {
                    o = j(d, true);
                }
                var p = o.length;
                for (var q = 0; q < p; q++)
                {
                    this.commitContent(o[q]);
                    !o[q].getAttribute('style') && o[q].removeAttribute('style');
                }
                this.hide();
            },
            onHide : function ()
            {
                if (e == 'editdiv') {
                    this._element.removeCustomData('elementStyle');
                }
                delete this._element;
            }
        };
    };
    CKEDITOR.dialog.add('creatediv', function (d)
    {
        return c(d, 'creatediv');
    });
    CKEDITOR.dialog.add('editdiv', function (d)
    {
        return c(d, 'editdiv');
    });
})();
