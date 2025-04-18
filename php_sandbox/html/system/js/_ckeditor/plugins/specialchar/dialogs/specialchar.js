﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.dialog.add('specialchar', function (a)
{
    var b, c = a.lang.specialChar, d = function (j)
    {
        var k, l;
        if (j.data) {
            k = j.data.getTarget();
        }
        else {
            k = new CKEDITOR.dom.element(j);
        }
        if (k.getName() == 'a' && (l = k.getChild(0).getHtml()))
        {
            k.removeClass('cke_light_background');
            b.hide();
            var m = a.document.createElement('span');
            m.setHtml(l);
            a.insertText(m.getText());
        }
    },
    e = CKEDITOR.tools.addFunction(d), f, g = function (j, k)
    {
        var l;
        k = k || j.data.getTarget();
        if (k.getName() == 'span') {
            k = k.getParent();
        }
        if (k.getName() == 'a' && (l = k.getChild(0).getHtml()))
        {
            if (f) {
                h(null, f);
            }
            var m = b.getContentElement('info', 'htmlPreview').getElement();
            b.getContentElement('info', 'charPreview').getElement().setHtml(l);
            m.setHtml(CKEDITOR.tools.htmlEncode(l));
            k.getParent().addClass('cke_light_background');
            f = k;
        }
    },
    h = function (j, k)
    {
        k = k || j.data.getTarget();
        if (k.getName() == 'span') {
            k = k.getParent();
        }
        if (k.getName() == 'a')
        {
            b.getContentElement('info', 'charPreview').getElement().setHtml('&nbsp;');
            b.getContentElement('info', 'htmlPreview').getElement().setHtml('&nbsp;');
            k.getParent().removeClass('cke_light_background');
            f = undefined;
        }
    },
    i = CKEDITOR.tools.addFunction(function (j)
    {
        j = new CKEDITOR.dom.event(j);
        var k = j.getTarget(), l, m, n = j.getKeystroke(), o = a.lang.dir == 'rtl';
        switch (n)
        {
            case 38:
                if (l = k.getParent().getParent().getPrevious()) {
                    m = l.getChild([k.getParent().getIndex(), 0]);
                    m.focus();
                    h(null, k);
                    g(null, m);
                }
                j.preventDefault();
                break;
            case 40:
                if (l = k.getParent().getParent().getNext())
                {
                    m = l.getChild([k.getParent().getIndex(), 0]);
                    if (m && m.type == 1) {
                        m.focus();
                        h(null, k);
                        g(null, m);
                    }
                }
                j.preventDefault();
                break;
            case 32:
                d({
                    data : j
                });
                j.preventDefault();
                break;
            case o ? 37:
                39 : case 9 : if (l = k.getParent().getNext())
                {
                    m = l.getChild(0);
                    if (m.type == 1) {
                        m.focus();
                        h(null, k);
                        g(null, m);
                        j.preventDefault(true);
                    }
                    else {
                        h(null, k);
                    }
                }
                else if (l = k.getParent().getParent().getNext())
                {
                    m = l.getChild([0, 0]);
                    if (m && m.type == 1) {
                        m.focus();
                        h(null, k);
                        g(null, m);
                        j.preventDefault(true);
                    }
                    else {
                        h(null, k);
                    }
                }
                break;
            case o ? 39:
                37 : case CKEDITOR.SHIFT + 9 : if (l = k.getParent().getPrevious()) {
                    m = l.getChild(0);
                    m.focus();
                    h(null, k);
                    g(null, m);
                    j.preventDefault(true);
                }
                else if (l = k.getParent().getParent().getPrevious()) {
                    m = l.getLast().getChild(0);
                    m.focus();
                    h(null, k);
                    g(null, m);
                    j.preventDefault(true);
                }
                else {
                    h(null, k);
                }
                break;
            default:
                return;
        }
    });
    return {
        title : c.title, minWidth : 430, minHeight : 280, buttons : [CKEDITOR.dialog.cancelButton], charColumns : 17, 
        onLoad : function ()
        {
            var j = this.definition.charColumns, k = a.config.extraSpecialChars, l = a.config.specialChars, 
            m = CKEDITOR.tools.getNextId() + '_specialchar_table_label', n = ['<table role="listbox" aria-labelledby="' + m + '"' + ' style="width: 320px; height: 100%; border-collapse: separate;"' + ' align="center" cellspacing="2" cellpadding="2" border="0">'], 
            o = 0, p = l.length, q, r;
            while (o < p)
            {
                n.push('<tr>');
                for (var s = 0; s < j; s++, o++)
                {
                    if (q = l[o])
                    {
                        r = '';
                        if (q instanceof Array) {
                            r = q[1];
                            q = q[0];
                        }
                        else {
                            var t = q.replace('&', '').replace(';', '').replace('#', '');
                            r = c[t] || q;
                        }
                        var u = 'cke_specialchar_label_' + o + '_' + CKEDITOR.tools.getNextNumber();
                        n.push('<td class="cke_dark_background" style="cursor: default" role="presentation"><a href="javascript: void(0);" role="option" aria-posinset="' + (o + 1) + '"', 
                        ' aria-setsize="' + p + '"', ' aria-labelledby="' + u + '"', ' style="cursor: inherit; display: block; height: 1.25em; margin-top: 0.25em; text-align: center;" title="', 
                        CKEDITOR.tools.htmlEncode(r), '" onkeydown="CKEDITOR.tools.callFunction( ' + i + ', event, this )"' + ' onclick="CKEDITOR.tools.callFunction(' + e + ', this); return false;"' + ' tabindex="-1">' + '<span style="margin: 0 auto;cursor: inherit">' + q + '</span>' + '<span class="cke_voice_label" id="' + u + '">' + r + '</span></a>');
                    }
                    else {
                        n.push('<td class="cke_dark_background">&nbsp;');
                    }
                    n.push('</td>');
                }
                n.push('</tr>');
            }
            n.push('</tbody></table>', '<span id="' + m + '" class="cke_voice_label">' + c.options + '</span>');
            this.getContentElement('info', 'charContainer').getElement().setHtml(n.join(''));
        },
        contents : [
        {
            id : 'info', label : a.lang.common.generalTab, title : a.lang.common.generalTab, padding : 0, 
            align : 'top', elements : [
            {
                type : 'hbox', align : 'top', widths : ['320px', '90px'], children : [
                {
                    type : 'html', id : 'charContainer', html : '', onMouseover : g, onMouseout : h,
                    focus : function ()
                    {
                        var j = this.getElement().getElementsByTag('a').getItem(0);
                        setTimeout(function ()
                        {
                            j.focus();
                            g(null, j);
                        }, 0);
                    },
                    onShow : function ()
                    {
                        var j = this.getElement().getChild([0, 0, 0, 0, 0]);
                        setTimeout(function ()
                        {
                            j.focus();
                            g(null, j);
                        }, 0);
                    },
                    onLoad : function (j)
                    {
                        b = j.sender;
                    }
                },

                {
                    type : 'hbox', align : 'top', widths : ['100%'], children : [
                    {
                        type : 'vbox', align : 'top', children : [ {
                            type : 'html', html : '<div></div>'
                        },

                        {
                            type : 'html', id : 'charPreview', className : 'cke_dark_background', style : "border:1px solid #eeeeee;font-size:28px;height:40px;width:70px;padding-top:9px;font-family:'Microsoft Sans Serif',Arial,Helvetica,Verdana;text-align:center;", 
                            html : '<div>&nbsp;</div>'
                        },

                        {
                            type : 'html', id : 'htmlPreview', className : 'cke_dark_background', style : "border:1px solid #eeeeee;font-size:14px;height:20px;width:70px;padding-top:2px;font-family:'Microsoft Sans Serif',Arial,Helvetica,Verdana;text-align:center;", 
                            html : '<div>&nbsp;</div>'
                        }]
                    }]
                }]
            }]
        }]
    };
});
