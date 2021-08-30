
$(document).ready(function () {
    switch ($('#page').val()) {

        case 'voucher_create':
            $( "#p2" ).addClass( "menu-open" );
            $( "#p21" ).addClass( "menu-open" );
            $( "#p211" ).addClass( "active" );
            break;

        case 'blsr':
            $( "#r2" ).addClass( "menu-open" );
            $( "#r21" ).addClass( "menu-open" );
            $( "#r211" ).addClass( "active" );
            break;

        case '403':
            $( "#p500" ).addClass( "menu-open" );
            $( "#p503" ).addClass( "active" );
        default:
            console.log(':(');
    }

});
