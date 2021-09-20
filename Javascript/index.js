const spelRegels = document.getElementById('spelregels');
const title = document.getElementById('title');

//Voor als je het standaart weg wilt hebben.
//spelRegels.style.display = "none";
//title.style.display = "none";

function toggleSpelregels() {
    if (spelRegels.style.display === "none") {
    title.innerHTML = "Spelregels";
    title.style.display = "block";
    spelRegels.style.display = "flex";
    } else {
        title.innerHTML = "";
        title.style.display = "none";
        spelRegels.style.display = "none";
    }
}
