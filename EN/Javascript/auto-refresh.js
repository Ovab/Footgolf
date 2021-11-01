//maak functie aan.
function update_var() {
    jQuery.ajax({
        url: 'score_fetch.php', //Script URL.
        method: 'POST', //Methode data doorgeven
        success: function (answer) {
            jQuery('#score1').html(answer);//update your div with new content ....
        },
        error: function () {
            //Iets ging fout, niet sure wat tho
        }
    });
}

update_var()
//Call de functie elke ~2.7 sec
setInterval(function () {
    update_var()
}, 2700);