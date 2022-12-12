const spelRegels = document.getElementById("spelregels");
const gholes = document.getElementById("gholes");
const reservation = document.getElementById("reservation");
const leaderboard = document.getElementById("leaderboard");
const title = document.getElementById("title");
const btn = document.querySelectorAll(".btn");

let pageContent;

const mainTitle = document.querySelector(".main_title");

const secondaryTitle = document.querySelector(".secondary_title");

const categoriesBtns = document.querySelectorAll(".categories_btns");

const boxContent = document.querySelectorAll(".box_content");

const topScoreText = document.querySelectorAll(".top_score_text");

const groupText = document.querySelectorAll(".group_text");

//Voor als je het standaart weg wilt hebben.
//spelRegels.style.display = "none";
//title.style.display = "none";
gholes.style.display = "none";
reservation.style.display = "none";
leaderboard.style.display = "none";

let regels = false;
let res = true;
let gholesB = true;
let lead = true;

function getData(array) {
  pageContent = array;
}

function insertData(array, page = "") {
  let data = array.frontPage;

  if (page == "spel_regels") {
    showRegels();
    title.textContent = data.titles[0]["title2"];
  } else if (page == "top_scores") {
    showLeaderboard();
    title.textContent = data.titles[0]["title5"];
  } else if (page == "ghole_btn") {
    showGholes();
    title.textContent = data.titles[0]["title3"];
  } else if (page == "groepen") {
    showReservation();
    title.textContent = data.titles[0]["title4"];
  }

  mainTitle.textContent = data.titles[0]["title1"];

  categoriesBtns[0].textContent = data.btns[0]["btn1"];
  categoriesBtns[1].textContent = data.btns[0]["btn2"];
  if (btn[2].id == "login") {
    categoriesBtns[2].textContent = data.btns[0]["btn3"];
  } else if (categoriesBtns.length < 4) {
    categoriesBtns[2].textContent = data.btns[0]["btn4"];
  } else {
    categoriesBtns[2].textContent = data.btns[0]["btn5"];
    categoriesBtns[3].textContent = data.btns[0]["btn4"];
  }

  boxContent.forEach((element, i) => {
    element.textContent = data.spelregels[0][`card${i + 1}`];
  });

  topScoreText.forEach((element, i) => {
    element.textContent = data.topScores[0][`top${i + 1}`];
  });

  groupText.forEach((element, i) => {
    element.textContent = data.groepen[0][`option${i + 1}`];
  });
}

btn.forEach((element) => {
  element.addEventListener("click", () => {
    insertData(pageContent, element.id);
  });
});

function showRegels() {
  hideAll();
  // title.innerHTML = "Spelregels";
  title.style.display = "block";
  spelRegels.style.display = "flex";
}

function hideRegels() {
  spelRegels.style.display = "none";
  title.style.display = "none";
}

function showGholes() {
  hideAll();
  // title.innerHTML = "Gholes";
  title.style.display = "block";
  gholes.style.display = "flex";
}

function hideGholes() {
  title.style.display = "none";
  gholes.style.display = "none";
}

function showReservation() {
  hideAll();
  // title.innerHTML = "Groepen";
  title.style.display = "block";
  reservation.style.display = "flex";
}

function hideReservation() {
  title.style.display = "none";
  reservation.style.display = "none";
}

function showLeaderboard() {
  hideAll();
  // title.innerHTML = "Top scores";
  title.style.display = "block";
  leaderboard.style.display = "flex";
}

function hideLeaderboard() {
  title.style.display = "none";
  leaderboard.style.display = "none";
}

function hideAll() {
  hideRegels();
  hideGholes();
  hideReservation();
  hideLeaderboard();
  gholesB = true;
  res = true;
  regels = true;
  lead = true;
}

function toggleSpelregels() {
  if (regels) {
    hideAll();
    showRegels();
    regels = false;
  } else {
    hideAll();
  }
}

function toggleGholes() {
  if (gholesB) {
    hideAll();
    showGholes();
    gholesB = false;
  } else {
    hideAll();
  }
}

function toggleReservation() {
  if (res) {
    hideAll();
    showReservation();
    res = false;
  } else {
    hideAll();
  }
}

function toggleLeaderboard() {
  if (lead) {
    hideAll();
    showLeaderboard();
    lead = false;
  } else {
    hideAll();
  }
}
