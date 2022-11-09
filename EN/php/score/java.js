// Cards
let card1 = document.getElementById("card1"),
    card2 = document.getElementById("card2"),
    card3 = document.getElementById("card3"),
    card4 = document.getElementById("card4"),
    card5 = document.getElementById("card5"),
    card6 = document.getElementById("card6"),
    card7 = document.getElementById("card7"),
    card8 = document.getElementById("card8"),
    card9 = document.getElementById("card9"),
    card10 = document.getElementById("card10"),
    card11 = document.getElementById("card11"),
    card12 = document.getElementById("card12"),
    card13 = document.getElementById("card13"),
    card14 = document.getElementById("card14"),
    card15 = document.getElementById("card15"),
    card16 = document.getElementById("card16"),
    card17 = document.getElementById("card17"),
    card18 = document.getElementById("card18"),

    card_length = document.querySelectorAll(".card");

// container
let container = document.getElementById("container");

// Card List
let card_list = [card1, card2, card3, card4, card5, card6, card7, card8, card9, card10, card11, card12, card13, card14, card15, card16, card17, card18,];

// next function
let counter = 1;
function next() {
    console.log("next:" + counter);
    if (counter < card_length.length) {
        card_list[counter].classList.add("active");
        backgroundFunc(counter);
        counter += 1;
    } else {
        counter = card_length.length;
    }
}

function prev() {
    if (counter > 1) {
        card_list[counter - 1].classList.remove("active");
        counter -= 1;
    } else {
        counter = 1;
    }
    backgroundFunc(counter - 1);
    console.log("prev:" + counter);
}

// background function
function backgroundFunc(x) {
    if (x == 0) {
        container.style.background = "#fff";
    } else if (x == 1) {
        container.style.background = "#fff";
    } else if (x == 2) {
        container.style.background = "#fff";
    } else if (x == 3) {
        container.style.background = "#fff";

    } else if (x == 4) {
        container.style.background = "#fff";
    }
    else if (x == 5) {
        container.style.background = "#fff";
    }
}

//zet de juiste ghole card klaar
function presetCards(ghole) {
    for (let i = 1; i < ghole; i++) {
        next();
    }
}


var cardsContainer = document.getElementById("container");

function showCards() {
    cardsContainer.style.display = "block";
    setTimeout(function() { cardsContainer.style.opacity = "1"; }, 1);
}
function hideCards() {
    cardsContainer.style.opacity = "0";
    setTimeout(function() { cardsContainer.style.display = "none"; }, 1000);
}