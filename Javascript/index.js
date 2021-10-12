const spelRegels = document.getElementById('spelregels');
const gholes = document.getElementById('gholes');
const reservation = document.getElementById('reservation');
const title = document.getElementById('title');

//Voor als je het standaart weg wilt hebben.
//spelRegels.style.display = "none";
//title.style.display = "none";
gholes.style.display = "none";
reservation.style.display = "none";

let regels = false
let res = true
let gholesB = true

function showRegels() {
    title.innerHTML = "Spelregels";
    title.style.display = "block";
    spelRegels.style.display = "flex";
}

function hideRegels() {
    spelRegels.style.display = "none";
    title.style.display = "none";
}

function showGholes() {
    title.innerHTML = "Gholes";
    title.style.display = "block";
    gholes.style.display = "flex";
}

function hideGholes() {
    title.style.display = "none";
    gholes.style.display = "none";
}

function showReservation() {
    title.innerHTML = "Reservation";
    title.style.display = "block";
    reservation.style.display = "flex";
}

function hideReservation() {
    title.style.display = "none";
    reservation.style.display = "none";
}

function hideAll() {
    hideRegels()
    hideGholes()
    hideReservation()
    gholesB = true
    res = true
    regels = true
}


function toggleSpelregels() {
    if (regels) {
        hideAll()
        showRegels()
        regels = false
    } else {
        hideAll()
    }
}

function toggleGholes() {
    if (gholesB) {
        hideAll()
        showGholes()
        gholesB = false
    } else {
        hideAll()
    }
}

function toggleReservation() {
    if (res) {
        hideAll()
        showReservation()
        res = false
    } else {
        hideAll()
    }
}
