﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.add('iframedialog', 
{
    requires : ['dialog'],
    onLoad : function ()
    {
        CKEDITOR.dialog.addIframe = function (a, b, c, d, e, f, g)
        {
            var h = {
                type : 'iframe', src : c, width : '100%', height : '100%'
            };
            if (typeof f == 'function')
            {
                h.onContentLoad = f;
            }
            else
            {
                h.onContentLoad = function () 
                {
                    var k = this.getElement(), l = k.$.contentWindow;
                    if (l.onDialogEvent) 
                    {
                        var m = this.getDialog(), n = function (o) 
                        {
                            return l.onDialogEvent(o);
                        };
                        m.on('ok', n);
                        m.on('cancel', n);
                        m.on('resize', n);
                        m.on('hide', function (o) 
                        {
                            m.removeListener('ok', n);
                            m.removeListener('cancel', n);
                            m.removeListener('resize', n);
                            o.removeListener();
                        });
                        l.onDialogEvent({
                            name : 'load', sender : this, editor : m._.editor 
                        });
                    }
                };
            }
            var i = 
            {
                title : b, minWidth : d, minHeight : e, contents : [ {
                    id : 'iframe', label : b, expand : true, elements : [h]
                }]
            };
            for (var j in g) {
                i[j] = g[j];
            }
            this.add(a, function ()
            {
                return i;
            });
        };
        (function ()
        {
            var a = function (b, c, d)
            {
                if (arguments.length < 3) {
                    return;
                }
                var e = this._ || (this._ = {}), f = c.onContentLoad && CKEDITOR.tools.bind(c.onContentLoad, 
                this), g = CKEDITOR.tools.cssLength(c.width), h = CKEDITOR.tools.cssLength(c.height);
                e.frameId = CKEDITOR.tools.getNextId() + '_iframe';
                b.on('load', function ()
                {
                    var k = CKEDITOR.document.getById(e.frameId), l = k.getParent();
                    l.setStyles({
                        width : g, height : h
                    });
                });
                var i = {
                    src : '%2', id : e.frameId, frameborder : 0, allowtransparency : true
                },
                j = [];
                if (typeof c.onContentLoad == 'function')
                {
                    i.onload = 'CKEDITOR.tools.callFunction(%1);';
                }
                CKEDITOR.ui.dialog.uiElement.call(this, b, c, j, 'iframe', {
                    width : g, height : h
                },
                i, '');
                d.push('<div style="width:' + g + ';height:' + h + ';" id="' + this.domId + '"></div>');
                j = j.join('');
                b.on('show', function ()
                {
                    var k = CKEDITOR.document.getById(e.frameId), l = k.getParent(), m = CKEDITOR.tools.addFunction(f), 
                    n = j.replace('%1', m).replace('%2', CKEDITOR.tools.htmlEncode(c.src));
                    l.setHtml(n);
                });
            };
            a.prototype = new CKEDITOR.ui.dialog.uiElement();
            CKEDITOR.dialog.addUIElement('iframe', {
                build : function (b, c, d)
                {
                    return new a(b, c, d);
                }
            });
        })();
    }
});