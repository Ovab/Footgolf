const spelRegels = document.getElementById('spelregels');
const gholes = document.getElementById('gholes');
const reservation = document.getElementById('reservation');
const leaderboard = document.getElementById('leaderboard');
const title = document.getElementById('title');

//Voor als je het standaart weg wilt hebben.
//spelRegels.style.display = "none";
//title.style.display = "none";
//gholes.style.display = "none";
//reservation.style.display = "none";
//leaderboard.style.display = "none";

let enabled = 1;

function Switch() {
    if (enabled === 1) {
        spelRegels.style.display = "block !important";
        gholes.style.display = "none !important";
    } else if (enabled === 0) {
        spelRegels.style.display = "none !important";
        gholes.style.display = "block !important";
    }
}

function toggleSpelregels() {
    enabled = 1;
    console.log(enabled)
}

function toggleGholes() {
    enabled = 0;
    console.log(enabled)
}
