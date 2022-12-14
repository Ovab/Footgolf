"use strict";

let cards = document.querySelectorAll(".card");
let container = document.getElementById("container");
const body = document.body;
const popUp = document.querySelector(".pop_up");
const content = document.querySelector(".pop_up_content");
const overlay = document.querySelector(".overlay");
const popUpImg = document.querySelector(".pop_up_img");
const socialMediaBtns = document.querySelector(".social_media_btns");
const img = document.querySelectorAll(".image");
const cardText = document.querySelectorAll(".card_text");
let data;

function getData(array) {
  data = array;
}

function insertData(data) {
  cardText.forEach((element, i) => {
    element.textContent = data.gholePage.cards[0][`card${i + 1}`][0]["text"];
  });
}

img.forEach((element, i) => {
  element.style.backgroundImage = `url('../../../img/ghole-tracks/new tracks/Footgolf-Holes-GR_${
    i + 1
  }.png')`;
});

// next function
let counter = 1;
function next() {
  if (counter < cards.length) {
    cards[counter].classList.add("active");
    backgroundFunc(counter);
    counter += 1;
  } else {
    counter = cards.length;
  }
}

function prev() {
  if (counter > 1) {
    cards[counter - 1].classList.remove("active");
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
  body.style.backgroundColor = "#d5e6d2";
  setTimeout(function () {
    container.style.display = "none";
  }, 1000);
}
