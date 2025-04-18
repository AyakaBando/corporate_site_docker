﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function ()
{
    function a(e, f)
    {
        var g;
        try {
            g = e.getSelection().getRanges()[0];
        }
        catch (h) {
            return null;
        }
        g.shrink(CKEDITOR.SHRINK_TEXT);
        return g.getCommonAncestor().getAscendant(f, 1);
    };
    var b = function (e)
    {
        return e.type == CKEDITOR.NODE_ELEMENT && e.is('li');
    },
    c = 
    {
        a : 'lower-alpha', A : 'upper-alpha', i : 'lower-roman', I : 'upper-roman', 1 : 'decimal', disc : 'disc', 
        circle : 'circle', square : 'square'
    };
    function d(e, f)
    {
        var g = e.lang.list;
        if (f == 'bulletedListStyle')
        {
            return {
                title : g.bulletedTitle, minWidth : 300, minHeight : 50, contents : [ 
                {
                    id : 'info', accessKey : 'I', elements : [ 
                    {
                        type : 'select', label : g.type, id : 'type', align : 'center', style : 'width:150px', 
                        items : [[g.notset, ''], [g.circle, 'circle'], [g.disc, 'disc'], [g.square, 'square']], 
                        setup : function (i) 
                        {
                            var j = i.getStyle('list-style-type') || c[i.getAttribute('type')] || i.getAttribute('type') || '';
                            this.setValue(j);
                        },
                        commit : function (i) 
                        {
                            var j = this.getValue();
                            if (j) {
                                i.setStyle('list-style-type', j);
                            }
                            else {
                                i.removeStyle('list-style-type');
                            }
                        }
                    }] 
                }],
                onShow : function () 
                {
                    var i = this.getParentEditor(), j = a(i, 'ul');
                    j && this.setupContent(j);
                },
                onOk : function () 
                {
                    var i = this.getParentEditor(), j = a(i, 'ul');
                    j && this.commitContent(j);
                }
            };
        }
        else if (f == 'numberedListStyle')
        {
            var h = [[g.notset, ''], [g.lowerRoman, 'lower-roman'], [g.upperRoman, 'upper-roman'], [g.lowerAlpha, 
            'lower-alpha'], [g.upperAlpha, 'upper-alpha'], [g.decimal, 'decimal']];
            if (!CKEDITOR.env.ie || CKEDITOR.env.version > 7)
            {
                h.concat([[g.armenian, 'armenian'], [g.decimalLeadingZero, 'decimal-leading-zero'], [g.georgian, 
                'georgian'], [g.lowerGreek, 'lower-greek']]);
            }
            return {
                title : g.numberedTitle, minWidth : 300, minHeight : 50, contents : [
                {
                    id : 'info', accessKey : 'I', elements : [
                    {
                        type : 'hbox', widths : ['25%', '75%'], children : [
                        {
                            label : g.start, type : 'text', id : 'start', validate : CKEDITOR.dialog.validate.integer(g.validateStartNumber), 
                            setup : function (i)
                            {
                                var j = i.getFirst(b).getAttribute('value') || i.getAttribute('start') || 1;
                                j && this.setValue(j);
                            },
                            commit : function (i)
                            {
                                var j = i.getFirst(b), k = j.getAttribute('value') || i.getAttribute('start') || 1;
                                i.getFirst(b).removeAttribute('value');
                                var l = parseInt(this.getValue(), 10);
                                if (isNaN(l)) {
                                    i.removeAttribute('start');
                                }
                                else {
                                    i.setAttribute('start', l);
                                }
                                var m = j, n = k, o = isNaN(l) ? 1 : l;
                                while ((m = m.getNext(b)) && n++) {
                                    if (m.getAttribute('value') == n) {
                                        m.setAttribute('value', o + n - k);
                                    }
                                }
                            }
                        },

                        {
                            type : 'select', label : g.type, id : 'type', style : 'width: 100%;', items : h, 
                            setup : function (i)
                            {
                                var j = i.getStyle('list-style-type') || c[i.getAttribute('type')] || i.getAttribute('type') || '';
                                this.setValue(j);
                            },
                            commit : function (i)
                            {
                                var j = this.getValue();
                                if (j) {
                                    i.setStyle('list-style-type', j);
                                }
                                else {
                                    i.removeStyle('list-style-type');
                                }
                            }
                        }]
                    }]
                }],
                onShow : function ()
                {
                    var i = this.getParentEditor(), j = a(i, 'ol');
                    j && this.setupContent(j);
                },
                onOk : function ()
                {
                    var i = this.getParentEditor(), j = a(i, 'ol');
                    j && this.commitContent(j);
                }
            };
        }
    };
    CKEDITOR.dialog.add('numberedListStyle', function (e)
    {
        return d(e, 'numberedListStyle');
    });
    CKEDITOR.dialog.add('bulletedListStyle', function (e)
    {
        return d(e, 'bulletedListStyle');
    });
})();