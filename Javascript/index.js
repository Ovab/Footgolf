const spelRegels = document.getElementById('spelregels');
const title = document.getElementById('title');

//Voor als je het standaart weg wilt hebben.
//spelRegels.style.display = "none";
//title.style.display = "none";

function showSpelregels() {
    title.innerHTML = "Spelregels";
    title.style.display = "block";
    spelRegels.style.display = "flex";
}
