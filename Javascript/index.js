const spelRegels = document.getElementById('spelregels');
const gholes = document.getElementById('gholes');
const reservation = document.getElementById('reservation');
const title = document.getElementById('title');

//Voor als je het standaart weg wilt hebben.
//spelRegels.style.display = "none";
//title.style.display = "none";
gholes.style.display = "none";
reservation.style.display = "none";

function toggleSpelregels() {
    if (spelRegels.style.display === "none" && spelRegels.style.display === "none" && gholes.style.display === "none") {
        title.innerHTML = "spelregels";
        title.style.display = "block";
        //gholes.style.display = "none";
        //reservation.style.display = "none";
        spelRegels.style.display = "flex";
    } else {
        title.style.display = "none";
        spelRegels.style.display = "none";
    }
}


function toggleGholes() {
   if (gholes.style.display === "none") {
        title.innerHTML = "Gholes";
       title.style.display = "block";
     gholes.style.display = "flex";
   } else if (spelRegels.style.display === "flex" && gholes.style.display === "flex") {
       spelRegels.style.display = "none";
       reservation.style.display = "none";
    } else {
       title.style.display = "none";
       gholes.style.display = "none";
   }
}

//function toggleReservation() {
//    if (reservation.style.display === "none") {
//        title.innerHTML = "Reservation";
//        title.style.display = "block";
 //       reservation.style.display = "flex";
 //   } else if (spelRegels.style.display === "flex" && gholes.style.display === "flex") {
 //       spelRegels.style.display = "none";
 //       gholes.style.display = "none";
  //  } else {
 //       title.style.display = "none";
 //       reservation.style.display = "none";
//    }
//}
