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

const body = document.body;

const popUp = document.querySelector(".pop_up");

const content = document.querySelector(".pop_up_content");

const overlay = document.querySelector(".overlay");

const popUpImg = document.querySelector(".pop_up_img");

const socialMediaBtns = document.querySelector(".social_media_btns");

// Card List
let card_list = [
  card1,
  card2,
  card3,
  card4,
  card5,
  card6,
  card7,
  card8,
  card9,
  card10,
  card11,
  card12,
  card13,
  card14,
  card15,
  card16,
  card17,
  card18,
];

// next function
let counter = 1;
function next() {
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
  } else if (x == 5) {
    container.style.background = "#fff";
  }
}

function showPopUp(ghole) {
  if (ghole == 4) {
    overlay.style.display = "block";
    popUp.style.display = "block";
    content.innerHTML =
      "Krijg een gratis bittergarnituur! </br>Post een actie FOOTgolf foto op je socialmedia, like, share en tag je vrienden #FOOTgolfnederland.";
    popUpImg.src = "../../../img/Bittergarnituur-mix.jpg";
  } else if (ghole == 9) {
    overlay.style.display = "block";
    popUp.style.display = "block";
    content.innerHTML =
      "<h4>PAUZE</h4> </br> even de tussenstand optellen en genieten van een lekker drankje of hapje ";
    popUpImg.src = "../../../img/patat blikje menu.jpg";
  } else if (ghole == 13) {
    overlay.style.display = "block";
    popUp.style.display = "block";
    popUpImg.style.display = "none";
    content.textContent =
      "Laat een recensie achter op onze Facebook of instragram en maak kans op het winnen van een gratis FOOTgolf uitje.";
    socialMediaBtns.style.display = "flex";
  } else if (ghole == 18) {
    overlay.style.display = "block";
    popUp.style.display = "block";
    content.textContent =
      "Ben jij vandaag de FOOTgolf kampioen? Ben je klaar? Of ga je voor de 27 gholes vóór maar €5,00 extra p.p.";
    popUpImg.src = "../../../img/bekerset.jpg";
  } else if (ghole == 27) {
    overlay.style.display = "block";
    popUp.style.display = "block";
    content.textContent =
      "Wil je nog niet naar huis? Probeer onze FOOTpool vóór maar €16,00 (1 uur speeltijd)";
  }
}

function closePopUp() {
  popUp.style.display = "none";
  overlay.style.display = "none";
  // popUpImg.style.display = "block";
}

//zet de juiste ghole card klaar
function presetCards(ghole) {
  for (let i = 1; i < ghole; i++) {
    next();
  }
}

function showCards() {
  body.style.backgroundColor = "#fff";
  container.style.display = "block";
  setTimeout(function () {
    container.style.opacity = "1";
  }, 1);
}
function hideCards() {
  container.style.opacity = "0";
  body.style.backgroundColor = "#a5ffc8";
  setTimeout(function () {
    container.style.display = "none";
  }, 1000);
}
