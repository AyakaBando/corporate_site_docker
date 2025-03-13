function loadHtml( category, onore )
{
    $.ajax({
        timeout       : 5000, 
        scriptCharset : 'utf-8', 
        type          : "GET", 
        url           : './load.php', 
        dataType      : 'text',
        data          : { 'category' : category },
        success       : function( text )
        {
            $( '#productBox' + category ).append( text );
            $( onore ).parent().parent().css( {'display':'none'} );

            $(".s_box ul li:nth-child(3n)").addClass("none");

        },
        error: function( obj, status, errThrown )
        {
            alert( "データの取得に失敗しました。\r\nもう一度読み込みボタンを押してください。" );
        }
    });
}