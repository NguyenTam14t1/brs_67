$(document).ready(function(){
    $('#logout' ).click(function( event ) {
        event.preventDefault();
        $('#logout-form').submit();
    });
});