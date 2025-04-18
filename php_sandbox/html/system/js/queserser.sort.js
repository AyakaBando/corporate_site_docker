$( function()
{
    $( '#sort tbody' ).sortable({
        helper      : helper1, 
        handle      : '.sortThis', 
        containment : 'parent', 
        opacity     : '0.6', 
        tolerance   : 'pointer'/*, 
        update: function( event, ui )
        {
            //var ownerId = ui.item.parent('ul').attr('id');
            //$( ':hidden[name="' + ui.item.children( 'input' ).attr( 'name' ) + '"]' ).val(ownerId + ',' + ui.item.attr( 'id' ));//value属性設定
            //ui.item.children('input').attr({'name': ownerId + '[]'});//name属性変更
            //alert( $( ':hidden[name="' + ui.item.children( 'input' ).attr( 'name' ) + '"]' ).val() );
            //$( ':hidden[name="' + ui.item.children( 'input' ).attr( 'name' ) + '"]' ).val()
            //alert(ui.item.attr('id'));//自身のID
            //alert(ui.item.parent('ul').attr('id'));//親要素のID
        }*/
    });
    //$( '.islandMember' ).disableSelection();
});


function helper1( e, tr )
{
    var $originals = tr.children();
    var $helper = tr.clone();
    $helper.children().each( function( index )
    {
        $( this ).width( $originals.eq( index ).width() );
    });
    return $helper;
}


//POSTボタン
function sortSave( elem )
{
    $( elem ).each( function()
    {
        var id = $( this ).data( 'idnum' );
        $( '#sortSubmit' ).append( '<input type="hidden" name="id[]" value="' + id + '" />' );
    });
    document.sort.submit();
}