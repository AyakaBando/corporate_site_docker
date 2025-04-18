﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function ()
{
    var a = {
        scrolling : {
            'true' : 'yes', 'false' : 'no'
        },
        frameborder : {
            'true' : '1', 'false' : '0'
        }
    };
    function b(d)
    {
        var g = this;
        var e = g instanceof CKEDITOR.ui.dialog.checkbox;
        if (d.hasAttribute(g.id))
        {
            var f = d.getAttribute(g.id);
            if (e) {
                g.setValue(a[g.id]['true'] == f.toLowerCase());
            }
            else {
                g.setValue(f);
            }
        }
    };
    function c(d)
    {
        var h = this;
        var e = h.getValue() === '', f = h instanceof CKEDITOR.ui.dialog.checkbox, g = h.getValue();
        if (e) {
            d.removeAttribute(h.att || h.id);
        }
        else if (f) {
            d.setAttribute(h.id, a[h.id][g]);
        }
        else {
            d.setAttribute(h.att || h.id, g);
        }
    };
    CKEDITOR.dialog.add('iframe', function (d)
    {
        var e = d.lang.iframe, f = d.lang.common, g = d.plugins.dialogadvtab;
        return {
            title : e.title, minWidth : 350, minHeight : 260,
            onShow : function ()
            {
                var j = this;
                j.fakeImage = j.iframeNode = null;
                var h = j.getSelectedElement();
                if (h && h.data('cke-real-element-type') && h.data('cke-real-element-type') == 'iframe') {
                    j.fakeImage = h;
                    var i = d.restoreRealElement(h);
                    j.iframeNode = i;
                    j.setupContent(i);
                }
            },
            onOk : function ()
            {
                var l = this;
                var h;
                if (!l.fakeImage) {
                    h = new CKEDITOR.dom.element('iframe');
                }
                else {
                    h = l.iframeNode;
                }
                var i = {}, j = {};
                l.commitContent(h, i, j);
                var k = d.createFakeElement(h, 'cke_iframe', 'iframe', true);
                k.setAttributes(j);
                k.setStyles(i);
                if (l.fakeImage) {
                    k.replace(l.fakeImage);
                    d.getSelection().selectElement(k);
                }
                else {
                    d.insertElement(k);
                }
            },
            contents : [
            {
                id : 'info', label : f.generalTab, accessKey : 'I', elements : [
                {
                    type : 'vbox', padding : 0, children : [
                    {
                        id : 'src', type : 'text', label : f.url, required : true, validate : CKEDITOR.dialog.validate.notEmpty(e.noUrl), 
                        setup : b, commit : c
                    }]
                },

                {
                    type : 'hbox', children : [
                    {
                        id : 'width', type : 'text', style : 'width:100%', labelLayout : 'vertical', label : f.width, 
                        validate : CKEDITOR.dialog.validate.htmlLength(f.invalidHtmlLength.replace('%1', 
                        f.width)), setup : b, commit : c
                    },

                    {
                        id : 'height', type : 'text', style : 'width:100%', labelLayout : 'vertical', 
                        label : f.height, validate : CKEDITOR.dialog.validate.htmlLength(f.invalidHtmlLength.replace('%1', 
                        f.height)), setup : b, commit : c
                    },

                    {
                        id : 'align', type : 'select', 'default' : '', items : [[f.notSet, ''], [f.alignLeft, 
                        'left'], [f.alignRight, 'right'], [f.alignTop, 'top'], [f.alignMiddle, 'middle'], 
                        [f.alignBottom, 'bottom']], style : 'width:100%', labelLayout : 'vertical', label : f.align, 
                        setup : function (h, i)
                        {
                            b.apply(this, arguments);
                            if (i) {
                                var j = i.getAttribute('align');
                                this.setValue(j && j.toLowerCase() || '');
                            }
                        },
                        commit : function (h, i, j)
                        {
                            c.apply(this, arguments);
                            if (this.getValue()) {
                                j.align = this.getValue();
                            }
                        }
                    }]
                },

                {
                    type : 'hbox', widths : ['50%', '50%'], children : [ {
                        id : 'scrolling', type : 'checkbox', label : e.scrolling, setup : b, commit : c
                    },
                    {
                        id : 'frameborder', type : 'checkbox', label : e.border, setup : b, commit : c
                    }]
                },

                {
                    type : 'hbox', widths : ['50%', '50%'], children : [ {
                        id : 'name', type : 'text', label : f.name, setup : b, commit : c
                    },
                    {
                        id : 'title', type : 'text', label : f.advisoryTitle, setup : b, commit : c
                    }]
                },
                {
                    id : 'longdesc', type : 'text', label : f.longDescr, setup : b, commit : c
                }]
            },
            g && g.createAdvancedTab(d, {
                id : 1, classes : 1, styles : 1
            })]
        };
    });
})();
