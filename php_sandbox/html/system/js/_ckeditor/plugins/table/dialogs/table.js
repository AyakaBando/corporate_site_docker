﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function ()
{
    var a = CKEDITOR.tools.cssLength, b = function (e)
    {
        var f = this.id;
        if (!e.info) {
            e.info = {};
        }
        e.info[f] = this.getValue();
    };
    function c(e)
    {
        var f = 0, g = 0;
        for (var h = 0, i, j = e.$.rows.length; h < j; h++)
        {
            i = e.$.rows[h], f = 0;
            for (var k = 0, l, m = i.cells.length; k < m; k++) {
                l = i.cells[k];
                f += l.colSpan;
            }
            f > g && (g = f);
        }
        return g;
    };
    function d(e, f)
    {
        var g = function (i)
        {
            return new CKEDITOR.dom.element(i, e.document);
        },
        h = e.plugins.dialogadvtab;
        return {
            title : e.lang.table.title, minWidth : 310, minHeight : CKEDITOR.env.ie ? 310 : 280,
            onLoad : function ()
            {
                var i = this, j = i.getContentElement('advanced', 'advStyles');
                if (j)
                {
                    j.on('change', function (k) 
                    {
                        var l = this.getStyle('width', ''), m = i.getContentElement('info', 'txtWidth');
                        m && m.setValue(l, true);
                        var n = this.getStyle('height', ''), o = i.getContentElement('info', 'txtHeight');
                        o && o.setValue(n, true);
                    });
                }
            },
            onShow : function ()
            {
                var q = this;
                var i = e.getSelection(), j = i.getRanges(), k = null, l = q.getContentElement('info', 
                'txtRows'), m = q.getContentElement('info', 'txtCols'), n = q.getContentElement('info', 
                'txtWidth'), o = q.getContentElement('info', 'txtHeight');
                if (f == 'tableProperties')
                {
                    if (k = i.getSelectedElement()) {
                        k = k.getAscendant('table', true);
                    }
                    else if (j.length > 0)
                    {
                        if (CKEDITOR.env.webkit) {
                            j[0].shrink(CKEDITOR.NODE_ELEMENT);
                        }
                        var p = j[0].getCommonAncestor(true);
                        k = p.getAscendant('table', true);
                    }
                    q._.selectedElement = k;
                }
                if (k) {
                    q.setupContent(k);
                    l && l.disable();
                    m && m.disable();
                }
                else {
                    l && l.enable();
                    m && m.enable();
                }
                n && n.onChange();
                o && o.onChange();
            },
            onOk : function ()
            {
                var i = e.getSelection(), j = this._.selectedElement && i.createBookmarks(), k = this._.selectedElement || g('table'), 
                l = this, m = {};
                this.commitContent(m, k);
                if (m.info)
                {
                    var n = m.info;
                    if (!this._.selectedElement)
                    {
                        var o = k.append(g('tbody')), p = parseInt(n.txtRows, 10) || 0, q = parseInt(n.txtCols, 
                        10) || 0;
                        for (var r = 0; r < p; r++)
                        {
                            var s = o.append(g('tr'));
                            for (var t = 0; t < q; t++) {
                                var u = s.append(g('td'));
                                if (!CKEDITOR.env.ie) {
                                    u.append(g('br'));
                                }
                            }
                        }
                    }
                    var v = n.selHeaders;
                    if (!k.$.tHead && (v == 'row' || v == 'both'))
                    {
                        var w = new CKEDITOR.dom.element(k.$.createTHead());
                        o = k.getElementsByTag('tbody').getItem(0);
                        var x = o.getElementsByTag('tr').getItem(0);
                        for (r = 0; r < x.getChildCount(); r++)
                        {
                            var y = x.getChild(r);
                            if (y.type == CKEDITOR.NODE_ELEMENT && !y.data('cke-bookmark')) {
                                y.renameNode('th');
                                y.setAttribute('scope', 'col');
                            }
                        }
                        w.append(x.remove());
                    }
                    if (k.$.tHead !== null && !(v == 'row' || v == 'both'))
                    {
                        w = new CKEDITOR.dom.element(k.$.tHead);
                        o = k.getElementsByTag('tbody').getItem(0);
                        var z = o.getFirst();
                        while (w.getChildCount() > 0)
                        {
                            x = w.getFirst();
                            for (r = 0; r < x.getChildCount(); r++)
                            {
                                var A = x.getChild(r);
                                if (A.type == CKEDITOR.NODE_ELEMENT) {
                                    A.renameNode('td');
                                    A.removeAttribute('scope');
                                }
                            }
                            x.insertBefore(z);
                        }
                        w.remove();
                    }
                    if (!this.hasColumnHeaders && (v == 'col' || v == 'both'))
                    {
                        for (s = 0; s < k.$.rows.length; s++) 
                        {
                            A = new CKEDITOR.dom.element(k.$.rows[s].cells[0]);
                            A.renameNode('th');
                            A.setAttribute('scope', 'row');
                        }
                        if (this.hasColumnHeaders && !(v == 'col' || v == 'both'))
                        {
                            for (r = 0; r < k.$.rows.length; r++) 
                            {
                                s = new CKEDITOR.dom.element(k.$.rows[r]);
                                if (s.getParent().getName() == 'tbody') 
                                {
                                    A = new CKEDITOR.dom.element(s.$.cells[0]);
                                    A.renameNode('td');
                                    A.removeAttribute('scope');
                                }
                            }
                            n.txtHeight ? k.setStyle('height', n.txtHeight) : k.removeStyle('height');
                        }
                    }
                    n.txtWidth ? k.setStyle('width', n.txtWidth) : k.removeStyle('width');
                    if (!k.getAttribute('style')) {
                        k.removeAttribute('style');
                    }
                }
                if (!this._.selectedElement)
                {
                    e.insertElement(k);
                    setTimeout(function ()
                    {
                        var B = new CKEDITOR.dom.element(k.$.rows[0].cells[0]), C = new CKEDITOR.dom.range(e.document);
                        C.moveToPosition(B, CKEDITOR.POSITION_AFTER_START);
                        C.select(1);
                    }, 0);
                }
                else {
                    try {
                        i.selectBookmarks(j);
                    }
                    catch (B) {}
                }
            },
            contents : [
            {
                id : 'info', label : e.lang.table.title, elements : [
                {
                    type : 'hbox', widths : [null, null], styles : ['vertical-align:top'], children : [
                    {
                        type : 'vbox', padding : 0, children : [
                        {
                            type : 'text', id : 'txtRows', 'default' : 3, label : e.lang.table.rows, required : true, 
                            controlStyle : 'width:5em',
                            validate : function ()
                            {
                                var i = true, j = this.getValue();
                                i = i && CKEDITOR.dialog.validate.integer()(j) && j > 0;
                                if (!i) {
                                    alert(e.lang.table.invalidRows);
                                    this.select();
                                }
                                return i;
                            },
                            setup : function (i)
                            {
                                this.setValue(i.$.rows.length);
                            },
                            commit : b
                        },

                        {
                            type : 'text', id : 'txtCols', 'default' : 2, label : e.lang.table.columns, 
                            required : true, controlStyle : 'width:5em',
                            validate : function ()
                            {
                                var i = true, j = this.getValue();
                                i = i && CKEDITOR.dialog.validate.integer()(j) && j > 0;
                                if (!i) {
                                    alert(e.lang.table.invalidCols);
                                    this.select();
                                }
                                return i;
                            },
                            setup : function (i)
                            {
                                this.setValue(c(i));
                            },
                            commit : b
                        },
                        {
                            type : 'html', html : '&nbsp;'
                        },

                        {
                            type : 'select', id : 'selHeaders', 'default' : '', label : e.lang.table.headers, 
                            items : [[e.lang.table.headersNone, ''], [e.lang.table.headersRow, 'row'], 
                            [e.lang.table.headersColumn, 'col'], [e.lang.table.headersBoth, 'both']], 
                            setup : function (i)
                            {
                                var j = this.getDialog();
                                j.hasColumnHeaders = true;
                                for (var k = 0; k < i.$.rows.length; k++)
                                {
                                    var l = i.$.rows[k].cells[0];
                                    if (l && l.nodeName.toLowerCase() != 'th') {
                                        j.hasColumnHeaders = false;
                                        break;
                                    }
                                }
                                if (i.$.tHead !== null) {
                                    this.setValue(j.hasColumnHeaders ? 'both' : 'row');
                                }
                                else {
                                    this.setValue(j.hasColumnHeaders ? 'col' : '');
                                }
                            },
                            commit : b
                        },

                        {
                            type : 'text', id : 'txtBorder', 'default' : 1, label : e.lang.table.border, 
                            controlStyle : 'width:3em', validate : CKEDITOR.dialog.validate.number(e.lang.table.invalidBorder), 
                            setup : function (i)
                            {
                                this.setValue(i.getAttribute('border') || '');
                            },
                            commit : function (i, j)
                            {
                                if (this.getValue()) {
                                    j.setAttribute('border', this.getValue());
                                }
                                else {
                                    j.removeAttribute('border');
                                }
                            }
                        },

                        {
                            id : 'cmbAlign', type : 'select', 'default' : '', label : e.lang.common.align, 
                            items : [[e.lang.common.notSet, ''], [e.lang.common.alignLeft, 'left'], [e.lang.common.alignCenter, 
                            'center'], [e.lang.common.alignRight, 'right']],
                            setup : function (i)
                            {
                                this.setValue(i.getAttribute('align') || '');
                            },
                            commit : function (i, j)
                            {
                                if (this.getValue()) {
                                    j.setAttribute('align', this.getValue());
                                }
                                else {
                                    j.removeAttribute('align');
                                }
                            }
                        }]
                    },

                    {
                        type : 'vbox', padding : 0, children : [
                        {
                            type : 'hbox', widths : ['5em'], children : [
                            {
                                type : 'text', id : 'txtWidth', controlStyle : 'width:5em', label : e.lang.common.width, 
                                title : e.lang.common.cssLengthTooltip, 'default' : 500, getValue : a, 
                                validate : CKEDITOR.dialog.validate.cssLength(e.lang.common.invalidCssLength.replace('%1', 
                                e.lang.common.width)),
                                onChange : function ()
                                {
                                    var i = this.getDialog().getContentElement('advanced', 'advStyles');
                                    i && i.updateStyle('width', this.getValue());
                                },
                                setup : function (i)
                                {
                                    var j = i.getStyle('width');
                                    j && this.setValue(j);
                                },
                                commit : b
                            }]
                        },

                        {
                            type : 'hbox', widths : ['5em'], children : [
                            {
                                type : 'text', id : 'txtHeight', controlStyle : 'width:5em', label : e.lang.common.height, 
                                title : e.lang.common.cssLengthTooltip, 'default' : '', getValue : a, 
                                validate : CKEDITOR.dialog.validate.cssLength(e.lang.common.invalidCssLength.replace('%1', 
                                e.lang.common.height)),
                                onChange : function ()
                                {
                                    var i = this.getDialog().getContentElement('advanced', 'advStyles');
                                    i && i.updateStyle('height', this.getValue());
                                },
                                setup : function (i)
                                {
                                    var j = i.getStyle('width');
                                    j && this.setValue(j);
                                },
                                commit : b
                            }]
                        },
                        {
                            type : 'html', html : '&nbsp;'
                        },

                        {
                            type : 'text', id : 'txtCellSpace', controlStyle : 'width:3em', label : e.lang.table.cellSpace, 
                            'default' : 1, validate : CKEDITOR.dialog.validate.number(e.lang.table.invalidCellSpacing), 
                            setup : function (i)
                            {
                                this.setValue(i.getAttribute('cellSpacing') || '');
                            },
                            commit : function (i, j)
                            {
                                if (this.getValue()) {
                                    j.setAttribute('cellSpacing', this.getValue());
                                }
                                else {
                                    j.removeAttribute('cellSpacing');
                                }
                            }
                        },

                        {
                            type : 'text', id : 'txtCellPad', controlStyle : 'width:3em', label : e.lang.table.cellPad, 
                            'default' : 1, validate : CKEDITOR.dialog.validate.number(e.lang.table.invalidCellPadding), 
                            setup : function (i)
                            {
                                this.setValue(i.getAttribute('cellPadding') || '');
                            },
                            commit : function (i, j)
                            {
                                if (this.getValue()) {
                                    j.setAttribute('cellPadding', this.getValue());
                                }
                                else {
                                    j.removeAttribute('cellPadding');
                                }
                            }
                        }]
                    }]
                },
                {
                    type : 'html', align : 'right', html : ''
                },

                {
                    type : 'vbox', padding : 0, children : [
                    {
                        type : 'text', id : 'txtCaption', label : e.lang.table.caption,
                        setup : function (i)
                        {
                            var m = this;
                            m.enable();
                            var j = i.getElementsByTag('caption');
                            if (j.count() > 0)
                            {
                                var k = j.getItem(0), l = k.getFirst(CKEDITOR.dom.walker.nodeType(CKEDITOR.NODE_ELEMENT));
                                if (l && !l.equals(k.getBogus())) {
                                    m.disable();
                                    m.setValue(k.getText());
                                    return;
                                }
                                k = CKEDITOR.tools.trim(k.getText());
                                m.setValue(k);
                            }
                        },
                        commit : function (i, j)
                        {
                            if (!this.isEnabled()) {
                                return;
                            }
                            var k = this.getValue(), l = j.getElementsByTag('caption');
                            if (k)
                            {
                                if (l.count() > 0) {
                                    l = l.getItem(0);
                                    l.setHtml('');
                                }
                                else
                                {
                                    l = new CKEDITOR.dom.element('caption', e.document);
                                    if (j.getChildCount()) {
                                        l.insertBefore(j.getFirst());
                                    }
                                    else {
                                        l.appendTo(j);
                                    }
                                }
                                l.append(new CKEDITOR.dom.text(k, e.document));
                            }
                            else if (l.count() > 0) {
                                for (var m = l.count() - 1; m >= 0; m--) {
                                    l.getItem(m).remove();
                                }
                            }
                        }
                    },

                    {
                        type : 'text', id : 'txtSummary', label : e.lang.table.summary,
                        setup : function (i)
                        {
                            this.setValue(i.getAttribute('summary') || '');
                        },
                        commit : function (i, j)
                        {
                            if (this.getValue()) {
                                j.setAttribute('summary', this.getValue());
                            }
                            else {
                                j.removeAttribute('summary');
                            }
                        }
                    }]
                }]
            },
            h && h.createAdvancedTab(e)]
        };
    };
    CKEDITOR.dialog.add('table', function (e)
    {
        return d(e, 'table');
    });
    CKEDITOR.dialog.add('tableProperties', function (e)
    {
        return d(e, 'tableProperties');
    });
})();