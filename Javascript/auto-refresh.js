$(document).ready(function() {
    $('#c2b').load('../score_register.php');
    refreshvar2();
});
function refreshvar2(){
    setTimeout( function() {
        $('#c2b').fadeOut('slow').load('../php/score_register.php').fadeIn('slow');
        refreshvar2();
    }, 5000);
}